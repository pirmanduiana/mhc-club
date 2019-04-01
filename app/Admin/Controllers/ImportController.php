<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use App\Mstclientemployee;
use DB;
use App\Mstclient;
use App\Mstclientemployeemember;

class ImportController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Import";

    public function viewKaryawan(Content $content)
    {
        // ...
        $clients = Mstclient::where('status_id',1)->get();
        return $content
            ->header($this->page_header)
            ->description('karyawan')
            ->body(view('admin.import.karyawan')->with(compact('clients')));
    }

    public function postKaryawan(Request $request)
    {
        // ...
        $topic = "karyawan";
        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();
            $data = array_map('str_getcsv', file($path));
            
            ini_set('max_execution_time', 600);
            ini_set('memory_limit', '-1');
            $row = 1;
            $loop_success = false;
            
            DB::beginTransaction();
            try {                
                if ($request->import_type==0) {
                    Mstclientemployee::truncate();
                }
                foreach($data as $k=>$v){
                    if($row==1){
                        $row++; continue;
                    }
                    $employee = new Mstclientemployee();
                    $employee->id = $v[0];
                    $employee->mhc_code = $v[1];
                    $employee->name = $v[2];
                    $employee->dob = $v[3];
                    $employee->address = $v[4];
                    $employee->phone = $v[5];
                    $employee->client_id = $request->client_id;
                    $employee->department_id = $v[7];
                    $employee->class_id = $v[8];
                    $employee->status_id = $v[9];
                    $employee->bpjs_code = $v[10];
                    $employee->save();
                    $loop_success = true;
                }
            } catch (\Illuminate\Database\QueryException $e) {
                $loop_success = false;
                DB::rollBack();
                return $e;
            }
            DB::commit();
            return back()->with('status', (count($data)-1).' data '.$topic.' sudah di-import!');
        }
        return back()->with('salah', 'File belum dipilih!');
    }


    public function viewTanggungan(Content $content)
    {
        // ...
        $karyawan = Mstclientemployee::where('status_id',1)->get();
        return $content
            ->header($this->page_header)
            ->description('tanggungan')
            ->body(view('admin.import.tanggungan')->with(compact('karyawan')));
    }

    public function postTanggungan(Request $request)
    {
        // ...
        $topic = "tanggungan";
        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();
            $data = array_map('str_getcsv', file($path));
            
            ini_set('max_execution_time', 600);
            ini_set('memory_limit', '-1');
            $row = 1;
            $loop_success = false;
            
            DB::beginTransaction();
            try {                
                if ($request->import_type==0) {
                    Mstclientemployeemember::truncate();
                }
                foreach($data as $k=>$v){
                    if($row==1){
                        $row++; continue;
                    }
                    $tanggungan = new Mstclientemployeemember();
                    $tanggungan->id = $v[0];
                    $tanggungan->mhc_code = $v[1];
                    $tanggungan->name = $v[2];
                    $tanggungan->dob = $v[3]; 
                    $tanggungan->bpjs_code = $v[4];
                    $tanggungan->employee_id = $v[5];
                    $tanggungan->family_status = $v[6];
                    $tanggungan->status_id = $v[7];
                    $tanggungan->save();
                    $loop_success = true;
                }
            } catch (\Illuminate\Database\QueryException $e) {
                $loop_success = false;
                DB::rollBack();
                return $e;
            }
            DB::commit();
            return back()->with('status', (count($data)-1).' data '.$topic.' sudah di-import!');
        }
        return back()->with('salah', 'File belum dipilih!');
    }
}
