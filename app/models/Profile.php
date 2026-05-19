<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Profile extends Database
{
    protected $table = 'profiles';

    public function getProfileByUserId($userId)
    {
        $query = "SELECT * FROM {$this->table} WHERE user_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}