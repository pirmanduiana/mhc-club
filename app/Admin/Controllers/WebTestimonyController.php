<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;
use App\WebTestimony;


class WebTestimonyController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Web Testimony";

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
        $grid = new Grid(new WebTestimony);

        $grid->id('ID')->sortable();
        $grid->user('User');
        $grid->testimony('Testimony');
        $grid->rating()->display(function($rating){
            $stars = "";
            for ($i=0; $i<$rating; $i++) { 
                $stars .= "<i class='fa fa-star-o'></i> ";
            }
            return $stars;
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
        $show = new Show(WebTestimony::findOrFail($id));

        $show->id('ID');
        $show->user('User');
        $show->testimony('Testimony');
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
        $form = new Form(new WebTestimony);

        $form->display('id', 'ID');
        $form->text('user', 'User')->rules('required');
        $form->textarea('testimony', 'Testimony')->rules('required');
        $form->image('user_image')->rules('required');
        $form->select('status', 'Status')->options($status);
        $form->number('rating', 'Rating')->rules('required|max:5');
        return $form;
    }
}