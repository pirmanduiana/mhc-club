<?php

namespace App\Admin\Controllers;

use App\InvTransactions;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class InvTransactionsController extends Controller
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
            ->header('Index')
            ->description('description')
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
        $grid = new Grid(new InvTransactions);

        $grid->id('Id');
        $grid->column('InvItems.name', 'Barang');
        $grid->column('InvVendors.name', 'Vendor');
        $grid->column('InvWarehouses.name', 'Gudang');
        $grid->code('Code');
        $grid->qty('Qty');
        $grid->column('InvUnits.name', 'Unit');
        $grid->price('Price');
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
        $show = new Show(InvTransactions::findOrFail($id));

        $show->id('Id');
        $show->inv_items_id('Inv items id');
        $show->inv_vendors_id('Inv vendors id');
        $show->inv_warehouses_id('Inv warehouses id');
        $show->code('Code');
        $show->qty('Qty');
        $show->inv_units_id('Inv units id');
        $show->price('Price');
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
        $form = new Form(new InvTransactions);

        $form->number('inv_items_id', 'Inv items id');
        $form->number('inv_vendors_id', 'Inv vendors id');
        $form->number('inv_warehouses_id', 'Inv warehouses id');
        $form->text('code', 'Code');
        $form->decimal('qty', 'Qty')->default(0.00);
        $form->number('inv_units_id', 'Inv units id');
        $form->decimal('price', 'Price')->default(0.00);

        return $form;
    }
}
