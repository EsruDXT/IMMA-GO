<?php
namespace App\Core;
class Controller
{
    public function view($view, $data = [])
    {
        $view = str_replace(
            '.', 
            '/', 
        $view
        );

        $content = "../app/views/$view.php";

        require_once '../app/views/layouts/app.php';
    }
}

?>