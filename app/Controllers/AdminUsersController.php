<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-11
 * Time: 21:14
 */
namespace App\Controllers;

use App\Views\BaseView;
use App\Services\Database;

class AdminUsersController
{
    /**
     * Display the list of users.
     */
    public function index(): void
    {
        $db = new Database(BASE_DIR . '/configs/database.dev.yaml');
        $users = $db->fetchAll("SELECT * FROM users");

        $view = new BaseView(BASE_DIR);
        $view->render('admin/users.tpl', [
            'isAdmin' => true,
            'title' => 'Admin - Manage Users',
            'jumbotron_title' => 'Users Management',
            'jumbotron_subtitle' => 'CRUD users here',
            'users' => $users,
        ]);
    }

    /**
     * Display the "Add User" form and handle form submission.
     */
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'user';

            $db = new Database(BASE_DIR . '/configs/database.dev.yaml');

            // Check if the username already exists
            $existingUser = $db->fetchOne("SELECT * FROM users WHERE username = :username", [
                'username' => $username,
            ]);

            if ($existingUser) {
                // Username already exists, render the form with an error message
                $view = new BaseView(BASE_DIR);
                $view->render('admin/user_add.tpl', [
                    'isAdmin' => true,
                    'title' => 'Add User',
                    'error' => "Username '{$username}' already exists. Please choose another.",
                ]);
                return; // Exit early to prevent insertion
            }

            // Proceed with insertion if username is unique
            if (!empty($username) && !empty($email) && !empty($password)) {

                $db->execute(
                    "INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)",
                    [
                        'username' => $username,
                        'email' => $email,
                        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
                        'role' => $role,
                    ]
                );
                // Redirect to the users list
                //header('Location: index.php?page=admin_users');
                exit;
            }
        }

        // Render the form if it's not a POST request
        $view = new BaseView(BASE_DIR);
        $view->render('admin/user_add.tpl', [
            'isAdmin' => true,
            'title' => 'Add User',
        ]);
    }

}
