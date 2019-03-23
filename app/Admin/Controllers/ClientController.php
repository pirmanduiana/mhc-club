<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\Mstclient;
use App\Mstclientemployee;
use App\Mstclientemployeemember;

class ClientController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Client";

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
        $grid = new Grid(new Mstclient);

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', 'Nama client');
            $filter->equal('status_id','Status client')->radio([
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
        $show = new Show(Mstclient::findOrFail($id));

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
        $form = new Form(new Mstclient);

        $form->html(function(Form $form){
            if (!empty($form->model()->id)) {
                return '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
                Merubah status client akan merubah semua status karyawan yang terkait dengannya!
                </div>';
            }
        });
        $form->display('id', 'ID');
        $form->text('code', 'Kode client')->rules('required');
        $form->text('name', 'Nama client')->rules('required');
        $form->text('address', 'Alamat')->rules('required');
        $form->mobile('phone', 'Telp')->options(['mask' => '9999 999999'])->rules('required');
        $form->mobile('fax', 'Fax')->options(['mask' => '9999 999999'])->rules('required');
        $form->url('website', 'Website')->rules('required');
        $form->email('email', 'Email')->rules('required');
        $form->text('contract_number', 'No. kontrak')->rules('required');
        $form->date('contract_start', 'Tgl. mulai kontrak')->rules('required');
        $form->date('contract_end', 'Tgl. berakhir kontrak')->rules('required');
        $form->radio('status_id','Status')->options(['1'=>'Active', '2'=>'Inactive'])->default('1');

        $form->saved(function (Form $form) {
            Mstclientemployee::where("client_id",$form->model()->id)->update(["status_id"=>$form->status_id]);
        });

        return $form;
    }
}