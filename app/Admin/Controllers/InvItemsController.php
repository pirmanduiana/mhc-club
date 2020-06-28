<?php

namespace App\Admin\Controllers;

use App\InvItems;
use App\InvUnits;
use App\InvStatuses;
use App\InvCategories;
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
        
        $form->select('inv_categories_id', 'Kategori')->options(function($inv_categories_id){
            return InvCategories::get()->pluck('name','id');
        });

        $form->date('expired_on', 'Expired on')->default(date('Y-m-d'));
        $form->decimal('buy_price', 'Buying Price');
        $form->decimal('sales_price', 'Selling Price');

        $form->select('inv_units_id', 'Unit')->options(function($inv_units_id){
            return InvUnits::get()->pluck('name','id');
        });

        $form->select('inv_statuses_id', 'Status')->options(function($inv_statuses_id){
            return InvStatuses::get()->pluck('name','id');
        });

        return $form;
    }

    public function getBarang($id)
    {
        $brg = InvItems::find($id);
        
        if (!empty($brg)) {
            return response()->json([
                'success' => true,
                'data' => $brg
            ]);
        }

        return response()->json([
            'success' => false,
            'data' => null
        ]);
    }
}
