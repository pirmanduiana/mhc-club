<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use App\Mstclientemployee;
use DB;
use App\Mstclientemployeemember;
use App\Mstprovider;
use Encore\Admin\Facades\Admin;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $provider = Mstprovider::find(Admin::user()->provider_id);
        return $content
            ->header('Dashboard')
            ->description(' ')
            ->body(view('admin.dashboard')->with(compact('provider')));
    }

    private function searchSrc($search_value)
    {
        $karyawan = Mstclientemployee::join('mst_client','mst_client.id','=','mst_client_employee.client_id')
        ->join('mst_status','mst_status.id','=','mst_client_employee.status_id')
        ->where('mst_client_employee.name','LIKE',"%{$search_value}%")
        ->orWhere('mst_client_employee.mhc_code','LIKE',"%{$search_value}%")
        ->select(
            DB::raw('0 as seq'),
            'mst_client_employee.id',
            DB::raw('"karyawan" AS "type"'),
            DB::raw('mst_client.name AS "client_name"'),
            DB::raw('0 AS "parent_id"'),
            'mst_client_employee.mhc_code',
            'mst_client_employee.name',
            DB::raw('mst_status.name AS "status_name"'),
            DB::raw('CONCAT("/admin/employee/",mst_client_employee.id) as view_url')
        );
        $tanggungan = Mstclientemployeemember::join('mst_status','mst_status.id','=','mst_client_employee_member.status_id')
        ->join('mst_client_employee','mst_client_employee.id','=','mst_client_employee_member.employee_id')
        ->join('mst_client','mst_client.id','=','mst_client_employee.client_id')
        ->where('mst_client_employee_member.name','LIKE',"%{$search_value}%")
        ->orWhere('mst_client_employee_member.mhc_code','LIKE',"%{$search_value}%")
        ->select(
            DB::raw('1 as seq'),
            'mst_client_employee_member.id',
            DB::raw('"tanggungan" AS "type"'),
            DB::raw('mst_client.name AS "client_name"'),
            DB::raw('mst_client_employee_member.employee_id AS "parent_id"'),
            'mst_client_employee_member.mhc_code',
            'mst_client_employee_member.name',
            DB::raw('mst_status.name AS "status_name"'),
            DB::raw('CONCAT("/admin/employee/",mst_client_employee_member.employee_id) as view_url')
        )->union($karyawan)->orderBy('seq')->get();

        return $tanggungan;
    }

    public function search($search_value="")
    {
        $result = $this->searchSrc($search_value);

        $group = [];
        foreach ($result as $x=>$y) {
            $group[$y->type][$y->id] = [
                'kode' => $y->mhc_code,
                'nama' => $y->name,
                'status' => $y->status_name,
                'client' => $y->client_name,
                'view_url' => $y->view_url
            ];
        }

        return response()->json($group);
    }
}
