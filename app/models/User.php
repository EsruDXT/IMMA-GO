<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class User extends Database
{
    protected $table = 'users';

    // GET ALL USERS
    public function getUsers()
    {
        $users = [];
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }

        return $users;
    }

    // GET USER BY ID
    public function getUserById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // REGISTER
    public function insert(array $data)
    {
        $name = htmlspecialchars($data['name']);
        $email = strtolower(trim($data['email']));
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        // CEK EMAIL DUPLIKAT
        $check = $this->connection->prepare("SELECT id FROM {$this->table} WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            return false;
        }

        // INSERT
        $query = "INSERT INTO {$this->table} (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sss", $name, $email, $password);

        return $stmt->execute();
    }

    // LOGIN
    public function login(string $email, string $password)
    {
        $email = strtolower(trim($email));

        $query = "SELECT id, name, email, password FROM {$this->table} WHERE email = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            return $user;
        }

        return false;
    }

    // UPDATE
    public function update(array $data, int $id)
    {
        $name = htmlspecialchars($data['name']);
        $email = htmlspecialchars($data['email']);

        // kalau password diisi → hash
        if (!empty($data['password'])) {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $query = "UPDATE {$this->table} SET name = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sssi", $name, $email, $password, $id);
        } else {
            // kalau password kosong → jangan update password
            $query = "UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ssi", $name, $email, $id);
        }

        return $stmt->execute();
    }

    // DELETE
    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);

        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}