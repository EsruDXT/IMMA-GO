<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class User extends Database
{
    protected $table = 'users';

    // GET ALL USERS
    public function getUsers(
        $sort = 'date',
        $order = 'DESC'
    ) {
        $allowedSort = [

            'name' => 'name',
            'date' => 'created_at'

        ];

        $sortColumn =
            $allowedSort[$sort]
            ?? 'created_at';

        $order =
            strtoupper($order) === 'ASC'
            ? 'ASC'
            : 'DESC';

        $query = "
            SELECT *
            FROM {$this->table}
            WHERE deleted_at IS NULL
            ORDER BY $sortColumn $order
        ";

        $stmt =
            $this->connection
            ->prepare($query);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }

    // GET USER BY ID
    public function getUserById(int $id)
    {
        $query = "
    SELECT *
    FROM {$this->table}
    WHERE id = ?
    AND deleted_at IS NULL
";

        $stmt =
            $this->connection
            ->prepare($query);

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc();
    }

    // REGISTER / INSERT USER
    public function insert(array $data)
    {
        $name =
            htmlspecialchars(
                trim($data['name'])
            );

        $email =
            strtolower(
                trim($data['email'])
            );

        $password =
            password_hash(
                $data['password'],
                PASSWORD_DEFAULT
            );

        $role =
            $data['role']
            ?? 'student';

        // CEK EMAIL DUPLIKAT (hanya user aktif)
        $check = $this->connection->prepare(
            "SELECT id
     FROM {$this->table}
     WHERE email = ?
     AND deleted_at IS NULL"
        );

        $check->bind_param("s", $email);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            return false;
        }

        // INSERT
        $query = "
            INSERT INTO {$this->table}
            (
                name,
                email,
                password,
                role
            )
            VALUES
            (?, ?, ?, ?)
        ";

        $stmt =
            $this->connection
            ->prepare($query);

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
    public function login(
        string $email,
        string $password
    ) {
        $email =
            strtolower(
                trim($email)
            );

        $query = "SELECT
            id,
            name,
            email,
            password,
            role
          FROM {$this->table}
          WHERE email = ?
          AND deleted_at IS NULL";

        $stmt =
            $this->connection
            ->prepare($query);

        $stmt->bind_param(
            "s",
            $email
        );

        $stmt->execute();

        $user =
            $stmt
            ->get_result()
            ->fetch_assoc();

        if (!$user) {
            return false;
        }

        if (
            password_verify(
                $password,
                $user['password']
            )
        ) {
            return $user;
        }

        return false;
    }

    // UPDATE USER
    public function update(
        array $data,
        int $id
    ) {
        $name =
            htmlspecialchars(
                trim($data['name'])
            );

        $email =
            strtolower(
                trim($data['email'])
            );

        $role =
            $data['role'];

        if (!empty($data['password'])) {

            $password =
                password_hash(
                    $data['password'],
                    PASSWORD_DEFAULT
                );

            $query = "
                UPDATE {$this->table}
                SET
                    name=?,
                    email=?,
                    password=?,
                    role=?
                WHERE id=?
                AND deleted_at IS NULL
            ";

            $stmt =
                $this->connection
                ->prepare($query);

            $stmt->bind_param(
                "ssssi",
                $name,
                $email,
                $password,
                $role,
                $id
            );
        } else {

            $query = "
                UPDATE {$this->table}
                SET
                    name=?,
                    email=?,
                    role=?
                WHERE id=?
                AND deleted_at IS NULL
            ";

            $stmt =
                $this->connection
                ->prepare($query);

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

    // SOFT DELETE
    public function delete(int $id)
    {
        $query = "
            UPDATE {$this->table}
            SET deleted_at = NOW()
            WHERE id = ?
            AND deleted_at IS NULL
        ";

        $stmt =
            $this->connection
            ->prepare($query);

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();

        return
            $stmt->affected_rows > 0;
    }
}
