<?php
// This route handling function will only be executed when visiting http(s)://www.example.org/about
use Bramus\Router\Router;
use Vietanh\Mvcoop\Controllers\Admin\AuthenticateController;
use Vietanh\Mvcoop\Controllers\Admin\CategoryController;
use Vietanh\Mvcoop\Controllers\Admin\DashboardController;
use Vietanh\Mvcoop\Controllers\Admin\PostController;
use Vietanh\Mvcoop\Controllers\Admin\UserController;
use Vietanh\Mvcoop\Controllers\Client\HomeController;
use Vietanh\Mvcoop\Controllers\Client\PostController as ClientPostController;


//Khởi tạo đối tượng ROUTER
$router = new Router();
//Khai báo các đường dẫn mà mình



$router->get('/', HomeController::class . '@index');
$router->get('/post/{id}', ClientPostController::class . '@show');

$router->match('GET|POST', '/auth/login',  AuthenticateController::class . '@login');

$router->mount('/admin', function () use ($router) {
    $router->get('/',       DashboardController::class . '@index');
    $router->get('/logout', AuthenticateController::class . '@logout');

    $router->mount('/users', function () use ($router) {
        $router->get('/',                           UserController::class . '@index');
        $router->get('/{id}/show',                  UserController::class . '@show');
        $router->get('/{id}/delete',                UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
        $router->match('GET|POST', '/create',       UserController::class . '@create');
    });
});
$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->get('/logout', AuthenticateController::class . '@logout');

    $router->mount('/categories', function () use ($router) {
        $router->get('/',                                     CategoryController::class . '@indexCategories');
        $router->get('/{id}/showCategories',                  CategoryController::class . '@showCategories');
        $router->get('/{id}/deleteCategories',                CategoryController::class . '@deleteCategories');
        $router->match('GET|POST', '/{id}/updateCategories',  CategoryController::class . '@updateCategories');
        $router->match('GET|POST', '/createCategories',       CategoryController::class . '@createCategories');
    });
});
$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->get('/logout', AuthenticateController::class . '@logout');

    $router->mount('/post', function () use ($router) {
        $router->get('/',                               PostController::class . '@indexPost');
        $router->get('/{id}/showPost',                  PostController::class . '@showPost');
        $router->get('/{id}/deletePost',                PostController::class . '@deletePost');
        $router->match('GET|POST', '/{id}/updatePost',  PostController::class . '@updatePost');
        $router->match('GET|POST', '/createPost',       PostController::class . '@createPost');
    });
});
//Đang nhập vào admin.
$router->before('GET|POST', '/admin/*', function(){
    if(!isset($_SESSION['user'])){
        header('location: /MVCOOP/auth/login');
        exit();
    }
});
//Đăng nhập sau admin/....
$router->before('GET|POST', '/admin/.*', function(){
    if(!isset($_SESSION['user'])){
        header('location: /MVCOOP/auth/login');
        exit();
    }
});

// Chạy đường dẫn
$router->run();
