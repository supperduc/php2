<?php

namespace Vietanh\Mvcoop\Controllers\Client;

use Vietanh\Mvcoop\Commons\Controller;
use Vietanh\Mvcoop\Models\Categories;
use Vietanh\Mvcoop\Models\Post;
use Vietanh\Mvcoop\Models\User;

class PostController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }
    public function show($id)
    {
        $postShow = $this->post->getByIDPost($id);
// debug($postShow);
        return $this->renderViewClient(
            'post-show',
            [
                'postShow' => $postShow,
            ]
        );
    }
}
