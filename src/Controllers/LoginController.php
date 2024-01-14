<?php

namespace App\Controllers;

use App\Controller;
use App\Models\UserModel;

class LoginController extends Controller{
    public function show(){
        $this->render('login'); 
    }
    public function UserLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $viewmodel = new UserModel();
    
        // Retrieve user record from the database based on the provided email
        $user = $viewmodel->getUserByEmail($email);
    
        // Check if the user exists and the password matches
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['Id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
    
            // Redirect to a dashboard or any other authenticated page
            header('Location: /');
            exit;
        } else {
            // Invalid login credentials, show an error message or redirect to the login page
            echo "Invalid login credentials";
            // Alternatively, you can redirect to the login page like this:
            // header('Location: /login');
            // exit;
        }
    }

}