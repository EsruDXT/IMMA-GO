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

        require_once
            '../app/views/admin/user/create.php';
    }

    public function store()
    {
        $this->checkAdmin();

        $userModel = new User();

        $success = $userModel->insert([

            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => $_POST['role']

        ]);

        if (!$success) {

            $_SESSION['error'] =
                "Email already exists";

            header(
                "Location:/admin/users/create"
            );

            exit;
        }

        header(
            "Location:/admin/users"
        );

        exit;
    }

    // EDIT PAGE
    public function edit(int $id)
    {
        $this->checkAdmin();

        $userModel = new User();

        $user =
            $userModel
            ->getUserById($id);

        if (!$user) {

            header(
                "Location:/admin/users"
            );

            exit;
        }

        require_once
            '../app/views/admin/user/edit.php';
    }

    // UPDATE USER
    public function update()
    {
        $this->checkAdmin();

        $userModel = new User();

        $userModel->update(

            [

                'name' =>
                $_POST['name'],

                'email' =>
                $_POST['email'],

                'password' =>
                $_POST['password'],

                'role' =>
                $_POST['role']

            ],

            $_POST['id']

        );

        header(
            "Location:/admin/users"
        );

        exit;
    }

    // DELETE USER
    public function delete(int $id)
    {
        $this->checkAdmin();

        $userModel = new User();

        $userModel->delete($id);

        header(
            "Location:/admin/users"
        );

        exit;
    }
}