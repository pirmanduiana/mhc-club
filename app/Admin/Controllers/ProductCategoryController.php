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

class ProductCategoryController extends Controller
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
            ->header('Product category')
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
            ->header('Product category')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mstproductcategory);

        $grid->id('ID')->sortable();
        $grid->name('Category Name');
        $grid->short_desc('Short desc.');
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
        $show = new Show(Mstproductcategory::findOrFail($id));

        $show->id('ID');
        $show->name('Category Name');
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
        $form = new Form(new Mstproductcategory);

        $form->display('id', 'ID');
        $form->text('name', 'Product category')->rules('required');
        $form->text('short_desc', 'Short description')->rules('required');
        $form->number('rating', 'Rating')->rules('required|max:5');
        $form->divider();
        $form->image('featured_img', 'Featured image')->rules('required');

        return $form;
    }
}
