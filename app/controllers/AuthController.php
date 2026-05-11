<?php

namespace App\Controllers;

require_once '../app/models/User.php';

use App\Models\User;

class AuthController
{

    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

private function redirectIfLoggedIn()
{
    if (!isset($_SESSION['user'])) {
        return;
    }

    $role = $_SESSION['user']['role'];

    if ($role === 'moderator') {

        header("Location: /admin");
    } 
     else {
        header("Location: /home");
    }

    exit;
}

    // ===== VIEW =====
    public function loginView()
    {
        $this->startSession();
        $this->redirectIfLoggedIn();

        require_once '../app/views/auth/login.php';
    }

    public function registerView()
    {
        $this->startSession();
        $this->redirectIfLoggedIn();

        require_once '../app/views/auth/register.php';
    }

    // ===== REGISTER =====
    // public function register()
    // {
    //     $this->startSession();

    //     $name = trim($_POST['name'] ?? '');
    //     $email = strtolower(trim($_POST['email'] ?? ''));
    //     $password = $_POST['password'] ?? '';
    //     $confirm = $_POST['confirm_password'] ?? '';

    //     // VALIDASI
    //     if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
    //         $_SESSION['error'] = "Semua field wajib diisi!";
    //         header("Location: /register");
    //         exit;
    //     }

    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $_SESSION['error'] = "Format email tidak valid!";
    //         header("Location: /register");
    //         exit;
    //     }

    //     if (strlen($password) < 6) {
    //         $_SESSION['error'] = "Password minimal 6 karakter!";
    //         header("Location: /register");
    //         exit;
    //     }

    //     if ($password !== $confirm) {
    //         $_SESSION['error'] = "Password tidak sama!";
    //         header("Location: /register");
    //         exit;
    //     }

    //     $userModel = new User();
    //     $success = $userModel->insert([
    //         'name' => $name,
    //         'email' => $email,
    //         'password' => $password
    //     ]);

    //     if ($success) {
    //         $_SESSION['success'] = "Register berhasil! Silakan login.";
    //         header("Location: /login");
    //     } else {
    //         $_SESSION['error'] = "Email sudah terdaftar atau terjadi error!";
    //         header("Location: /register");
    //     }
    //     exit;
    // }

    // ===== LOGIN =====
    public function login()
    {
        $this->startSession();

        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Email dan password wajib diisi!";
            header("Location: /login");
            exit;
        }

        $userModel = new User();
        $user = $userModel->login($email, $password);

        if ($user) {

            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            $_SESSION['success'] = "Login berhasil!";

            // REDIRECT BERDASARKAN ROLE
            if ($user['role'] === 'teacher') {

                header("Location: /teacher");
            } elseif ($user['role'] === 'moderator') {

                header("Location: /admin");
            } elseif ($user['role'] === 'developer') {

                header("Location: /developer");
            } else {

                // DEFAULT = STUDENT
                header("Location: /home");
            }
        } else {

            $_SESSION['error'] = "Email atau password salah!";
            header("Location: /login");
        }

        exit;
    }

    public function logout()
    {
        session_start();

        session_unset();      // hapus semua session
        session_destroy();    // destroy session

        header("Location: /login");
        exit;
    }
}
