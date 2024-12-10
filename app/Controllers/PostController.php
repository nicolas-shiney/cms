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
        $view = new BaseView();
        $view->render('post.tpl', array_merge($data, [
            'title' => 'Post',
            'content' => 'So much to read here.',
        ]));
    }
}
