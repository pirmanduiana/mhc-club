<?php

namespace App\Admin\Controllers;

use App\InvItems;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class InvItemsController extends Controller
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
        $grid = new Grid(new InvItems);

        $grid->id('Id');
        $grid->code('Code');
        $grid->name('Name');
        $grid->column('InvCategories.name', 'Kategori');        
        $grid->expired_on('Expired on');
        $grid->buy_price('Buy Price');
        $grid->sales_price('Sales Price');
        $grid->column('InvUnits.name', 'Unit');
        $grid->column('InvPrices.name', 'Price Type');
        $grid->column('InvStatuses.name', 'Status');
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
        $show = new Show(InvItems::findOrFail($id));

        $show->id('Id');
        $show->code('Code');
        $show->name('Name');
        $show->inv_categories_id('Inv categories id');
        $show->composition('Composition');
        $show->expired_on('Expired on');
        $show->price('Price');
        $show->inv_m_prices_id('Inv m prices id');
        $show->status('Status');
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
        $form = new Form(new InvItems);

        $form->text('code', 'Code');
        $form->text('name', 'Name');
        $form->number('inv_categories_id', 'Inv categories id');
        $form->decimal('composition', 'Composition');
        $form->date('expired_on', 'Expired on')->default(date('Y-m-d'));
        $form->decimal('price', 'Price');
        $form->number('inv_m_prices_id', 'Inv m prices id');
        $form->number('status', 'Status')->default(1);

        return $form;
    }
}
