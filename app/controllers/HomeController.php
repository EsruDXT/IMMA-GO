<?php

namespace App\Controllers;

require_once '../app/models/Honor.php';

use App\Models\Honor;

class HomeController
{
    private function checkAuth()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
    }

    public function homeView()
    {
        $this->checkAuth();

        $honorModel = new Honor();

        $honors = $honorModel->getAllHonors();

        require_once '../app/views/home.php';
    }
}
?>