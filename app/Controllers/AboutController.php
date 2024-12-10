<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */

namespace App\Controllers;

use App\Views\BaseView;

class AboutController
{
    public function index(array $data = []): void
    {
        $view = new BaseView();
        $view->render('about.tpl', array_merge($data, [
            'title' => 'About Us',
            'content' => 'Here is where you get to know more about us.',
        ]));
    }
}
