<?php
include 'Models/Database.php';
include 'Controllers/Controller.php';

class AuthController extends Controller
{
    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
        if (isset($_SESSION['auth'])) {
            $this->redirect(url('account/dashboard'));
        }
    }

    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function login()
    {
        return include 'Views/auth/login.php';
    }

    protected function auth($data)
    {
        $_SESSION['auth'] = true;
        $_SESSION['auth_name'] = $data['name'];
        $_SESSION['auth_role'] = $data['role'];
        $_SESSION['auth_email'] = $data['email'];
        $this->redirect(url('account/dashboard'));
    }

    public function login_check()
    {
        if ($data = $this->db->check($_POST['email'], $_POST['password'])) {
            $this->auth($data);
        }
        $this->redirect(url('auth/login'));
    }

    public function register()
    {
        return include 'Views/auth/register.php';
    }

    public function register_store()
    {
        if ($this->isAjax()) {
            $output = [];
            header("Content-Type: application/json");
            http_response_code(422);
            $form['name'] = isset($_POST['name']) ? $_POST['name'] : '';
            $form['role'] = isset($_POST['role']) ? $_POST['role'] : '';
            $form['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $form['password'] = isset($_POST['password']) ? $_POST['password'] : '';
            $form['agreement'] = isset($_POST['agreement']) ? $_POST['agreement'] : '';
            if ($this->db->check_email($_POST['email'])) {
                $output['status'] = 'Email Already Exist';
                if ($this->db->store($form)) {
                    http_response_code(200);
                    $output['status'] = 'Register Success';
                    $output['link'] = url('auth/login');
                }
            }
            return json_encode($output);
        } else {
            $this->redirect(url('auth/register'));
        }
    }
}