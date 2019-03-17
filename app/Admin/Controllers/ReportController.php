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
use DNS1D;
use App\Mstclientemployee;
use App\Mstclient;
use App\Mstclass;
use App\Mstclientdepartment;
use App\Trnclientcoverage;
use App\Trnemployeelog;
use App\Mstclientemployeemember;
use Encore\Admin\Widgets\Tab;
use DateTime;
use App\Trnbilling;

class ReportController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Laporan";

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
            ->body($this->reports());
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
    protected function reports()
    {
        $tab = new Tab();

        $clients = Mstclient::where("status_id",1)->get();
        $bulan_array = [
            1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April",
            5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus",
            9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
        ];
        $tahun_skrg = date('Y'); $sampai_tahun = $tahun_skrg + 4;
        $tahun_array = [];
        for ($i=$tahun_skrg; $i<=$sampai_tahun; $i++) { 
            $tahun_array[$i] = $i;
        }
        
        $tab->add('Bill by month', view('admin.rpt_bill_bymonth')->with(compact('clients','bulan_array','tahun_array')));
        $tab->add('Bill by date', view('admin.rpt_bill_bydate')->with(compact('clients','bulan_array','tahun_array')));

        return $tab->render();
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $employee = Mstclientemployee::where('mst_client_employee.id',$id)->join('mst_client','mst_client.id','=','mst_client_employee.client_id')->join('mst_client_department','mst_client_department.id','=','mst_client_employee.department_id')->join('mst_class','mst_class.id','=','mst_client_employee.class_id')
        ->select('mst_client_employee.*',DB::raw('mst_client.name as client_name'),DB::raw('mst_client_department.name as department_name'),DB::raw('mst_class.name as class_name'))->first();
        $barcode = 'data:image/png;base64,' . DNS1D::getBarcodePNG($employee->mhc_code, "C39+",1,33,array(1,1,4));
        $plafons = Trnclientcoverage::where('client_id',$employee->client_id)->join('mst_client','mst_client.id','=','trn_client_coverage.client_id')->join('mst_coverage','mst_coverage.id','=','trn_client_coverage.coverage_id')->select('trn_client_coverage.*',DB::raw('mst_client.name as client_name'),DB::raw('mst_coverage.name as cov_name'))
        ->get();
        $logs = Trnemployeelog::where("employee_id",$id)->leftJoin('admin_users','admin_users.id','=','trn_employee_log.user_id')->orderBy("created_at","desc")->select('trn_employee_log.*',DB::raw('admin_users.name as username'))->get();

        $member = Mstclientemployeemember::where("employee_id",$id)->get();
        $tanggungan = [];
        foreach ($member as $x=>$y) {
            $tanggungan[] = [
                "mhc_code" => $y->mhc_code,
                "bpjs_code" => $y->bpjs_code,
                "name" => $y->name,
                "family_status" => $y->family_status,
                "barcode" => 'data:image/png;base64,' . DNS1D::getBarcodePNG($y->mhc_code, "C39+",1,33,array(1,1,4))
            ];
        }

        return view('admin.employee_show')->with(compact('employee','barcode','plafons','logs','tanggungan'));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Mstclientemployee);

        $form->display('id', 'ID');
        $form->select('client_id', 'Perusahaan')->options(function(){
            return Mstclient::get()->pluck('name','id');
        })->rules('required');
        $form->select('department_id', 'Departemen')->options(function(){
            return Mstclientdepartment::get()->pluck('name','id');
        });
        $form->text('mhc_code', 'Kode MHC')->rules('required');    
        $form->text('name', 'Nama lengkap')->rules('required');
        $form->date('dob', 'Tgl. lahir')->rules('required');
        $form->text('address', 'Alamat rumah')->rules('required');
        $form->text('phone', 'No. HP')->rules('required');
        $form->select('class_id', 'Kelas')->options(function(){
            return Mstclass::get()->pluck('name','id');
        })->rules('required');
        $form->radio('status_id','Status karyawan')->options(['1'=>'Active', '2'=>'Inactive'])->default('1');
        $form->text('bpjs_code', 'Kode PBJS')->rules('required');
        
        $form->saved(function (Form $form) {
            // log
            $find = Trnemployeelog::where('notes','like','[first record]%')->where('employee_id',$form->model()->id)->first();
            if(empty($find)){
                $before_reason = "[first record]";
                $log = new Trnemployeelog;
                $log->employee_id = $form->model()->id;
                $log->notes = $before_reason . ": Karyawan dicatat di sistem untuk pertama kali.";
                $log->user_id = Admin::user()->id;
                $log->save();
            }
        });

        return $form;
    }

    public function rubahStatus(Request $request)
    {
        // update status
        $update = Mstclientemployee::find($request->employee_id)->update(["status_id"=>$request->optionsRadios]);
        if ($update) {
            // insert log
            $before_reason = $request->optionsRadios==1 ? "[set active]" : "[set in-active]";
            $log = new Trnemployeelog;
            $log->employee_id = $request->employee_id;
            $log->notes = $before_reason .": ". $request->reason;
            $log->user_id = Admin::user()->id;
            $log->save();
            if (!empty($log)) {
                return response()->json([true, $log]);
            }
        }
        return response()->json([false, "error!"]);
    }

    private function get_MonthName($month_int)
    {
        $dateObj   = DateTime::createFromFormat('!m', $month_int);
        return $dateObj->format('F');
    }

    private function get_billByClient($start_date, $end_date, $client_id)
    {
        return Trnbilling::join('mst_client','mst_client.id','=','trn_billing.client_id')
        ->join('mst_provider','mst_provider.id','=','trn_billing.provider_id')
        ->whereBetween('trn_billing.date',[$start_date, $end_date])
        ->where('client_id',$client_id)
        ->select(DB::raw('mst_provider.code provider_code'), DB::raw('mst_provider.name provider_name'), DB::raw('CONCAT(MONTHNAME(trn_billing.date)," ",YEAR(trn_billing.date)) as month_name'), DB::raw('COUNT(`trn_billing`.employee_id) AS jml_px'), DB::raw('SUM(trn_billing.total) AS total'))
        ->groupBy('mst_provider.code','mst_provider.name','month_name')->orderBy('trn_billing.date');
    }

    public function bill_bymonth(Request $request)
    {
        $string_from = $request->year_from.'-'.$request->month_from.'-1';
        $dateObj_from   = DateTime::createFromFormat('Y-m-d', $string_from);
        $first_date_of_month =  $dateObj_from->format($request->year_from.'-m-01');

        $monthNum  = $request->month_to;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $last_date_of_month = $dateObj->format($request->year_to.'-m-t');

        $data = $this->get_billByClient($first_date_of_month, $last_date_of_month, $request->client_id)->get();

        // header
        $vipot_columns = array_unique($data->pluck('month_name')->toArray());
        $vipot_columns = array_values($vipot_columns);
        // dd($vipot_columns);

        // data
        $grouping = [];
        foreach ($data as $x=>$y) {
            $key = $y->provider_code;
            if (!array_key_exists($key, $grouping)) {
                $grouping[$key] = [
                    'name' => $y->provider_name,
                    'vipot_values' => [],
                    'ttl_px' => $y->jml_px,
                    'ttl_nilai' => $y->total
                ];
            } else {
                $grouping[$key]['ttl_px'] = $grouping[$key]['ttl_px'] + $y->jml_px;
                $grouping[$key]['ttl_nilai'] = $grouping[$key]['ttl_nilai'] + $y->total;
            }
            // grouping by month
            foreach ($vipot_columns as $v=>$w) {
                foreach($data as $j=>$k) {
                    if ($k->month_name==$w) {
                        if ($k->provider_code==$key) {
                            $grouping[$key]['vipot_values'][$k->month_name] = [
                                'px' => $k->jml_px,
                                'nilai' => $k->total
                            ];
                        }
                    } else {
                        if ($k->provider_code==$key) {
                            $grouping[$key]['vipot_values'][$k->month_name] = [
                                'px' => $k->jml_px,
                                'nilai' => $k->total
                            ];
                        } else {
                            $grouping[$key]['vipot_values'][$w] = [
                                'px' => 0,
                                'nilai' => 0
                            ];
                        }
                    }
                }
            }
            // sorting ref to vipot columns
            $grouping[$key]['vipot_values'] = array_merge(array_flip($vipot_columns), $grouping[$key]['vipot_values']);
        }

        // sum data
        $get_vipots = [];
        foreach ($grouping as $a=>$b) {
            foreach ($b['vipot_values'] as $c=>$d) {
                $get_vipots[$c][] = $d;
            }
        }
        $group_by_month = [];
        foreach ($get_vipots as $g=>$h) {
            foreach($h as $i=>$j) {
                $key = $g;
                if (! array_key_exists($key, $group_by_month) ) {
                    $group_by_month[$key] = [
                        'px'=>$j['px'],
                        'nilai'=>$j['nilai']
                    ];
                } else {
                    $group_by_month[$key]['px'] = $group_by_month[$key]['px'] + $j['px'];
                    $group_by_month[$key]['nilai'] = $group_by_month[$key]['nilai'] + $j['nilai'];
                }
            }
        }

        $data_return = [
            "vipot" => $vipot_columns,
            "data" => $grouping,
            "sum" => $group_by_month
        ];

        $parameter = [
            "title" => "Laporan Penjualan per Bulan",
            "client" => Mstclient::find($request->client_id)->name,
            "from" => $this->get_MonthName($request->month_from).' '.$request->year_from,
            "to" => $this->get_MonthName($request->month_to).' '.$request->year_to
        ];

        return view('admin.print.rpt_bill_bymonth')->with(compact('data_return','parameter'));
    }

    public function bill_bydate(Request $request)
    {
        return response()->json($request);
    }
}