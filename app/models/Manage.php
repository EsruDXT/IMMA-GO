<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Manage extends Database
{
    /*
    |--------------------------------------------------------------------------
    | COUNT USERS
    |--------------------------------------------------------------------------
    */

    public function countUsers()
    {
        $query = "SELECT COUNT(*) as total FROM users";

        $result = $this->connection
            ->query($query)
            ->fetch_assoc();

        return $result['total'];
    }

    /*
    |--------------------------------------------------------------------------
    | COUNT EVENTS
    |--------------------------------------------------------------------------
    */

    public function countEvents()
{
    $query = "
        SELECT COUNT(*) as total 
        FROM events
        WHERE deleted_at IS NULL
    ";

    $result = $this->connection
        ->query($query)
        ->fetch_assoc();

    return $result['total'];
}

    /*
    |--------------------------------------------------------------------------
    | COUNT PARTICIPANTS
    |--------------------------------------------------------------------------
    */

    public function countParticipants()
    {
        $query = "SELECT COUNT(*) as total FROM registrations";

        $result = $this->connection
            ->query($query)
            ->fetch_assoc();

        return $result['total'];
    }

    /*
    |--------------------------------------------------------------------------
    | RECENT REGISTRATIONS
    |--------------------------------------------------------------------------
    */

    public function getRecentRegistrations()
    {
        $query = "
            SELECT
                registrations.id,
                users.name,
                profiles.class,
                registrations.created_at,
                events.title AS event_name
            FROM registrations

            JOIN users
                ON registrations.user_id = users.id

            LEFT JOIN profiles
                ON users.id = profiles.user_id

            JOIN events
                ON registrations.competition = events.title

            ORDER BY registrations.created_at DESC
            LIMIT 7
        ";

        $result = $this->connection->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}