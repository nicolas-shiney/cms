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
        $view = new BaseView(BASE_DIR);
        $view->render('home.tpl', array_merge($data, [
            'isAdmin' => false,
            'title' => "Simple CMS's home",
            'jumbotron_title' => 'Welcome to Simple CMS',
            'jumbotron_subtitle' => 'Manage your CMS content with ease.',
            'username' => 'John Doe',
            'content' => 'Welcome to the CMS!',
        ]));
    }
}
