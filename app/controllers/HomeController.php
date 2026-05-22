<?php
namespace App\Controllers;

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

        require_once '../app/views/home.php';
    }
}

?>
