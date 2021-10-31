<?php

include "Controllers/Controller.php";

class AccountController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['auth'])){
            $this->redirect(url('auth/login'));
        }

    }
    public function dashboard(){
        $this->view('account/dashboard');
    }
    public function logout(){
        $_SESSION['auth']=null;
        $this->redirect(url('auth/login'));
    }
}