<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\WebSlider;


class WebSliderController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Web Slider";

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
        $grid = new Grid(new WebSlider);

        $grid->id('ID')->sortable();
        $grid->title('Title');
        $grid->content('Content');
        // $grid->image_name('Image');
        $grid->image_name()->display(function ($image) {
            
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
        $show = new Show(WebSlider::findOrFail($id));

        $show->id('ID');
        $show->title('Title');
        $show->content('Content');
        $show->image_name('Image');
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
        $form = new Form(new WebSlider);

        $form->display('id', 'ID');
        $form->text('title', 'Title Slider')->rules('required');
        $form->textarea('content', 'Content Slider')->rules('required');
        $form->image('image_name');
        $form->select('status', 'Status')->options($status);
        return $form;
    }
}