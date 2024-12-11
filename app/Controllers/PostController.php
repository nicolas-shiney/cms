<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-10
 * Time: 10:41
 */
namespace App\Controllers;
use App\Views\BaseView;

class PostController
{
    public function index(array $data = []): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('post.tpl', array_merge($data, [
            'isAdmin' => false,
            'title' => 'Post',
            'jumbotron_title' => 'Welcome to Simple CMS',
            'jumbotron_subtitle' => 'Manage your CMS content with ease.',
            'content' => 'So much to read here.',
        ]));
    }
}
