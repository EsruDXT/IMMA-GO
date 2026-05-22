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
}
