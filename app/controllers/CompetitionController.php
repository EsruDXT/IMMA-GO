<?php

namespace App\Controllers;

require_once __DIR__ . '/../models/Registration.php';

use App\Models\Registration;

class CompetitionController
{
    private $registrationModel;

    public function __construct()
    {
        $this->registrationModel = new Registration();
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW PAGE
    |--------------------------------------------------------------------------
    */

    public function anakAyam()
    {
        $competition = 'anak-ayam';

        require_once __DIR__ . '/../views/competition/register.php';
    }

    public function protectTheQueen()
    {
        $competition = 'protect-the-queen';

        require_once __DIR__ . '/../views/competition/register.php';
    }

    public function cupOfChaos()
    {
        $competition = 'cup-of-chaos';

        require_once __DIR__ . '/../views/competition/register.php';
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $competition = $_POST['competition'];
        $classTarget = $_POST['class_target'];
        $phoneNumber = $_POST['phone_number'];

        // CEK SUDAH DAFTAR
        $alreadyRegistered =
            $this->registrationModel->checkRegistration(
                $competition,
                $phoneNumber
            );

        if ($alreadyRegistered) {

            $_SESSION['already_registered'] = true;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // INSERT REGISTRATION
        $registrationId =
            $this->registrationModel->createRegistration(
                $competition,
                $classTarget,
                $phoneNumber
            );

        // INSERT MEMBERS
        foreach ($_POST['players'] as $player) {

            if (!empty(trim($player))) {

                $this->registrationModel->addMember(
                    $registrationId,
                    $player
                );
            }
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['register_success'] = true;

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | READ
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $registrations =
            $this->registrationModel->getAll();

        require_once
            __DIR__ . '/../views/competition/index.php';
    }

    public function detail($id)
    {
        $registration =
            $this->registrationModel->find($id);

        $members =
            $this->registrationModel->getMembers($id);

        require_once
            __DIR__ . '/../views/competition/detail.php';
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die('Method not allowed');
        }

        $competition = $_POST['competition'];
        $classTarget = $_POST['class_target'];
        $phoneNumber = $_POST['phone_number'];

        $this->registrationModel->updateRegistration(
            $id,
            $competition,
            $classTarget,
            $phoneNumber
        );

        // delete old members
        $this->registrationModel->deleteMembers($id);

        // insert new members
        foreach ($_POST['players'] as $player) {

            if (!empty(trim($player))) {

                $this->registrationModel->addMember(
                    $id,
                    $player
                );
            }
        }

        header("Location: /competition/detail/$id");
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        $this->registrationModel->delete($id);

        header("Location: /competition");
        exit;
    }
}
