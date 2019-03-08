<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use DB;
use URL;
use DNS1D;
use App\Mstclientemployee;
use App\Mstclient;
use App\Mstclass;
use App\Mstclientdepartment;
use App\Trnclientcoverage;
use App\Trnemployeelog;
use App\Admin\Extensions\CheckRow;
use App\Mstclientemployeemember;
use App\Trnbilling;
use App\Mstbillingobj;
use App\Trnbillingitem;

class BillingController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Billing";

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
        $billobj = Mstbillingobj::where('billing_id',$id)->join('trn_billing_item','trn_billing_item.item_id','=','mst_billing_obj.id')->select('mst_billing_obj.*', 'trn_billing_item.price')->get();
        $employee = Mstclientemployee::where('status_id', '1')->get();
        $trnbilling = Trnbilling::find($id);
        $client = Mstclient::where('status_id','1')->get();

        return $content
            ->header($this->page_header)
            ->description('edit')
            ->body(view('admin.billing_edit')->with(compact('billobj','employee','trnbilling','client')));
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
        $grid = new Grid(new Trnbilling);
        $grid->model()->orderBy('client_id', 'asc')->orderBy('date', 'desc');

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->equal('client_id','Client')->select(function(){
                return Mstclient::get()->pluck('name','id');
            });
            $filter->equal('date', 'Tanggal bill')->date();
            $filter->like('employee.name', 'Pasien');
        });

        $grid->id('ID')->sortable();
        $grid->code('Kode')->display(function($code){
            $emp = Mstclientemployee::where("mst_client_employee.id",$this->employee_id)->join("mst_client","mst_client.id","=","mst_client_employee.client_id")->select("mst_client_employee.*",DB::raw("mst_client.name as client_name"))->first();
            return $emp->client_name;
        });   
        $grid->date('Tgl. bill');
        $grid->column('employee.name','Pasien');
        $grid->total('Total bill')->display(function($total){
            return number_format($total, 2);
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

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
        // ...
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $billobj = Mstbillingobj::all();
        $client = Mstclient::where('status_id','1')->get();
        $employee = Mstclientemployee::where('status_id', '1')->get();
        return view('admin.billing_create')->with(compact('billobj','employee','client'));
    }

    public function store(Request $request)
    {
        $billing = Trnbilling::create([
            "code" => "FJDLSFJLDKS",
            "date" => $request->date,
            "client_id" => $request->client_id,
            "employee_id" => $request->employee_id,
            "doctor_id" => 99, // temp
            "total" => $request->total
        ]);
        if ($billing) {
            foreach ($request->item as $p=>$q) {
                Trnbillingitem::create([
                    'billing_id' => $billing->id,
                    'item_id' => $p,
                    'price' => $q,
                    'qty' => 1,
                    'total' => $q * 1
                ]);
            }
        }
        return response()->json($billing);
    }

    public function update(Request $request)
    {
        $update = Trnbilling::find($request->id)->update([
            "date"=>$request->date,
            "total"=>$request->total,
            "client_id" => $request->client_id,
            "employee_id"=>$request->employee_id
        ]);
        if ($update) {
            foreach ($request->item as $p=>$q) {
                Trnbillingitem::where("billing_id", $request->id)->where("item_id",$p)->update([
                    "price" => $q,
                    "qty" => 1,
                    "total" => $q * 1
                ]);
            }
        }
        return response()->json($update);
    }

    public function getEmpByClient($client_id)
    {
        $data = Mstclientemployee::where("client_id", $client_id)->get();
        $select2data = [];
        foreach ($data as $key => $value) {
            $select2data[] = [
                "id" => $value->id,
                "text" => $value->name
            ];
        }
        return response()->json($select2data);
    }

}