<?php

namespace App\Admin\Controllers;

use PDF;
use App\Swabs;
use App\SwabMDokter as Dokter;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

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
            ->header('Detail')
            ->description('description')
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

        $grid->no_identitas('No identitas');
        $grid->nama_pasien('Nama pasien');
        $grid->tanggal_lahir('Tanggal lahir');
        $grid->column('kelamin.kelamin');
        $grid->alamat('Alamat');
        $grid->tanggal_periksa('Tanggal periksa');
        $grid->jam('Jam');
        $grid->column('hasil.keterangan');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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

        return view('swab.hasil', compact('data','qrcode'));
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
        $form->text('no_identitas', 'No identitas')->rules('required');
        $form->date('tanggal_lahir', 'Tanggal lahir')->default(date('Y-m-d'))->rules('required');
        $form->radio('swab_m_kelamin_id', 'Swab m kelamin id')->options(['1' => 'Laki-laki', '2'=> 'Perempuan'])->default('1');
        $form->text('alamat', 'Alamat')->rules('required');
        $form->date('tanggal_periksa', 'Tanggal periksa')->default(date('Y-m-d'))->rules('required');
        $form->time('jam', 'Jam')->default(date('H:i:s'))->rules('required');
        $form->text('bahan', 'Bahan')->default('Nasal Swab')->rules('required');
        $form->radio('swab_m_hasil_id', 'Swab m hasil id')->options(['1' => 'Positif', '2'=> 'Negatif'])->default('2');
        $form->select('swab_m_dokter_id', 'Swab m dokter id')->options(function($id){
            return Dokter::get()->pluck('dokter','id');
        })->default(1);
        $form->hidden('doc_url');

        // callback after save
        $form->saving(function (Form $form) {
            $form->doc_url = "https://mhc-club.com/swab/$form->no_identitas";
        });

        return $form;
    }

    public function pull($id)
    {
        $data = Swabs::where('id', $id)->with('dokter','kelamin','hasil')->first();
        $qrcode = "https://mhc-club.com/swab/$data->no_identitas";

        $view_pdf = PDF::loadView('swab.hasil', compact('data','qrcode'))->setPaper('a4', 'portrait');
        return $view_pdf->stream('MHC - Hasil Swab.pdf');
    }

    public function setQrBase64(Request $request, $id)
    {
        $swab = Swabs::find($id);
        $swab->qrcode = $request->qrbase64;

        return ['success' => $swab->update()];
    }
}
