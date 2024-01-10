<?php

namespace App\Controllers;

use App\Controller;


class Dashboard extends Controller
{
    public function index()
    {
        $this->renderDa('index');
    }
   
    
}
