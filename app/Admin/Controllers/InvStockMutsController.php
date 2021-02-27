<?php

namespace App\Admin\Controllers;

use App\InvStockMuts;
use App\InvWarehouses;
use App\InvItems;
use App\InvUnits;
use App\InvStockMutItems;
use App\InvTransactions;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class InvStockMutsController extends Controller
{
    use HasResourceActions;
    private $header = 'Stock mutation';
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
        $grid = new Grid(new InvStockMuts);

        $grid->id('Id');
        $grid->code('Code')->display(function($code){
            return "<a href='/admin/inventory/stockmuts/$this->id/edit'>$code</a>";
        });
        $grid->date('Date');
        $grid->column('fromWarehouse.name', __('Dari gudang'));
        $grid->column('toWarehouse.name', __('Ke gudang'));
        $grid->column('status')->display(function($status){
            if ($status==0) {
                return "<i class='fa fa-question'></i> Draft";
            }
            return "<i class='fa fa-check'></i> Posted";
        });
        $grid->column('total', __('Total (Rp)'))->display(function(){
            $d = InvStockMutItems::where('inv_stock_muts_id', $this->id)->get();
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
        $show = new Show(InvStockMuts::findOrFail($id));

        $show->id('Id');
        $show->code('Code');
        $show->date('Date');
        $show->inv_warehouses_id_from('Inv warehouses id from');
        $show->inv_warehouses_id_to('Inv warehouses id to');
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
        $form = new Form(new InvStockMuts);

        $form->text('code', 'Code')->rules('required');
        $form->date('date', 'Date')->default(date('Y-m-d'))->rules('required');
        $form->text('notes', 'Catatan')->rules('required');
        $form->select('inv_warehouses_id_from', 'Dari gudang')->options(function(){
            return InvWarehouses::get()->pluck('name','id');
        })->default(Admin::user()->inv_warehouses_id);
        $form->select('inv_warehouses_id_to', 'Ke gudang')->options(function(){
            return InvWarehouses::get()->pluck('name','id');
        })->default(Admin::user()->inv_warehouses_id);

        // Subtable fields
        $form->hasMany('invstockmutitems', function (Form\NestedForm $form) {
            $form->select('inv_items_id', __('Barang'))->options(function($inv_items_id){
                $items = InvItems::pluck('name','id');
                return $items;
            })->rules('required');
            $form->text('qty')->default(0)->rules('required|numeric');
            $form->select('inv_units_id', __('Unit'))->options(function($inv_units_id){
                $units = InvUnits::pluck('name','id');
                return $units;
            })->rules('required');
            $form->text('price')->default(0)->rules('required|numeric');
            $form->text('rwTtl','Total');
        });

        $form->radio('status', __('Status'))->options([
            0 => 'Draft', 1=> 'Posted'
        ])->default('0');

        $form->saved(function (Form $form) {
            if ($form->status==1) {
                $items = $form->model()->invstockmutitems;
                // ambil dari gudang
                foreach ($items as $k=>$v) {
                    $trn = new InvTransactions();
                    $trn->inv_items_id = $v->inv_items_id;
                    $trn->inv_vendors_id = null;
                    $trn->inv_warehouses_id = $form->inv_warehouses_id_from;
                    $trn->trn_date = $form->date;
                    $trn->code = $form->code;
                    $trn->doc_id = $form->model()->id;
                    $trn->qty = $v->qty * -1;
                    $trn->inv_units_id = $v->inv_units_id;
                    $trn->price = $v->price;
                    $trn->save();
                }
                // ke gudang
                foreach ($items as $k=>$v) {
                    $trn = new InvTransactions();
                    $trn->inv_items_id = $v->inv_items_id;
                    $trn->inv_vendors_id = null;
                    $trn->inv_warehouses_id = $form->inv_warehouses_id_to;
                    $trn->trn_date = $form->date;
                    $trn->code = $form->code;
                    $trn->doc_id = $form->model()->id;
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
