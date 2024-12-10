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
    public function notFound(): void
    {
        $view = new BaseView();
        $view->render('errors/404.tpl', [
            'title' => 'Page Not Found',
        ]);
    }
}
