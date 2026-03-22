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
}
?>