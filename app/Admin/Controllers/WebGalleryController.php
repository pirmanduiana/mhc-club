<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\WebGallery;


class WebGalleryController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Web Gallery";

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
        $grid = new Grid(new WebGallery);

        $grid->id('ID')->sortable();
        $grid->title('Title');
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
        $show = new Show(WebGallery::findOrFail($id));

        $show->id('ID');
        $show->title('Title');
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
        $form = new Form(new WebGallery);

        $form->display('id', 'ID');
        $form->text('title', 'Title')->rules('required');
        $form->image('image');
        $form->select('status', 'Status')->options($status);
        return $form;
    }
}