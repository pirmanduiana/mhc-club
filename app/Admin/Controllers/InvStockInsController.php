<?php

namespace App\Admin\Controllers;

use App\InvStockIns;
use App\InvItems;
use App\InvUnits;
use App\InvVendors;
use App\InvWarehouses;
use App\InvStockInItems;
use App\InvTransactions;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class InvStockInsController extends Controller
{
    use HasResourceActions;
    private $header = 'Stock in';
    private $description = ' ';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->header)
            ->description($this->description)
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
            ->header($this->header)
            ->description($this->description)
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
            ->header($this->header)
            ->description($this->description)
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
            ->header($this->header)
            ->description($this->description)
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new InvStockIns);

        $grid->id('Id');
        $grid->code('Code')->display(function($code){
            return "<a href='/admin/inventory/stockins/$this->id/edit'>$code</a>";
        });
        $grid->date('Date');
        $grid->column('InvVendors.name', 'Vendor');
        $grid->column('InvWarehouses.name', 'Diterima di');
        $grid->column('status')->display(function($status){
            if ($status==0) {
                return "<i class='fa fa-question'></i> Draft";
            }
            return "<i class='fa fa-check'></i> Posted";
        });
        $grid->column('total', __('Total (Rp)'))->display(function(){
            $d = InvStockInItems::where('inv_stock_ins_id', $this->id)->get();
            $ttl = 0;
            foreach ($d as $k=>$v) {
                $ttl = $ttl + ($v->qty * $v->price);
            }
            return number_format($ttl, 2);
        });
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
        $show = new Show(InvStockIns::findOrFail($id));

        $show->id('Id');
        $show->code('Code');
        $show->date('Date');
        $show->inv_vendors_id('Inv vendors id');
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
        $form = new Form(new InvStockIns);

        $form->text('code', 'Code')->rules('required');
        $form->date('date', 'Date')->default(date('Y-m-d'))->rules('required');
        $form->select('inv_vendors_id', __('Vendor'))->options(function($inv_vendors_id){
            $vnd = InvVendors::pluck('name','id');
            return $vnd;
        })->rules('required');
        $form->select('inv_warehouses_id', 'Ke gudang')->options(function(){
            return InvWarehouses::get()->pluck('name','id');
        })->default(Admin::user()->inv_warehouses_id);

        // Subtable fields
        $form->hasMany('invstockinitems', function (Form\NestedForm $nestedForm) {            
            $nestedForm->select('inv_items_id', __('Barang'))->options(function($inv_items_id){
                $items = InvItems::pluck('name','id');
                return $items;
            })->rules('required');
            $nestedForm->text('qty')->default(0)->rules('required|numeric');
            $nestedForm->select('inv_units_id', __('Unit'))->options(function($inv_units_id){
                $units = InvUnits::pluck('name','id');
                return $units;
            })->rules('required');
            $nestedForm->text('price')->default(0)->rules('required|numeric');
        });

        $form->radio('status', __('Status'))->options([
            0 => 'Draft', 1=> 'Posted'
        ])->default('m');

        $form->saved(function (Form $form) {
            if ($form->status==1) {
                $items = $form->model()->invstockinitems;
                foreach ($items as $k=>$v) {
                    $trn = new InvTransactions();
                    $trn->inv_items_id = $v->inv_items_id;
                    $trn->inv_vendors_id = $form->inv_vendors_id;
                    $trn->inv_warehouses_id = $form->inv_warehouses_id;
                    $trn->trn_date = $form->date;
                    $trn->code = $form->code;
                    $trn->qty = $v->qty;
                    $trn->inv_units_id = $v->inv_units_id;
                    $trn->price = $v->price;
                    $trn->save();
                }
            }
        });

        return $form;
    }
}
