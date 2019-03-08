<?php

namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class CheckRow
{
    protected $id;

    public function __construct($id)
    {        
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT
//...
SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());
        return '<a href="/admin/tanggungan?&name=&mhc_code=&employee_id='.$this->id.'" class="grid-check-row" data-id="'.$this->id.'" title="tampilkan tanggungan"><i class="fa fa-user"></i></a>&nbsp;';
    }

    public function __toString()
    {
        return $this->render();
    }
}