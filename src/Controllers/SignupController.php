<?php

namespace App\Controllers;

use App\Controller;
use App\Models\UserModel;

class SignupController extends Controller{
    // public function show(){
    //     $this->render('signup'); 
    // }
    public function Useradd(){ 
        extract($_POST);
        
       $obj = new UserModel();
       $data = array(
           'name' => $name,
           'email'=> $email,
           'password'=>$password
       );
       $rows=$obj->insertRecord('user', $data);
      
           $this->render('signup');
       }
}