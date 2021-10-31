<?php

include 'Controllers/Controller.php';

class HomeController extends Controller
{
    public  function home(){
        return $this->view('home');
    }
    public function privacy(){
        return $this->view('privacy');
    }
}