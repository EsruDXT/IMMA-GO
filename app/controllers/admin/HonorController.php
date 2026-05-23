<?php

namespace App\Controllers\Admin;

require_once '../app/models/Honor.php';

use App\Models\Honor;

class HonorController
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

    // INDEX
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $honorModel = new Honor();

        $honors = $honorModel->getAllHonors();

        require_once '../app/views/admin/honors/index.php';
    }

    // CREATE VIEW
    public function create()
    {
        $this->checkAdmin();

        require_once '../app/views/admin/honors/create.php';
    }

    // STORE
    public function store()
    {
        $this->checkAdmin();

        $title = $_POST['title'];
        $date = $_POST['honor_date'];

        $image = '';

        // UPLOAD IMAGE
        if (
            isset($_FILES['image']) &&
            $_FILES['image']['error'] === 0
        ) {

            $uploadPath =
                dirname(__DIR__, 3)
                . '/public/uploads/honors/';

            // Buat folder jika belum ada
            if (!is_dir($uploadPath)) {

                mkdir($uploadPath, 0777, true);
            }

            $fileName =
                time() . '_' .
                basename($_FILES['image']['name']);

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $uploadPath . $fileName
            );

            $image = $fileName;
        }

        $honorModel = new Honor();

        $honorModel->createHonor([
            'title' => $title,
            'image' => $image,
            'honor_date' => $date
        ]);

        header("Location: /admin/honors");
        exit;
    }

    // EDIT VIEW
    public function edit($id)
    {
        $this->checkAdmin();

        $honorModel = new Honor();

        $honor = $honorModel->getHonorById($id);

        require_once '../app/views/admin/honors/edit.php';
    }

    // UPDATE
    public function update($id)
    {
        $this->checkAdmin();

        $title = $_POST['title'];
        $date = $_POST['honor_date'];

        $honorModel = new Honor();

        $honor = $honorModel->getHonorById($id);

        $image = $honor['image'];

        // UPLOAD IMAGE BARU
        if (
            isset($_FILES['image']) &&
            $_FILES['image']['error'] === 0
        ) {

            $uploadPath =
                dirname(__DIR__, 3)
                . '/public/uploads/honors/';

            // Buat folder jika belum ada
            if (!is_dir($uploadPath)) {

                mkdir($uploadPath, 0777, true);
            }

            $fileName =
                time() . '_' .
                basename($_FILES['image']['name']);

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $uploadPath . $fileName
            );

            $image = $fileName;
        }

        $honorModel->updateHonor($id, [
            'title' => $title,
            'image' => $image,
            'honor_date' => $date
        ]);

        header("Location: /admin/honors");
        exit;
    }

    // SOFT DELETE
    public function delete($id)
    {
        $this->checkAdmin();

        $honorModel = new Honor();

        $honorModel->softDeleteHonor($id);

        header("Location: /admin/honors");
        exit;
    }

// LIKE
public function like($id)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit;
    }

    $userId = $_SESSION['user']['id'];

    $honorModel = new Honor();

    $honorModel->toggleLike($id, $userId);

    header("Location: /admin/honors");
    exit;
}
}