<?php

namespace App\Controllers;

require_once '../app/models/Event.php';
require_once '../app/models/Registration.php';

use App\Models\Event;
use App\Models\Registration;

class EventsController
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $eventModel = new Event();

        $events = $eventModel->getAll();

        require_once '../app/views/event/events.php';
    }

    public function detail($id)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $eventModel = new Event();

        // ambil event berdasarkan id
        $event = $eventModel->findById($id);

        // kalau id tidak ada
        if (!$event) {
            die("Event tidak ditemukan");
        }

        require_once '../app/views/event/event-detail.php';
    }

public function register()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit;
    }

    $competition = $_GET['competition'] ?? '';
    $eventId = $_GET['id'] ?? null;
    $userId = $_SESSION['user']['id'] ?? null;

    // CEK REGISTRASI USER
    $registrationModel = new Registration();
    $alreadyRegistered = null;

    if ($userId && $competition) {
        $alreadyRegistered = $registrationModel->checkRegistrationByUser($competition, $userId);
    }

    require_once '../app/views/event/register.php';
}
}
