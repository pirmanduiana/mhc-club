<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use Encore\Admin\Form;
use App\Admin\Extensions\Form\CKEditor;

Encore\Admin\Form::forget(['map', 'editor']);

Form::extend('ckeditor', CKEditor::class);

// autonumeric js
Admin::js('/vendor/autoNumeric/autoNumeric.js');

// highlight js
Admin::js('/vendor/highlight/jquery.highlight-5.js');

// qrcode js
Admin::js('/vendor/qrcodejs/qrcode.js');

// jquery print
Admin::js('/vendor/jprint/jQuery.print.min.js');