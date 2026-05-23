<?php

namespace App\Controllers\Admin;

require_once '../app/models/Manage.php';

use App\Models\Manage;

class ManageController
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

    public function manageView()
    {
        $this->checkAdmin();

        $manageModel = new Manage();

        /*
        |--------------------------------------------------------------------------
        | Dashboard Stats
        |--------------------------------------------------------------------------
        */

        $totalUsers = $manageModel->countUsers();

        $totalEvents = $manageModel->countEvents();

        $totalParticipants = $manageModel->countParticipants();

        /*
        |--------------------------------------------------------------------------
        | Recent Registrations
        |--------------------------------------------------------------------------
        */

        $recentRegistrations = $manageModel->getRecentRegistrations();

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        require_once '../app/views/admin/manage.php';
    }
}