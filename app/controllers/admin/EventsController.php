<?php

namespace App\Controllers\Admin;

require_once '../app/models/Event.php';

use App\Models\Event;

class EventsController
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

    // LIST EVENT
    public function index()
    {
        $this->checkAdmin();

        $eventModel = new Event();

        $events = $eventModel->getAll();

        require_once '../app/views/admin/event/index.php';
    }

    // FORM CREATE
    public function create()
    {
        $this->checkAdmin();

        require_once '../app/views/admin/event/create.php';
    }

    // FORM EDIT
    public function edit($id)
    {
        $this->checkAdmin();

        require_once '../app/views/admin/event/edit.php';
    }

    // STORE EVENT
    public function store()
    {
        $this->checkAdmin();

        $imageName = null;

        // UPLOAD IMAGE
        if (
            isset($_FILES['image']) &&
            $_FILES['image']['error'] === 0
        ) {

            $imageName = time() . '_' . $_FILES['image']['name'];

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                '../public/uploads/' . $imageName
            );
        }

        $eventModel = new Event();

        $eventModel->create([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => $imageName,
            'category' => $_POST['category'],
            'class_target' => $_POST['class_target'],
            'requirement' => $_POST['requirement'],
            'location' => $_POST['location'],
            'event_date' => $_POST['event_date'],
            'organizer' => $_POST['organizer'],
            'created_by' => $_SESSION['user']['id']
        ]);

        header("Location: /admin/events");
        exit;
    }
}
