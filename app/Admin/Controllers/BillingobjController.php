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
use App\Mstbillingobj;
use App\Trnbilling;

class BillingobjController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Billing struktur";

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
        $grid = new Grid(new Mstbillingobj);

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', 'Nama objek');            
        });

        $grid->disableExport();

        $grid->id('ID')->sortable();
        $grid->name('name');
        $grid->multiplier('Formula')->display(function($multiplier){
            $array = [
                1 => '<span class="label label-info"><i class="fa fa-plus"> Penambah</i></span>',
                -1 => '<span class="label label-warning"><i class="fa fa-minus"> Pengurang</i></span>'
            ];
            return @$array[$multiplier] ?: null;
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
        $form = new Form(new Mstbillingobj);

        $form->display('id', 'ID');
        $form->text('name', 'Nama objek billing')->rules('required');
        $form->select('multiplier', 'Formula')->options(function(){
            return [
                1 => "Penambah",
                -1 => "Pengurang"
            ];
        });
        return $form;
    }

}