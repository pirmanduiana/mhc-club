<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\Trnclientcoverage;
use App\Mstclient;
use App\Mstclientdepartment;
use App\Mstclass;
use App\Mstcoverage;

class ClientcoverageController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Pengaturan Plafon";

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
        $grid = new Grid(new Trnclientcoverage);
        
        $grid->filter(function($filter){
            $filter->disableIdFilter();            
            $filter->equal('client_id','Perusahaan')->select(function(){
                return Mstclient::get()->pluck('name','id');
            });
            $filter->equal('cob','COB?')->radio([
                ''   => 'Semua',
                0    => 'Tidak',
                1    => 'Ya',
            ]);
        });

        $grid->id('ID')->sortable();
        $grid->column('client.name','Client');
        $grid->column('coverage.name','Jenis tanggungan');        
        $grid->cob('COB')->display(function($cob){
            $status = [
                0=>"<span class='label label-default'>Tidak</span>",
                1=>"<span class='label label-info'>Ya</span>"
            ];
            return @$status[$cob] ?: null;
        });    
        $grid->description('Catatan tambahan')->display(function($description){            
            return substr($description, 0, 100) . "...";
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
        $show = new Show(Trnclientcoverage::findOrFail($id));

        $show->id('ID');
        $show->client_id('Client');
        $show->coverage_id('Jenis tanggungan');
        $show->cob('COB');
        $show->description('Catatan tambahan');
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
        $form = new Form(new Trnclientcoverage);

        $form->display('id', 'ID');
        $form->select('client_id', 'Perusahaan')->options(function(){
            return Mstclient::get()->pluck('name','id');
        })->rules('required');
        $form->select('coverage_id', 'Tanggungan')->options(function(){
            return Mstcoverage::get()->pluck('name','id');
        })->rules('required');
        $form->radio('cob','COB?')->options(['0'=>'No', '1'=>'Yes'])->default('0');
        $form->ckeditor('description', 'Catatan')->rules('required');

        return $form;
    }
}