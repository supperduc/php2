<?php

namespace  Vietanh\Mvcoop\Controllers\Admin;

use Vietanh\Mvcoop\Commons\Controller;
use Vietanh\Mvcoop\Models\User;

class UserController extends Controller
{
    private User $user;
    private string $folder = 'users.';
    public function __construct()
    {
        $this->user = new User;
    }
    public function index()
    {
        $data['users'] = $this->user->getAll();
        // print_r($data['users']);

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function create()
    {
        if (!empty($_POST)) {
            // echo '<pre>';
            // print_r($_POST);
            // die();
            $this->user->insert($_POST['name'], $_POST['email'], $_POST['password']);
            header('location: ./');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    public function show($id)
    {
        $data['users'] = $this->user->getByID($id);

        if (empty($data['users'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function update($id)
    {
        $data['users'] = $this->user->getByID($id);

        // print_r($data);
        if (empty($data['users'])) {
            // echo 123;
            die(404);
        }
        if (!empty($_POST)) {
            // $_SESSION['success'] = null;
            $this->user->update($data['users']['id'], $_POST['name'], $_POST['email'], $_POST['password']);

            $_SESSION['success'] = 'Thao tác thành công';

            header("location: http://localhost/PHP_2/MVCOOP/admin/users/$id/update");
            exit();
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function delete($id)
    {
        $data['Categories'] = $this->user->getByID($id);
        if (empty($data['Categories'])) {
            echo '404 - Not_found';
        }
        $this->user->deleteByID($id);
        header('location: http://localhost/PHP_2/MVCOOP/admin/users');
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
}
