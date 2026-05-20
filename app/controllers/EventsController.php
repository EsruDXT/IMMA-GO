<?php

namespace App\Controllers;

require_once '../app/models/Event.php';

use App\Models\Event;

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

        // AMBIL DATA EVENT
        $eventModel = new Event();

        $events = $eventModel->getAll();

        // KIRIM KE VIEW
        require_once '../app/views/event/events.php';
    }

    public function detail($id)
    {
        require_once '../app/views/event/event-detail.php';
    }
}