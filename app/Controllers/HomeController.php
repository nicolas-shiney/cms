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
    public function index(array $data = []): void
    {
        $view = new BaseView();
        $view->render('home.tpl', array_merge($data, [
            'title' => "Simple CMS's home",
            'username' => 'John Doe',
            'content' => 'Welcome to the CMS!',
        ]));
    }
}
