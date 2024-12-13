<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-11
 * Time: 21:14
 */
namespace App\Controllers;

use App\Views\BaseView;
use App\Models\User;
use App\Services\Database;
use App\Utilities\MessageHandler;

class AdminUsersController
{
    private $userModel;
    private $messageHandler;

    public function __construct()
    {
        $db = new Database(CONFIG_DIR . '/database.dev.yaml');
        $db->loadQueries(CONFIG_DIR . '/queries.yaml');
        $this->userModel = new User($db);
        $this->messageHandler = new MessageHandler();
    }

    public function index(): void
    {
        try {
            $users = $this->userModel->getAllUsers();
        } catch (\Exception $e) {
            $this->messageHandler->logError('Failed to fetch users', $e);
            die("An error occurred. Please try again later.");
        }
        $view = new BaseView(BASE_DIR);
        $view->render('admin/users.tpl', [
            'isAdmin' => true,
            'title' => 'Admin - Manage Users',
            'jumbotron_title' => 'Users Management',
            'jumbotron_subtitle' => 'CRUD users here',
            'users' => $users,
            'flashMessages' => $this->messageHandler->getFlashAndClear(),
        ]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'user';

            try {
                // Check if the username already exists
                $existingUserByUsername = $this->userModel->getUserByUsername($username);
                if ($existingUserByUsername) {
                    $this->messageHandler->setFlash('danger', "Username <strong>{$username}</strong> already exists.");
                    header('Location: index.php?page=user_add');
                    exit;
                }

                // Check if the email already exists
                $existingUserByEmail = $this->userModel->getUserByEmail($email);
                if ($existingUserByEmail) {
                    $this->messageHandler->setFlash('danger', "Email <strong>{$email}</strong> already exists.");
                    header('Location: index.php?page=user_add');
                    exit;
                }

                // Insert the new user
                $this->userModel->addUser(
                    $username,
                    $email,
                    password_hash($password, PASSWORD_BCRYPT),
                    $role
                );

                $this->messageHandler->setFlash('success', "User <strong>{$username}</strong> added successfully.");
                header('Location: index.php?page=admin_users');
                exit;

            } catch (\Exception $e) {
                $this->messageHandler->logError('Failed to add user', $e);
                die("An error occurred. Please try again later.");
            }
        }

        $view = new BaseView(BASE_DIR);
        $view->render('admin/user_add.tpl', [
            'isAdmin' => true,
            'title' => 'Add User',
            'flashMessages' => $this->messageHandler->getFlashAndClear(),
        ]);
    }
}
