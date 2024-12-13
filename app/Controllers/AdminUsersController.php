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

    public function edit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $role = $_POST['role'] ?? 'user';

            try {
                // Validate uniqueness for username and email
                $existingUserByUsername = $this->userModel->getUserByUsername($username);
                $existingUserByEmail = $this->userModel->getUserByEmail($email);

                if ($existingUserByUsername && $existingUserByUsername['id'] !== $id) {
                    $this->messageHandler->setFlash('danger', "Username <strong>{$username}</strong> is already taken.");
                    header("Location: index.php?page=user_edit&id=$id");
                    exit;
                }

                if ($existingUserByEmail && $existingUserByEmail['id'] !== $id) {
                    $this->messageHandler->setFlash('danger', "Email <strong>{$email}</strong> is already in use.");
                    header("Location: index.php?page=user_edit&id=$id");
                    exit;
                }

                // Update user in database
                $this->userModel->updateUser($id, $username, $email, $role);
                $this->messageHandler->setFlash('success', "User <strong>{$username}</strong> updated successfully.");
                header('Location: index.php?page=admin_users');
                exit;
            } catch (\Exception $e) {
                $this->messageHandler->logError('Failed to update user', $e);
                die("An error occurred. Please try again later.");
            }
        }

        $id = (int)($_GET['id'] ?? 0);
        $user = $this->userModel->getUserById($id);

        if (!$user) {
            $this->messageHandler->setFlash('danger', "User not found.");
            header('Location: index.php?page=admin_users');
            exit;
        }

        $view = new BaseView(BASE_DIR);
        $view->render('admin/user_edit.tpl', [
            'isAdmin' => true,
            'title' => 'Edit User',
            'user' => $user,
            'flashMessages' => $this->messageHandler->getFlashAndClear(),
        ]);
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = intval($_POST['id'] ?? 0);

            if ($userId === 0) {
                $this->messageHandler->setFlash('danger', "Invalid user ID.");
                header('Location: index.php?page=admin_users');
                exit;
            }

            try {
                $user = $this->userModel->getUserById($userId);

                if (!$user) {
                    $this->messageHandler->setFlash('danger', "User not found.");
                    header('Location: index.php?page=admin_users');
                    exit;
                }

                $this->userModel->deleteUserById($userId);
                $this->messageHandler->setFlash('success', "User <strong>{$user['username']}</strong> deleted successfully.");
            } catch (\Exception $e) {
                $this->messageHandler->logError('Failed to delete user', $e);
                $this->messageHandler->setFlash('danger', "An error occurred. Please try again.");
            }

            header('Location: index.php?page=admin_users');
            exit;
        }

        // If it's not a POST request, redirect back to users page
        header('Location: index.php?page=admin_users');
        exit;
    }


}
