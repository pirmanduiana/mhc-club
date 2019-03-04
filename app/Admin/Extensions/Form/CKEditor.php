<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        '/vendor/ckeditor_4.11.2/ckeditor.js',
        '/vendor/ckeditor_4.11.2/adapters/jquery.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        $this->script = "$('textarea.{$this->getElementClassString()}').ckeditor({width:'100%'});";

        return parent::render();
    }
}