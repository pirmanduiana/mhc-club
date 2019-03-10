<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use DB;
use URL;
use DNS1D;
use App\Mstclientemployee;
use App\Mstclient;
use App\Mstclass;
use App\Mstclientdepartment;
use App\Trnclientcoverage;
use App\Trnemployeelog;
use App\Admin\Extensions\CheckRow;
use App\Mstclientemployeemember;

class EmployeeController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Karyawan";

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->page_header)
            ->description('daftar')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header($this->page_header)
            ->description('readonly')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header($this->page_header)
            ->description('edit')
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
            ->header($this->page_header)
            ->description('buat baru')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mstclientemployee);

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', 'Nama');
            $filter->like('mhc_code', 'Kode MHC');
            $filter->equal('client_id','Perusahaan')->select(function(){
                return Mstclient::get()->pluck('name','id');
            });
            $filter->equal('status_id','Status anggota')->radio([
                ''   => 'Semua',
                1    => 'Active',
                2    => 'Inactive',
            ]);
        });

        $grid->disableExport();

        $grid->id('ID')->sortable();
        $grid->mhc_code('Kode MHC')->display(function ($mhc_code) {            
            return $mhc_code;
        });
        $grid->name('Nama')->display(function($name){
            $tanggungan = Mstclientemployeemember::where('employee_id', $this->id)->count();
            return $name  . '&nbsp;&nbsp;<a href="/admin/tanggungan?&name=&mhc_code=&employee_id='.$this->id.'" class="label label-info" title="tampilkan tanggungan">'.$tanggungan.' <i class="fa fa-user"></i></a>&nbsp;';
        });
        $grid->dob('Tgl. lahir');
        $grid->column('client.name','Perusahaan');
        $grid->column('department.name','Departemen');
        $grid->column('class.name','Kelas');
        $grid->bpjs_code('Kode BPJS');
        $grid->status_id('Status')->display(function($status_id){
            $status = [
                1=>"<span class='label label-info'>Active</span>",
                2=>"<span class='label label-default'>Inactive</span>"
            ];
            return @$status[$status_id] ?: null;
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $employee = Mstclientemployee::where('mst_client_employee.id',$id)->join('mst_client','mst_client.id','=','mst_client_employee.client_id')->join('mst_client_department','mst_client_department.id','=','mst_client_employee.department_id')->join('mst_class','mst_class.id','=','mst_client_employee.class_id')
        ->select('mst_client_employee.*',DB::raw('mst_client.name as client_name'),DB::raw('mst_client_department.name as department_name'),DB::raw('mst_class.name as class_name'))->first();
        $barcode = 'data:image/png;base64,' . DNS1D::getBarcodePNG($employee->mhc_code, "C39+",1,33,array(1,1,4));
        $plafons = Trnclientcoverage::where('client_id',$employee->client_id)->join('mst_client','mst_client.id','=','trn_client_coverage.client_id')->join('mst_coverage','mst_coverage.id','=','trn_client_coverage.coverage_id')->select('trn_client_coverage.*',DB::raw('mst_client.name as client_name'),DB::raw('mst_coverage.name as cov_name'))
        ->get();
        $logs = Trnemployeelog::where("employee_id",$id)->leftJoin('admin_users','admin_users.id','=','trn_employee_log.user_id')->orderBy("created_at","desc")->select('trn_employee_log.*',DB::raw('admin_users.name as username'))->get();

        $member = Mstclientemployeemember::where("employee_id",$id)->get();
        $tanggungan = [];
        foreach ($member as $x=>$y) {
            $tanggungan[] = [
                "mhc_code" => $y->mhc_code,
                "bpjs_code" => $y->bpjs_code,
                "name" => $y->name,
                "family_status" => $y->family_status,
                "barcode" => 'data:image/png;base64,' . DNS1D::getBarcodePNG($y->mhc_code, "C39+",1,33,array(1,1,4))
            ];
        }

        return view('admin.employee_show')->with(compact('employee','barcode','plafons','logs','tanggungan'));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Mstclientemployee);

        $form->display('id', 'ID');
        $form->select('client_id', 'Perusahaan')->options(function(){
            return Mstclient::get()->pluck('name','id');
        })->rules('required');
        $form->select('department_id', 'Departemen')->options(function(){
            return Mstclientdepartment::get()->pluck('name','id');
        });
        $form->text('mhc_code', 'Kode MHC')->rules('required');    
        $form->text('name', 'Nama lengkap')->rules('required');
        $form->date('dob', 'Tgl. lahir')->rules('required');
        $form->text('address', 'Alamat rumah')->rules('required');
        $form->text('phone', 'No. HP')->rules('required');
        $form->select('class_id', 'Kelas')->options(function(){
            return Mstclass::get()->pluck('name','id');
        })->rules('required');
        $form->radio('status_id','Status karyawan')->options(['1'=>'Active', '2'=>'Inactive'])->default('1');
        $form->text('bpjs_code', 'Kode PBJS')->rules('required');
        
        $form->saved(function (Form $form) {
            // log
            $find = Trnemployeelog::where('notes','like','[first record]%')->where('employee_id',$form->model()->id)->first();
            if(empty($find)){
                $before_reason = "[first record]";
                $log = new Trnemployeelog;
                $log->employee_id = $form->model()->id;
                $log->notes = $before_reason . ": Karyawan dicatat di sistem untuk pertama kali.";
                $log->user_id = Admin::user()->id;
                $log->save();
            }
        });

        return $form;
    }

    public function rubahStatus(Request $request)
    {
        // update status
        $update = Mstclientemployee::find($request->employee_id)->update(["status_id"=>$request->optionsRadios]);
        if ($update) {
            // insert log
            $before_reason = $request->optionsRadios==1 ? "[set active]" : "[set in-active]";
            $log = new Trnemployeelog;
            $log->employee_id = $request->employee_id;
            $log->notes = $before_reason .": ". $request->reason;
            $log->user_id = Admin::user()->id;
            $log->save();
            if (!empty($log)) {
                return response()->json([true, $log]);
            }
        }
        return response()->json([false, "error!"]);
    }
}