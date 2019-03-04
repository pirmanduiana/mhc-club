<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use URL;
use App\Trnblog;
use App\Mstblogcategory;

class BlogController extends Controller
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
            ->header('Blog Post')
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
        $grid = new Grid(new Trnblog);

        $grid->id('ID')->sortable();
        $grid->title('blog title');
        $grid->column('category.name','category');
        $grid->published()->display(function($published){
            $status = [
                0=>"<span class='label label-default'>No</span>",
                1=>"<span class='label label-info'>Yes</span>"
            ];
            return @$status[$published] ?: null;
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
        $show = new Show(Trnblog::findOrFail($id));

        $show->id('ID')->sortable();
        $show->title('blog title');
        $show->category_id()->as(function ($category_id) {
            return Mstblogcategory::find($category_id)->name;
        });
        $show->published()->as(function ($published) {
            $status = [
                0=>"No",
                1=>"Yes"
            ];
            return @$status[$published] ?: null;
        });
        $show->created_at('Created at');
        $show->updated_at('Updated at');
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
        $form = new Form(new Trnblog);

        $form->display('id', 'ID');
        $form->text('title', 'blog title')->rules('required');
        $form->select('category_id', 'category')->options(function(){
            return Mstblogcategory::get()->pluck('name','id');
        })->rules('required');
        $form->ckeditor('content', 'content')->rules('required');    
        $form->radio('published','published this post?')->options(['0'=>'No', '1'=>'Yes'])->default('0');        
        $form->image('featured_img', 'featured image')->rules('required');
        $form->hidden('user_id')->value(Admin::user()->id);

        return $form;
    }
}