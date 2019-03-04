<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Mstproduct;
use App\Mstproductcategory;
use App\Mstcurrency;
use URL;

class ProductController extends Controller
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
            ->header('Product')
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
            ->header('Detail')
            ->description('description')
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
            ->header('Product')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mstproduct);

        $grid->id('ID')->sortable();
        $grid->name('Product');
        $grid->min_pax('Min-pax');
        $grid->max_pax('Max-pax');
        $grid->column('currency.code','Curr.');
        $grid->price()->display(function($price){
            return number_format($price, 2);
        }, 'Price');
        $grid->rating()->display(function($rating){
            $stars = "";
            for ($i=0; $i<$rating; $i++) { 
                $stars .= "<i class='fa fa-star-o'></i> ";
            }
            return $stars;
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
        $show = new Show(Mstproduct::findOrFail($id));

        $show->id('ID');
        $show->name('Product Name');
        $show->created_at('Created at');
        $show->divider();
        $show->featured_img()->image();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Mstproduct);

        $form->display('id', 'ID');
        $form->text('name', 'Product')->rules('required');
        $form->select('category_id', 'Category')->options(function(){
            return Mstproductcategory::get()->pluck('name','id');
        })->rules('required');
        $form->ckeditor('desc', 'Desc.')->rules('required');
        $form->number('min_pax', 'Min Pax')->rules('required');
        $form->number('max_pax', 'Max pax')->rules('required');
        $form->select('currency_id', 'Curr.')->options(function(){
            return Mstcurrency::get()->pluck('code','id');
        })->rules('required');
        $form->number('price', 'Price')->rules('required');

        $form->radio('show_price','Show price to public')->options(['0'=>'No', '1'=>'Yes'])->default('0');

        $form->number('rating', 'Rating')->rules('required|max:5');
        $form->image('featured_img', 'Featured image')->rules('required');

        return $form;
    }
}