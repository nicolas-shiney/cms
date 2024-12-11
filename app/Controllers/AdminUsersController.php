<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-11
 * Time: 21:14
 */
namespace App\Controllers;
use App\Views\BaseView;

class AdminUsersController
{
    public function index(): void
    {
        $view = new BaseView(BASE_DIR);
        $view->render('admin/users.tpl', [
            'title' => 'Manage Users',
            'isAdmin' => true,
        ]);
    }
}
