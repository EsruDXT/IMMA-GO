<?php

namespace App\Models;

require_once __DIR__ . '/../core/Database.php';

use App\Core\Database;

class Registration extends Database
{
    private $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->connection;
    }

    /*
    |--------------------------------------------------------------------------
    | CHECK USER REGISTRATION (CORE FIX)
    |--------------------------------------------------------------------------
    */

    public function checkRegistrationByUser($competition, $userId)
    {
        $query = "
            SELECT *
            FROM registrations
            WHERE competition = ?
            AND user_id = ?
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $competition, $userId);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE REGISTRATION
    |--------------------------------------------------------------------------
    */

    public function createRegistration(
        $competition,
        $classTarget,
        $phoneNumber,
        $userId
    ) {
        $query = "
            INSERT INTO registrations
            (competition, class_target, phone_number, user_id)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $competition, $classTarget, $phoneNumber, $userId);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    /*
    |--------------------------------------------------------------------------
    | ADD MEMBER
    |--------------------------------------------------------------------------
    */

    public function addMember($registrationId, $playerName)
    {
        $query = "
            INSERT INTO registration_members
            (registration_id, player_name)
            VALUES (?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $registrationId, $playerName);
        $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | GET REGISTRATION DETAIL WITH MEMBERS
    |--------------------------------------------------------------------------
    */

    public function getRegistrationDetail($registrationId)
    {
        $query = "
            SELECT *
            FROM registrations
            WHERE id = ?
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $registrationId);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function getRegistrationMembers($registrationId)
    {
        $query = "
            SELECT *
            FROM registration_members
            WHERE registration_id = ?
            ORDER BY id ASC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $registrationId);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}