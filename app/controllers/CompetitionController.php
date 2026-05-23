<?php

namespace App\Controllers;

require_once __DIR__ . '/../models/Registration.php';

use App\Models\Registration;

class CompetitionController
{
    private $registrationModel;

    public function __construct()
    {
        // SESSION HARUS SELALU START DI SINI (FIX UTAMA)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->registrationModel = new Registration();
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    private function getUserId()
{
    return $_SESSION['user']['id'] ?? null;
}

    private function getRegistration($competition)
    {
        $userId = $this->getUserId();

        if (!$userId) return null;

        return $this->registrationModel->checkRegistrationByUser(
            $competition,
            $userId
        );
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW PAGE (REGISTER PAGE)
    |--------------------------------------------------------------------------
    */

    public function anakAyam()
    {
        $competition = 'anak-ayam';
        $alreadyRegistered = $this->getRegistration($competition);

        require __DIR__ . '/../views/event/register.php';
    }

    public function protectTheQueen()
    {
        $competition = 'protect-the-queen';
        $alreadyRegistered = $this->getRegistration($competition);

        require __DIR__ . '/../views/event/register.php';
    }

    public function cupOfChaos()
    {
        $competition = 'cup-of-chaos';
        $alreadyRegistered = $this->getRegistration($competition);

        require __DIR__ . '/../views/event/register.php';
    }

    /*
    |--------------------------------------------------------------------------
    | STORE (REGISTER)
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        $userId = $this->getUserId();

        if (!$userId) {
            $_SESSION['error'] = "User belum login";
            header("Location: /login");
            exit;
        }

        $competition = isset($_POST['competition']) ? trim($_POST['competition']) : '';
        $classTarget = isset($_POST['class_target']) ? trim($_POST['class_target']) : '';
        $phoneNumber = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
        $players = isset($_POST['players']) ? $_POST['players'] : [];
        $eventId = isset($_POST['event_id']) ? trim($_POST['event_id']) : null;

        // VALIDASI INPUT
        if (empty($competition) || empty($classTarget) || empty($phoneNumber)) {
            $_SESSION['error'] = "Semua field wajib diisi!";
            header("Location: /competition/" . $competition);
            exit;
        }

        if (empty($players)) {
            $_SESSION['error'] = "Minimal harus ada satu member!";
            header("Location: /competition/" . $competition);
            exit;
        }

        // CEK SUDAH REGISTER
        $alreadyRegistered =
            $this->registrationModel->checkRegistrationByUser(
                $competition,
                $userId
            );

        if ($alreadyRegistered) {
            $_SESSION['error'] = "Anda sudah terdaftar di kompetisi ini!";
            header("Location: /competition/" . $competition);
            exit;
        }

        // INSERT REGISTRATION
        try {
            $registrationId =
                $this->registrationModel->createRegistration(
                    $competition,
                    $classTarget,
                    $phoneNumber,
                    $userId
                );

            if (!$registrationId) {
                $_SESSION['error'] = "Gagal menyimpan registrasi. Silakan coba lagi.";
                header("Location: /competition/" . $competition);
                exit;
            }

            // INSERT MEMBERS
            foreach ($players as $player) {
                if (!empty(trim($player))) {
                    $this->registrationModel->addMember(
                        $registrationId,
                        trim($player)
                    );
                }
            }

            $_SESSION['success'] = "Registrasi berhasil!";
            
            // REDIRECT KE DETAIL REGISTRASI
            $redirectUrl = "/competition/detail/" . $registrationId;
            if ($eventId) {
                $redirectUrl .= "?event_id=" . urlencode($eventId);
            }
            header("Location: " . $redirectUrl);
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Terjadi kesalahan: " . $e->getMessage();
            header("Location: /competition/" . $competition);
            exit;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL REGISTRATION
    |--------------------------------------------------------------------------
    */

    public function detail($registrationId)
    {
        $userId = $this->getUserId();

        if (!$userId) {
            $_SESSION['error'] = "User belum login";
            header("Location: /login");
            exit;
        }

        // GET REGISTRATION DETAIL
        $registration = $this->registrationModel->getRegistrationDetail($registrationId);

        if (!$registration) {
            $_SESSION['error'] = "Registrasi tidak ditemukan!";
            header("Location: /home");
            exit;
        }

        // CEK KEPEMILIKAN - HANYA PEMILIK YANG BISA LIHAT
        if ($registration['user_id'] != $userId) {
            $_SESSION['error'] = "Anda tidak berhak mengakses registrasi ini!";
            header("Location: /home");
            exit;
        }

        // GET MEMBERS
        $members = $this->registrationModel->getRegistrationMembers($registrationId);

        // GET EVENT ID FROM QUERY PARAMETER
        $eventId = $_GET['event_id'] ?? null;

        require __DIR__ . '/../views/event/registration-detail.php';
    }
}