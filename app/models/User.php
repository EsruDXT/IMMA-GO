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
        $name = htmlspecialchars(trim($data['name']));
        $email = strtolower(trim($data['email']));
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        // DEFAULT ROLE
        $role = $data['role'] ?? 'student';

        // CEK EMAIL DUPLIKAT
        $check = $this->connection->prepare(
            "SELECT id FROM {$this->table} WHERE email = ?"
        );

        $check->bind_param("s", $email);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            return false;
        }

        // INSERT USER
        $query = "INSERT INTO {$this->table}
                  (name, email, password, role)
                  VALUES (?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param(
            "ssss",
            $name,
            $email,
            $password,
            $role
        );

        return $stmt->execute();
    }

    // LOGIN
    public function login(string $email, string $password)
    {
        $email = strtolower(trim($email));

        $query = "SELECT
                    id,
                    name,
                    email,
                    password,
                    role
                  FROM {$this->table}
                  WHERE email = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        // USER TIDAK ADA
        if (!$user) {
            return false;
        }

        // PASSWORD BENAR
        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // UPDATE USER
    public function update(array $data, int $id)
    {
        $name = htmlspecialchars(trim($data['name']));
        $email = strtolower(trim($data['email']));
        $role = $data['role'];

        // UPDATE DENGAN PASSWORD BARU
        if (!empty($data['password'])) {

            $password = password_hash(
                $data['password'],
                PASSWORD_DEFAULT
            );

            $query = "UPDATE {$this->table}
                      SET
                        name = ?,
                        email = ?,
                        password = ?,
                        role = ?
                      WHERE id = ?";

            $stmt = $this->connection->prepare($query);

            $stmt->bind_param(
                "ssssi",
                $name,
                $email,
                $password,
                $role,
                $id
            );

        } else {

            // UPDATE TANPA GANTI PASSWORD
            $query = "UPDATE {$this->table}
                      SET
                        name = ?,
                        email = ?,
                        role = ?
                      WHERE id = ?";

            $stmt = $this->connection->prepare($query);

            $stmt->bind_param(
                "sssi",
                $name,
                $email,
                $role,
                $id
            );
        }

        return $stmt->execute();
    }

    // DELETE USER
    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);

        $stmt->execute();

        return $stmt->affected_rows > 0;
    }
}
?>