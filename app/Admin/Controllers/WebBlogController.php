<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\WebBlog;


class WebBlogController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Web Blog";

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
        $grid = new Grid(new WebBlog);

        $grid->id('ID')->sortable();
        $grid->user('User');
        $grid->title('Title');
        $grid->content('Content');
        $grid->image()->display(function ($image) {
            
            return '<div ><img src="/uploads/'.$image.'" class="file-preview-image kv-preview-data" title="" alt="" style="width:50;height:50;max-width:50%;max-height:50%;"></div>';
        });
        $grid->status('Status');
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
        $show = new Show(WebBlog::findOrFail($id));

        $show->id('ID');
        $show->user('User');
        $show->title('Title');
        $show->content('Content');
        $show->image('Image');
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
        $form = new Form(new WebBlog);

        $form->display('id', 'ID');
        $form->text('user', 'User')->rules('required');
        $form->text('title', 'Title')->rules('required');
        $form->textarea('content', 'Content')->rules('required');
        $form->image('image');
        $form->select('status', 'Status')->options($status);
        return $form;
    }
}