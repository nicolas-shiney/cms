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
            'isAdmin' => false,
            'title' => 'Look at those!',
            'jumbotron_title' => 'Welcome to Simple CMS',
            'jumbotron_subtitle' => 'Manage your CMS content with ease.',
            'content' => 'Look at those awesome pictures!',
        ]));
    }
}
