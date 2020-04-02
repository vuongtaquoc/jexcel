<?php

$files = ['jexcel.core.js', 'jexcel.extensions.js', 'jexcel.formulas.js'];

if ($handle = opendir('js')) {
    $js = '';
    $css = '';

    foreach ($files as $entry) {
        if ($entry != "." && $entry != ".." && (! isset($modules) || in_array(substr($entry, 0, strpos($entry, '.')), $modules))) {
            $js .= file_get_contents('js/'.$entry) . "\r\n\r\n";
        }
    }

    closedir($handle);

    $js = "
/**
 * jExcel v3.10.1
 *
 * Author: Vuong Ta Quoc <tqv.itvn@gmail.com>
 * Git: https://github.com/vuongtaquoc/
 * Description: Create amazing web based spreadsheets.
 *
 * This software is distribute under MIT License
 */

 if (! jSuites && typeof(require) === 'function') {
    var jSuites = require('jsuites');
    require('jsuites/dist/jsuites.css');
}

;(function (window, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    window.jexcel = factory();
}(this, (function () {

    'use strict';

$js

    return jexcel;

})));";

    file_put_contents('../dist/jexcel.js', $js);
}
