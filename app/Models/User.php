<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-13
 * Time: 13:02
 */
namespace App\Models;

use App\Services\Database;

class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAllUsers(): array
    {
        $query = $this->db->getQuery('fetch_all_users');
        return $this->db->fetchAll($query);
    }

    public function getUserById(int $id): ?array
    {
        $query = $this->db->getQuery('fetch_user_by_id');
        return $this->db->fetchOne($query, ['id' => $id]);
    }

    public function getUserByUsername(string $username): ?array
    {
        $query = $this->db->getQuery('fetch_user_by_username');
        return $this->db->fetchOne($query, ['username' => $username]);
    }

    public function getUserByEmail(string $email): ?array
    {
        $query = $this->db->getQuery('fetch_user_by_email');
        return $this->db->fetchOne($query, ['email' => $email]);
    }

    public function addUser(string $username, string $email, string $passwordHash, string $role): void
    {
        $query = $this->db->getQuery('insert_user');
        $this->db->execute($query, [
            'username' => $username,
            'email' => $email,
            'password_hash' => $passwordHash,
            'role' => $role,
        ]);
    }

    public function updateUser(int $id, string $username, string $email, string $role): void
    {
        $query = $this->db->getQuery('update_user');
        $this->db->execute($query, [
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'role' => $role,
        ]);
    }

    public function deleteUserById(int $id): void
    {
        $query = $this->db->getQuery('delete_user');
        $this->db->execute($query, ['id' => $id]);
    }

}
