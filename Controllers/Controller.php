<?php

class Controller
{
    public function view($view_name){
        return include_once 'Views/'.$view_name.'.php';
    }
    public function model($model_name){
        return include_once  'Models/'.$model_name.'.php';
    }
    public function redirect($to){
        header("Location:".$to);
    }
}