<?php
if (!function_exists('url')){
    function url($name){
        return '/index.php?url='.$name;
    }
}