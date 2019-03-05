<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\Mstclientemployee;
use App\Mstclient;
use App\Mstclass;
use App\Mstclientdepartment;

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
        });
        $grid->id('ID')->sortable();
        $grid->mhc_code('Kode MHC');
        $grid->name('Nama');
        $grid->dob('Tgl. lahir');
        $grid->column('client.name','Perusahaan');
        $grid->column('department.name','Departement');
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
        $show = new Show(Mstclientemployee::findOrFail($id));

        $show->id('ID');
        $show->mhc_code('Kode MHC');
        $show->name('Nama');
        $show->dob('Tgl. lahir');
        $show->client_id('Perusahaan');
        $show->class('Kelas');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
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
        })->rules('required');
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

        return $form;
    }
}