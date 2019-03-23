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
use Illuminate\Support\Facades\Session;
use App\Mstclientemployee;
use App\Trnemployeelog;
use App\Admin\Extensions\CheckRow;
use App\Mstclientemployeemember;
use App\Mstclient;

class TanggunganController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Tanggungan Karyawan";

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
        if (isset($_GET["employee_id"])) {        
            Session::put('employee_id', $_GET["employee_id"]);
        } else {
            Session::forget('employee_id');
        }
        
        $grid = new Grid(new Mstclientemployeemember);

        $grid->tools(function ($tools) {
            $tools->append('<a href="/admin/employee" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Daftar karyawan</a>');
        });

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', 'Nama');
            $filter->like('mhc_code', 'Kode MHC');
            $filter->equal('employee_id','Penanggung')->select(function(){
                return Mstclientemployee::get()->pluck('name','id');
            });            
        });

        $grid->disableExport();

        $grid->id('ID')->sortable();
        $grid->mhc_code('Kode MHC');
        $grid->name('Nama');
        $grid->family_status('Hub. keluarga');
        $grid->dob('Tgl. lahir');
        $grid->bpjs_code('Kode BPJS');
        $grid->column('employee.name','Penanggung');
        $grid->status_id('Status')->display(function($status_id){
            $status = [
                1=>"<span class='label label-info'>Active</span>",
                2=>"<span class='label label-default'>Inactive</span>"
            ];
            return @$status[$status_id] ?: null;
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

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
        // ...
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Mstclientemployeemember);

        $default_employee_id = Session::get('employee_id');

        $form->display('id', 'ID');
        $form->select('employee_id', 'Penanggung')->options(function(){
            return Mstclientemployee::get()->pluck('name','id');
        })->default($default_employee_id)->rules('required');
        $form->text('mhc_code', 'Kode MHC')->rules('required');
        $form->text('name', 'Nama lengkap')->rules('required');
        $form->select('family_status', 'Hub. keluarga')->options(function(){
            return ["Suami"=>"Suami","Istri"=>"Istri","Calon Anak"=>"Calon Anak","Anak 1"=>"Anak 1","Anak 2"=>"Anak 2","Anak 3"=>"Anak 3","Anak 4"=>"Anak 4","Anak 4"=>"Anak 4","Anak 5"=>"Anak 5","Keluarga"=>"Keluarga"];
        })->rules('required');
        $form->date('dob', 'Tgl. lahir');        
        $form->text('bpjs_code', 'Kode BPJS')->rules('required');
        $form->radio('status_id','Status')->options(['1'=>'Active', '2'=>'Inactive'])->default('1');

        $form->saved(function (Form $form) {
            // log
            $before_reason = "[first record]";
            $log = new Trnemployeelog;
            $log->employee_id = $form->model()->employee_id;
            $log->notes = $before_reason . ": Tanggungan ".$form->model()->name." ditambahkan.";
            $log->user_id = Admin::user()->id;
            $log->save();
        });

        return $form;
    }

}