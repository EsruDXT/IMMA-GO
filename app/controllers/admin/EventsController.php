<?php

namespace App\Controllers\Admin;

class EventsController
{
    private function checkAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (
            !isset($_SESSION['user']) ||
            $_SESSION['user']['role'] !== 'admin'
        ) {

            header("Location: /home");
            exit;
        }
    }

    public function index()
    {
        $this->checkAdmin();

        require_once '../app/views/admin/event/index.php';
    }
}