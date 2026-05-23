<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class StudentActivity extends Database
{
    /*
    |--------------------------------------------------------------------------
    | Upcoming Activities
    |--------------------------------------------------------------------------
    | Status: registered
    */

    public function getUpcomingActivities($userId)
    {
        $query = "
            SELECT 
                events.title,
                events.category,
                events.location,
                events.event_date,
                registrations.status
            FROM registrations
            JOIN events 
                ON registrations.competition = events.title
            WHERE registrations.user_id = ?
            AND registrations.status = 'registered'
            ORDER BY events.event_date ASC
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $userId);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | History Activities
    |--------------------------------------------------------------------------
    | Status: completed
    */

    public function getHistoryActivities($userId)
    {
        $query = "
            SELECT 
                events.title,
                events.category,
                events.location,
                events.event_date,
                registrations.status
            FROM registrations
            JOIN events 
                ON registrations.competition = events.title
            WHERE registrations.user_id = ?
            AND registrations.status = 'completed'
            ORDER BY events.event_date DESC
        ";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $userId);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }
}