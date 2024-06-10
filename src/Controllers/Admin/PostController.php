<?php

namespace  Vietanh\Mvcoop\Controllers\Admin;

use Vietanh\Mvcoop\Commons\Controller;
use Vietanh\Mvcoop\Models\Categories;
use Vietanh\Mvcoop\Models\Post;

class PostController extends Controller
{
    private Post $Post;
    // private Categories $Categories;
    private string $folder = 'Post.';

    const PATH_UPLOADS = '/uploads/post/';
    public function __construct()
    {
        $this->Post = new Post;
    }
    public function indexPost()
    {
        $data['Post'] = $this->Post->getAllPost();
        // print_r($data['Posts']);

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function createPost()
    {
        $data['getAllCategories'] = (new Categories)->getAllCategories();

        if (!empty($_POST)) {
            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            if (!empty($image)) {
                $imagePath =  self::PATH_UPLOADS . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }
            $postID['id'] = $this->Post->insertPost($_POST['title'], $_POST['excerpt'], $_POST['content'], $imagePath, $_POST['category_id']);

            // XỬ LÝ MULTIUPLOAD FILE
            $dataPostGallery = [];
            $postGalleries = $_FILES['post_galleries'] ?? [];
            if (!empty($postGalleries)) {
                $countFile = count($postGalleries['name']); //Đếm số lượng upload file lên

                for ($i = 0; $i < $countFile; $i++) {
                    $imagePath =  self::PATH_UPLOADS . time() . $postGalleries['name'][$i];

                    if (!move_uploaded_file($postGalleries['tmp_name'][$i], PATH_ROOT . $imagePath)) {
                        $imagePath = null;
                    } else {
                        $dataPostGallery[] = [
                            'post_id' => $postID,
                            'image' => $imagePath
                        ];

                    }
                }
            }
            header('Location: ./');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function showPost($id)
    {
        $data['Post'] = $this->Post->getByIDPost($id);
        $Categories = new Categories();
        // $data['getByIDCategories'] = $Categories->getByIDCategories($getAllCategories['id']);
        // print_r($data['Post']);
        // die();
        if (empty($data['Post'])) {
            echo 32;
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function updatePost($id)
    {
        $data['Post'] = $this->Post->getByIDPost($id);
        $data['getAllCategories'] = (new Categories)->getAllCategories();
        if (empty($data['Post'])) {
            echo '404 - Not_found';
        }
        if (!empty($_POST)) {
            if (!empty($_POST)) {
                $move = false;
                $image = $_FILES['image'] ?? null;
                $imagePath = null;
                if ($image) {
                    $imagePath = self::PATH_UPLOADS . time() . $image['name'];
                    if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                        $imagePath =  $data['Post']['image'];
                    } else {
                        $move = true;
                    }
                }
                $this->Post->updatePost($data['Post']['id'], $_POST['title'], $_POST['excerpt'], $_POST['content'], $imagePath, $_POST['category_id']);

                if ($move && $data['Post']['image'] && file_exists(PATH_ROOT . $data['Post']['image'])) {
                    unlink(PATH_ROOT . $data['Post']['image']);
                }
                $_SESSION['success'] = 'Thao tác thành công';

                header("Location: MVCOOP/admin/Post/$id/updatePost");
                exit();
            }
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function deletePost($id)
    {
        $data['Post'] = $this->Post->getByIDPost($id);
        if (empty($data['Post'])) {
            echo '404 - Not_found';
        }
        $this->Post->deleteByIDPost($id);
        header('location: /MVCOOP/admin/post');
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
}
