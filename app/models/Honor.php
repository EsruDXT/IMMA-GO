<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Honor extends Database
{
    protected $table = 'honors';

    // GET ALL
    public function getAllHonors()
    {
        $query = "
            SELECT *
            FROM {$this->table}
            WHERE deleted_at IS NULL
            ORDER BY honor_date DESC
        ";

        $result = $this->connection->query($query);

        $honors = $result->fetch_all(MYSQLI_ASSOC);

        // Tambahkan total likes
        foreach ($honors as &$honor) {

            $honor['likes'] =
                $this->getLikesCount($honor['id']);
        }

        return $honors;
    }

    // GET BY ID
    public function getHonorById($id)
    {
        $query = "
            SELECT *
            FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $honor = $stmt
            ->get_result()
            ->fetch_assoc();

        // Tambahkan likes
        $honor['likes'] =
            $this->getLikesCount($id);

        return $honor;
    }

    // CREATE
    public function createHonor($data)
    {
        $query = "
            INSERT INTO {$this->table}
            (
                title,
                image,
                honor_date
            )
            VALUES
            (
                ?,
                ?,
                ?
            )
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param(
            "sss",
            $data['title'],
            $data['image'],
            $data['honor_date']
        );

        return $stmt->execute();
    }

    // UPDATE
    public function updateHonor($id, $data)
    {
        $query = "
            UPDATE {$this->table}
            SET
                title = ?,
                image = ?,
                honor_date = ?
            WHERE id = ?
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param(
            "sssi",
            $data['title'],
            $data['image'],
            $data['honor_date'],
            $id
        );

        return $stmt->execute();
    }

    // SOFT DELETE
    public function softDeleteHonor($id)
    {
        $query = "
            UPDATE honors
            SET deleted_at = NOW()
            WHERE id = ?
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    // TOGGLE LIKE
    public function toggleLike($honorId, $userId)
    {
        // cek sudah like atau belum
        $check = $this->connection->prepare("
            SELECT id
            FROM honor_likes
            WHERE honor_id = ?
            AND user_id = ?
        ");

        $check->bind_param("ii", $honorId, $userId);

        $check->execute();

        $result = $check->get_result();

        // kalau sudah like → unlike
        if ($result->num_rows > 0) {

            $delete = $this->connection->prepare("
                DELETE FROM honor_likes
                WHERE honor_id = ?
                AND user_id = ?
            ");

            $delete->bind_param("ii", $honorId, $userId);

            return $delete->execute();

        } else {

            // insert like
            $insert = $this->connection->prepare("
                INSERT INTO honor_likes (
                    honor_id,
                    user_id
                )
                VALUES (?, ?)
            ");

            $insert->bind_param("ii", $honorId, $userId);

            return $insert->execute();
        }
    }

    // TOTAL LIKES
    public function getLikesCount($honorId)
    {
        $query = $this->connection->prepare("
            SELECT COUNT(*) as total
            FROM honor_likes
            WHERE honor_id = ?
        ");

        $query->bind_param("i", $honorId);

        $query->execute();

        $result = $query
            ->get_result()
            ->fetch_assoc();

        return $result['total'] ?? 0;
    }

    // CHECK USER ALREADY LIKE
    public function isLikedByUser($honorId, $userId)
    {
        $query = $this->connection->prepare("
            SELECT id
            FROM honor_likes
            WHERE honor_id = ?
            AND user_id = ?
        ");

        $query->bind_param("ii", $honorId, $userId);

        $query->execute();

        $result = $query->get_result();

        return $result->num_rows > 0;
    }
}