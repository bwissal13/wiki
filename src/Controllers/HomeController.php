<?php

namespace App\Controllers;

use App\Controller;
use App\Models\HomeModel;

class HomeController extends Controller
{
    public function index()
    {
        $obj = new HomeModel();
        $rows = $obj->selectRecords("wiki", "*");
        $categories = $obj->selectRecords("category", "*");
        $users = $obj->selectRecords("user", '*');

        // Pass data to the view
        $this->render('index', ['rows' => $rows, 'categories' => $categories, 'users' => $users]);
    }
}
