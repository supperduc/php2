<?php

namespace  Vietanh\Mvcoop\Controllers\Admin;

use Vietanh\Mvcoop\Commons\Controller;
use Vietanh\Mvcoop\Models\Categories;

class CategoryController extends Controller
{
    private Categories $Categories;
    private string $folder = 'Categories.';
    public function __construct()
    {
        $this->Categories = new Categories;
    }
    public function indexCategories()
    {
        $data['Categories'] = $this->Categories->getAllCategories();
        // print_r($data['Categoriess']);

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function createCategories()
    {
        if (!empty($_POST)) {
            $this->Categories->insertCategories($_POST['name']);
            header('location: ./');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    public function showCategories($id)
    {
        $data['Categories'] = $this->Categories->getByIDCategories($id);

        if (empty($data['Categories'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function updateCategories($id)
    {
        $data['Categories'] = $this->Categories->getByIDCategories($id);

        if (empty($data['Categories'])) {
            echo '404 - Not_found';
        }
        if(!empty($_POST)) {
            $this->Categories->updateCategories($data['Categories']['id'],$_POST['name']);
            $_SESSION['success'] = 'Thao tác thành công';

            header("Location: /admin/categories/$id/updateCategories");
            exit();
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function deleteCategories($id)
    {
        $data['Categories'] = $this->Categories->getByIDCategories($id);
        if(empty($data['Categories'])) {
            echo '404 - Not_found';
        }
        $this->Categories->deleteByIDCategories($id);
        header('location: http://localhost/PHP_2/MVCOOP/admin/categories');
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
}
