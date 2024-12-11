<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */
namespace App\Controllers;
use App\Views\BaseView;

class AboutController
{
    public function index(array $data = []): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('about.tpl', array_merge($data, [
            'isAdmin' => false,
            'title' => 'About Us',
            'jumbotron_title' => 'Welcome to Simple CMS',
            'jumbotron_subtitle' => 'Manage your CMS content with ease.',
            'content' => 'Here is where you get to know more about us.',
        ]));
    }
}
