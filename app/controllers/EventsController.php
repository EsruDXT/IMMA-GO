<?php
namespace App\Controllers;

class EventsController
{
    public function eventsView()
    {
        require_once '../app/views/event/events.php';
    }

    public function detail($id)
    {
        require_once '../app/views/event/event-detail-' . $id . '.php';
    }

    public function create()
    {
        // Your project currently has the add-event UI under app/views/Add event/addevent.php
        require_once '../app/views/Add event/addevent.php';
    }

    public function store()
    {
        echo "Event berhasil ditambahkan";
    }
}
?>
