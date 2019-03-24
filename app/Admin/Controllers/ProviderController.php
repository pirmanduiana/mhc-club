<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\Mstprovider;

class ProviderController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Provider";

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
        $grid = new Grid(new Mstprovider);

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', 'Nama provider');            
            $filter->equal('status_id','Status provider')->radio([
                ''   => 'Semua',
                1    => 'Active',
                2    => 'Inactive',
            ]);
        });
        $grid->id('ID')->sortable();
        $grid->code('Kode');
        $grid->name('Nama');
        $grid->address('Alamat');
        $grid->phone('Telp.');
        $grid->email('Email');
        $grid->status_id('Status')->display(function($status_id){
            $status = [
                1=>"<span class='label label-info'>Active</span>",
                2=>"<span class='label label-default'>Inactive</span>"
            ];
            return @$status[$status_id] ?: null;
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->model()->orderBy('code', 'asc');

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
        $show = new Show(Mstprovider::findOrFail($id));

        $show->id('ID');
        $show->name('Nama');
        $show->address('Alamat');
        $show->phone('Telp.');
        $show->email('Email');
        $show->status_id('Status');
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
        $form = new Form(new Mstprovider);

        $form->display('id', 'ID');
        $form->text('code', 'Kode provider')->rules('required');
        $form->text('name', 'Nama provider')->rules('required');
        $form->text('address', 'Alamat')->rules('required');
        $form->text('phone', 'Telp')->rules('required');
        $form->text('fax', 'Fax')->rules('required');
        $form->text('website', 'Website')->rules('required');
        $form->text('email', 'Email')->rules('required');
        $form->text('contract_number', 'No. kontrak');
        $form->date('contract_start', 'Tgl. mulai kontrak');
        $form->date('contract_end', 'Tgl. berakhir kontrak');
        $form->radio('status_id','Status')->options(['1'=>'Active', '2'=>'Inactive'])->default('1');

        return $form;
    }
}