<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\WebAbout;


class WebAboutController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Web About";

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
        $grid = new Grid(new WebAbout);

        $grid->id('ID')->sortable();
        $grid->title('Title');
        $grid->content('Content');
        // $grid->image_name('Image');

        $grid->image_about()->display(function ($image) {
            
            return '<div ><img src="/uploads/'.$image.'" class="file-preview-image kv-preview-data" title="" alt="" style="width:50;height:50;max-width:50%;max-height:50%;"></div>';
        });
        $grid->image_title('Img Title');
        $grid->outhor_name('Outhor');
        $grid->status('Status');
        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

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
        $show = new Show(WebAbout::findOrFail($id));

        $show->id('ID');
        $show->title('Title');
        $show->content('Content');
        $show->image_about('Image');
        $show->image_title('Img Title');
        $grid->outhor('Outhor');
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
        $status = [
            'Online' => 'Online',
            'Offline' => 'Offline'
        ];
        $form = new Form(new WebAbout);

        $form->display('id', 'ID');
        $form->text('title', 'Title')->rules('required');
        $form->textarea('content', 'Content')->rules('required');
        $form->image('image_logo');
        $form->image('image_about');
        $form->text('image_title', 'Image Title')->rules('required');
        $form->text('outhor_name', 'Outhor')->rules('required');
        $form->select('status', 'Status')->options($status);
        return $form;
    }
}