<?php
namespace App\Controllers;

class ProductController
{
    public function index()
    {
        require_once '../app/views/products/index.php';
    }

    public function create()
    {
        require_once '../app/views/products/create.php';
    }

    public function edit(string $id)
    {
        require_once '../app/views/products/edit.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/products/show.php';
    }

}

?>