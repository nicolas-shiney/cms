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

    private $db;

    public function __construct()
    {
        $this->db = new Database(BASE_DIR . '/configs/database.dev.yaml');
        $this->db->loadQueries(BASE_DIR . '/configs/queries.yaml');
    }

    /**
     * Display the list of users.
     */
    public function index(): void
    {
        $query = $this->db->getQuery('fetch_all_users');
        try {
            $users = $this->db->fetchAll($query);
        } catch (\Exception $e) {
            error_log("Failed to fetch users: " . $e->getMessage());
            error_log("[" . date('Y-m-d H:i:s') . "] [ERROR] Failed to fetch users: " . $e->getMessage(), 3, BASE_DIR . '/logs/errors-info.log');
            die("An error occurred. Please try again later.");
        }


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

            // Check if the username already exists
            $query = $this->db->getQuery('fetch_user_by_username');
            try {
                $existingUser = $this->db->fetchOne($query, [
                    'username' => $username,
                ]);
            } catch (\Exception $e) {
                error_log("Failed to fetch user: " . $e->getMessage());
                error_log("[" . date('Y-m-d H:i:s') . "] [ERROR] Failed to fetch user: " . $e->getMessage(), 3, BASE_DIR . '/logs/errors-info.log');
                die("An error occurred. Please try again later.");
            }


            if ($existingUser) {
                $view = new BaseView(BASE_DIR);
                $view->render('admin/user_add.tpl', [
                    'isAdmin' => true,
                    'title' => 'Add User',
                    'error' => "Username '{$username}' already exists. Please choose another.",
                ]);
                return;
            }

            // Insert the new user
            $query = $this->db->getQuery('insert_user');
            try {
                $this->db->execute( $query,
                    [
                        'username' => $username,
                        'email' => $email,
                        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
                        'role' => $role,
                    ]
                );
            } catch (\Exception $e) {
                error_log("Failed to inser user: " . $e->getMessage());
                error_log("[" . date('Y-m-d H:i:s') . "] [ERROR] Failed to inser user: " . $e->getMessage(), 3, BASE_DIR . '/logs/errors-info.log');
                die("An error occurred. Please try again later.");
            }


            header('Location: index.php?page=admin_users');
            exit;
        }

        // Render the form if it's not a POST request
        $view = new BaseView(BASE_DIR);
        $view->render('admin/user_add.tpl', [
            'isAdmin' => true,
            'title' => 'Add User',
        ]);
    }
}
