<?php

namespace App\Admin\Controllers;

use PDF;
use App\Swabs;
use App\SwabMDokter as Dokter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\HasResourceActions;

class SwabController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Swab')
            ->description(' ')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Surat')
            ->description(Swabs::find($id)->nama_pasien)
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Swabs);
        $grid->model()->where('sl', 0);

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('nama_pasien', 'Nama pasien');
            $filter->like('no_identitas', 'No identitas');
            $filter->between('tanggal_periksa', 'Tanggal periksa')->date();
            $filter->in('swab_m_hasil_id', 'Hasil')->checkbox(['1' => 'Negatif', '2'=> 'Positif']);
        });

        $grid->no_identitas('No identitas');
        $grid->nama_pasien('Nama pasien');
        $grid->tanggal_lahir('Tanggal lahir');
        $grid->column('kelamin.kelamin');
        $grid->alamat('Alamat');
        $grid->tanggal_periksa('Tanggal periksa');
        $grid->jam('Jam');
        $grid->column('hasil.keterangan', 'Hasil SWAB')->display(function($hasil){
            return $hasil=="Positive" ? "<span style='color:red; font-weight:bold;'>$hasil</span>" : $hasil;
        });
        $grid->column('created_at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $data = Swabs::where('id', $id)->with('dokter','kelamin','hasil')->first();
        $qrcode = "https://mhc-club.com/swab/$data->no_identitas";
        $ispdf = 0;
        $show_tools_button = 1;

        return view('swab.hasil', compact('data','qrcode','ispdf','show_tools_button'));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Swabs);

        $form->text('nama_pasien', 'Nama pasien')->rules('required');
        $form->text('no_identitas', 'No identitas')->rules(function($form){
            // create
            if (!$id = $form->model()->id) {
                return 'required|unique:swabs,no_identitas';
            // edit
            } else {
                return 'required';
            }
        });
        $form->image('scan_ktp', 'Scan KTP')->move('swab');
        $form->date('tanggal_lahir', 'Tanggal lahir')->default(date('Y-m-d'))->rules('required');
        $form->radio('swab_m_kelamin_id', 'Jenis kelamin')->options(['1' => 'Laki-laki', '2'=> 'Perempuan'])->default('1');
        $form->text('alamat', 'Alamat')->rules('required');
        $form->date('tanggal_periksa', 'Tanggal periksa')->default(date('Y-m-d'))->rules('required');
        $form->time('jam', 'Jam')->default(date('H:i:s'))->rules('required');
        $form->text('bahan', 'Bahan')->default('Nasal Swab')->rules('required');
        $form->radio('swab_m_hasil_id', 'Hasil tes')->options(['1' => 'Negatif', '2'=> 'Positif'])->default('1');
        $form->select('swab_m_dokter_id', 'Dokter')->options(function($id){
            return Dokter::get()->pluck('dokter','id');
        })->default(1);
        $form->hidden('doc_url');
        $form->hidden('created_by');

        // callback after save
        $form->saving(function (Form $form) {
            if ($form->model()->no_identitas != $form->no_identitas) {
                $form->model()->qrcode = null;
                $form->model()->update();
            }
            $form->doc_url = "https://mhc-club.com/swab/$form->no_identitas";
            $form->created_by = Admin::user()->id;
        });

        $form->saved(function(Form $form){
            admin_toastr('Data tersimpan.');
            return redirect('/admin/swabs/'.$form->model()->id);
        });

        return $form;
    }

    public function pull($id)
    {
        $data = Swabs::where('id', $id)->with('dokter','kelamin','hasil')->first();
        $qrcode = "https://mhc-club.com/swab/$data->no_identitas";
        $ispdf = 1;
        $show_tools_button = 0;

        $view_pdf = PDF::loadView('swab.hasil', compact('data','qrcode','ispdf','show_tools_button'))->setPaper('a4', 'portrait');
        return $view_pdf->stream("MHC - Hasil Swab $data->nama_pasien.pdf");
    }

    public function setQrBase64(Request $request, $id)
    {
        $swab = Swabs::find($id);
        $swab->qrcode = $request->qrbase64;

        return ['success' => $swab->update()];
    }

    public function getSlPage()
    {
        $swabs = Swabs::where('sl', 0)->get();
        $yg_sudah_kadung_disl = Swabs::where('sl', 1)->get();
        $buat_table = Swabs::where('sl', 1)->paginate(10);
        return view('swab.seamless', compact('swabs','yg_sudah_kadung_disl','buat_table'));
    }
    public function postSl(Request $request)
    {
        $data = $request->swabs;
        $sl = $request->sl;
        
        foreach ($data as $key => $value) {
            $swab = Swabs::find($value);
            $swab->sl = $sl;
            $swab->update();
        }

        return $data;
    }
}
