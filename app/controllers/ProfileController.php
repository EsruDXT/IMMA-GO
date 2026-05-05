<?php
namespace App\Controllers;

class ProfileController
{
    public function profileView(): void
    {
        require_once '../app/views/profile/student_profile.php';
    }
}
?>