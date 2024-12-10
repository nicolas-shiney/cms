<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-10
 * Time: 10:41
 */

namespace App\Controllers;

class PostController
{
    public function show($id): void
    {
        echo "Displaying post with ID: $id";
    }
}
