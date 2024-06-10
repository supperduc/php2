<?php

namespace  Vietanh\Mvcoop\Controllers\Admin;

use Vietanh\Mvcoop\Commons\Controller;
use Vietanh\Mvcoop\Models\User;

class AuthenticateController extends Controller
{
    public function login()
    {
        
        if (!empty($_POST)) {
            $_SESSION['errors'] = null;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors']['email'] = 'Email không được để trống và đúng định dạng';
            }

            if (empty($name)) {
                $_SESSION['errors']['name'] = 'Name không được để trống';
            }

            if (empty($password)) {
                $_SESSION['errors']['password'] = 'Password không được để trống';
            }

            $user = (new User)->getByEmailAndPassword($_POST['name'],$_POST['email'], $_POST['password']);
            if (empty($user)) {
                $_SESSION['errors']['not-found'] = 'Không tìm thấy người dùng !';
            } else {
                $_SESSION['user'] = $name;
                header('Location: /MVCOOP/admin/');
                exit();
            }
        }
        return $this->renderViewAdmin(__FUNCTION__);
    }

    public function logout() {
        session_destroy();
        header('Location: /MVCOOP/admin');
        exit();
    }

}
