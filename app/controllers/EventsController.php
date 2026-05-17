<?php

namespace App\Controllers;

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

        require_once '../app/views/event/events.php';
    }
        public function detail($id)
    {
        require_once '../app/views/event/event-detail.php';
    }

    

    
}