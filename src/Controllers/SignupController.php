<?php

namespace App\Controllers;

use App\Controller;

class SignupController extends Controller{
    public function show(){
        $this->render('signup'); 
    }
}