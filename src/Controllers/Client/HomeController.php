<?php

namespace Vietanh\Mvcoop\Controllers\Client;

use Vietanh\Mvcoop\Commons\Controller;
use Vietanh\Mvcoop\Models\Categories;
use Vietanh\Mvcoop\Models\Post;
use Vietanh\Mvcoop\Models\User;

class HomeController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        $postHot = $this->post->getAHot();
        $postTop6 = $this->post->getTop6();
        $postTop6Chunk = array_chunk($postTop6,3);
        return $this->renderViewClient(
            'home',
            [
                'postHot' => $postHot,
                'postTop6' => $postTop6,
                'postTop6Chunk' => $postTop6Chunk
            ]
        );
    }
}
