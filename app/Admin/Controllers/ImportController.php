<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use App\Mstclientemployee;
use DB;
use App\Mstclientemployeemember;
use App\Mstprovider;
use Encore\Admin\Facades\Admin;

class ImportController extends Controller
{
    use HasResourceActions;

    protected $page_header = "Import";

    public function viewKaryawan(Content $content)
    {
        // ...
        return $content
            ->header($this->page_header)
            ->description('karyawan')
            ->body(view('admin.import.karyawan'));
    }

    public function postKaryawan()
    {
        // ...
    }
}
