<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-11
 * Time: 13:56
 */
namespace App\Controllers;

use App\Views\BaseView;

class AdminController
{
    public function index(): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('admin/dashboard.tpl', [
            'isAdmin' => true,
            'title' => 'Admin Dashboard',
            'jumbotron_title' => ' Admin Dashboard',
            'jumbotron_subtitle' => 'Manage your CMS content with ease.',
        ]);
    }
}
