<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-10
 * Time: 10:22
 */

namespace App\Controllers;

class GaleryController
{
    public function index(array $data = []): void
    {
        $view = new BaseView();
        $view->render('galery.tpl', array_merge($data, [
            'title' => 'Look at those!',
            'content' => 'Feel free to reach out to us using the form below.',
        ]));
    }
}
