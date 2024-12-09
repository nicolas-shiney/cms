<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */

namespace App\Controllers;

use App\Views\BaseView;

class HomeController
{
    public function index(): void
    {
        $view = new BaseView();
        $view->render('home.tpl', [
            'title' => 'Home Page',
            'content' => 'Welcome to the Home Page!',
        ]);
    }
}

