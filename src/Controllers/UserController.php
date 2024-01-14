<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controller;

class UserController extends Controller
{
    public function show()
    {
        $obj = new UserModel();
        $rows=$obj->selectRecords("user");
        $this->renderDa('user', ['rows' => $rows]);
      
    }
    public function userdelete()
    {
        $obj = new UserModel();

        $id = $_GET['id'];
     
        $result = $obj->deleteRecord("user", "id", $id);
        header("Location: http://localhost:8000/user");

    }
    public function logout()
	{
		session_destroy();
		header('Location:http://localhost:8000/login');
	}
    
}