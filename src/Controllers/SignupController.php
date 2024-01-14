<?php

namespace App\Controllers;

use App\Controller;
use App\Models\UserModel;


class SignupController extends Controller{
    public function show(){
        $this->render('signup'); 
    }
  
public function Useradd()
{
    extract($_POST);

    $viewmodel = new UserModel();

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user record into the database
    $userFields = [
        'name' => $name, 
        'email' => $email,
        'password' => $hashedPassword,
        'role' => 'auteur', 
    ];

    $viewmodel->insertRecord("user", $userFields);

    header("Location: http://localhost:8000");
}

}