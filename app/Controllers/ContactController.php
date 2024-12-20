<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */
namespace App\Controllers;
use App\Views\BaseView;

class ContactController
{
    public function index(array $data = []): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('contact.tpl', array_merge($data, [
            'isAdmin' => false,
            'title' => 'Contact Us',
            'jumbotron_title' => 'Welcome to Simple CMS',
            'jumbotron_subtitle' => 'Manage your CMS content with ease.',
            'content' => 'Feel free to reach out to us using the form below.',
        ]));
    }
}
