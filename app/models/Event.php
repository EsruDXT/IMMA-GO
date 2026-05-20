<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Event extends Database
{
    protected $table = 'events';

    // CREATE EVENT
    public function create(array $data)
    {
        $query = "INSERT INTO {$this->table}
        (
            title,
            description,
            image,
            category,
            class_target,
            requirement,
            location,
            event_date,
            organizer,
            created_by
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param(
            "sssssssssi",
            $data['title'],
            $data['description'],
            $data['image'],
            $data['category'],
            $data['class_target'],
            $data['requirement'],
            $data['location'],
            $data['event_date'],
            $data['organizer'],
            $data['created_by']
        );

        return $stmt->execute();
    }

    // Panggil semua event yang belum dihapus
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}
                  WHERE deleted_at IS NULL
                  ORDER BY created_at DESC";

        $result = $this->connection->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}