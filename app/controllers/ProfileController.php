<?php

namespace App\Controllers;

require_once '../app/models/Profile.php';
require_once '../app/models/StudentActivity.php';

use App\Models\Profile;
use App\Models\StudentActivity;

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

        // Ambil User ID dari Session
        $userId = $_SESSION['user']['id'];

        // Profile Model
        $profileModel = new Profile();

        // Ambil Data Profile
        $profile = $profileModel->getProfileByUserId($userId);

        // Load View
        require_once '../app/views/profile/profile.php';
    }

    public function studentActivities()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek Login
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        // Ambil User ID dari Session
        $userId = $_SESSION['user']['id'];

        /*
        |--------------------------------------------------------------------------
        | Profile Data
        |--------------------------------------------------------------------------
        */

        $profileModel = new Profile();

        $profile = $profileModel->getProfileByUserId($userId);

        /*
        |--------------------------------------------------------------------------
        | Student Activities Data
        |--------------------------------------------------------------------------
        */

        $activityModel = new StudentActivity();

        // Upcoming Activities
        $upcoming = $activityModel->getUpcomingActivities($userId);

        // History Activities
        $history = $activityModel->getHistoryActivities($userId);

        /*
        |--------------------------------------------------------------------------
        | Load View
        |--------------------------------------------------------------------------
        */

        require_once '../app/views/profile/student-activities.php';
    }
}