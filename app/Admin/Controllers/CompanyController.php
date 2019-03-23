<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Syscompany;
use App\Mstcurrency;

class CompanyController extends Controller
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
            ->header('Company Properties')
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
            ->header('Company profile')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Syscompany);

        $grid->id('ID')->sortable();
        $grid->name('name');
        $grid->address('address');
        $grid->latitude('latitude');
        $grid->longitude('longitude');
        $grid->main_phone('main_phone');
        $grid->main_website('main_website')->link();
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
        $show = new Show(Syscompany::findOrFail($id));

        $show->id('ID');
        $show->name('name');
        $show->address('address');
        $show->latitude('latitude');
        $show->longitude('longitude');
        $show->main_phone('main_phone');
        $show->main_website('main_website');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Syscompany);

        $form->display('id', 'ID');
        $form->text('name', 'company name')->rules('required');
        $form->text('address', 'company address')->rules('required');
        $form->text('latitude', 'latitude')->rules('required');
        $form->text('longitude', 'longitude')->rules('required');
        $form->text('main_phone', 'main phone')->rules('required');
        $form->text('secondary_phone', 'secondary phone')->rules('required');
        $form->text('main_website', 'main web url')->rules('required');
        $form->text('main_email', 'main email')->rules('required');

        $form->divider();

        $form->image('featured_img', 'Featured image')->rules('required');
        $form->ckeditor('description', 'description.')->rules('required');

        return $form;
    }
}