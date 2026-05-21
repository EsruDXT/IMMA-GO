<?php

namespace App\Controllers\Admin;

require_once '../app/models/User.php';

use App\Models\User;

class UserController
{
    private function checkAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (
            !isset($_SESSION['user'])
            ||
            $_SESSION['user']['role'] !== 'admin'
        ) {
            header("Location:/login");
            exit;
        }
    }

    public function index()
{
    $this->checkAdmin();

    $userModel = new User();

    $sort = $_GET['sort'] ?? 'date';
    $order = $_GET['order'] ?? 'DESC';

    $users = $userModel->getUsers(
        $sort,
        $order
    );

    require_once
        '../app/views/admin/user/index.php';
}

    public function create()
    {
        $this->checkAdmin();

        require_once '../app/views/admin/user/create.php';
    }
}
