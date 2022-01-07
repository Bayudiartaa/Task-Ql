<?php

use Illuminate\Support\Facades\Request;


if (! function_exists('setActive')){
    //mengecek apakah route tertentu sedang aktif atau tidak
    //menambah class active pada tag html
    function setActive($path)
    {
        return Request::is($path.'*') ? 'active' : '';
    }
}

?>
