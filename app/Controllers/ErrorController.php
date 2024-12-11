<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-10
 * Time: 10:41
 */
namespace App\Controllers;
use App\Views\BaseView;

class ErrorController
{
    public function index(array $data = []): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('contact.tpl', array_merge($data, [
            'title' => 'Error',
            'content' => 'Error',
        ]));
    }
}
