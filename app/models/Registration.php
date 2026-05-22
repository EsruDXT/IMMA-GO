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
    | CREATE REGISTRATION
    |--------------------------------------------------------------------------
    */

    public function createRegistration(
        $competition,
        $classTarget,
        $phoneNumber
    ) {

        $query = "
            INSERT INTO registrations
            (competition, class_target, phone_number)

            VALUES (?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sss",
            $competition,
            $classTarget,
            $phoneNumber
        );

        $stmt->execute();

        return $this->conn->insert_id;
    }

    /*
    |--------------------------------------------------------------------------
    | ADD MEMBER
    |--------------------------------------------------------------------------
    */

    public function addMember(
        $registrationId,
        $playerName
    ) {

        $query = "
            INSERT INTO registration_members
            (registration_id, player_name)

            VALUES (?, ?)
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "is",
            $registrationId,
            $playerName
        );

        $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | GET ALL
    |--------------------------------------------------------------------------
    */

    public function getAll()
    {
        $query = "
            SELECT *
            FROM registrations
            ORDER BY created_at DESC
        ";

        $result = $this->conn->query($query);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    /*
    |--------------------------------------------------------------------------
    | FIND
    |--------------------------------------------------------------------------
    */

    public function find($id)
    {
        $query = "
            SELECT *
            FROM registrations
            WHERE id = ?
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    /*
    |--------------------------------------------------------------------------
    | GET MEMBERS
    |--------------------------------------------------------------------------
    */

    public function getMembers($registrationId)
    {
        $query = "
            SELECT *
            FROM registration_members
            WHERE registration_id = ?
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "i",
            $registrationId
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function updateRegistration(
        $id,
        $competition,
        $classTarget,
        $phoneNumber
    ) {

        $query = "
            UPDATE registrations

            SET
                competition = ?,
                class_target = ?,
                phone_number = ?

            WHERE id = ?
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sssi",
            $competition,
            $classTarget,
            $phoneNumber,
            $id
        );

        $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE MEMBERS
    |--------------------------------------------------------------------------
    */

    public function deleteMembers($registrationId)
    {
        $query = "
            DELETE FROM registration_members
            WHERE registration_id = ?
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "i",
            $registrationId
        );

        $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        $query = "
            DELETE FROM registrations
            WHERE id = ?
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();
    }

    public function checkRegistration(
    $competition,
    $phoneNumber
) {

    $query = "
        SELECT id
        FROM registrations
        WHERE competition = ?
        AND phone_number = ?
    ";

    $stmt = $this->conn->prepare($query);

    $stmt->bind_param(
        "ss",
        $competition,
        $phoneNumber
    );

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->num_rows > 0;
}
    
}