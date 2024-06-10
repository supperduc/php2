<?php

namespace Vietanh\Mvcoop\Controllers\Admin;

use Vietanh\Mvcoop\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->renderViewAdmin('dashboard');
    }
}

