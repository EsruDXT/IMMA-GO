<?php

namespace App\Controllers;

require_once '../app/models/Profile.php';

use App\Models\Profile;

class ProfileController
{
    public function profileView()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek Login
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        // AMBIL USER ID
        $userId = $_SESSION['user']['id'];

        $profileModel = new Profile();
        // Ambil Data Profil dari User Id
        $profile = $profileModel->getProfileByUserId($userId);
        // Send Data
        require_once '../app/views/profile/profile.php';
    }
}
