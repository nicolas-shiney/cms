<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-10
 * Time: 10:22
 */
namespace App\Controllers;
use App\Views\BaseView;

class GalleryController
{
    public function index(array $data = []): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('gallery.tpl', array_merge($data, [
            'title' => 'Look at those!',
            'content' => 'Look at those awesome pictures!',
        ]));
    }
}
