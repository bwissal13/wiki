<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Controller;

class Category extends Controller
{
    public function category()
    {
        $obj = new CategoryModel();
        $rows=$obj->selectRecords("category");
// var_dump($rows);
        $this->renderDa('category', ['rows' => $rows]);
    }
    public function categoryadd(){ 
     extract($_POST);
     
    $obj = new CategoryModel();
    $data = array(
        'name' => $name,
    );
    $rows=$obj->insertRecord('category', $data);
   
        $this->renderDa('categoryadd');
    }
   
    public function categorydelete()
    {
        $obj = new CategoryModel();

        $id = $_GET['id'];
     
        $result = $obj->deleteRecord("category", "id", $id);
        header("Location: http://localhost:8000/category");

    }

    public function updateform()
    {
       
        $obj = new CategoryModel();

        $id = $_GET['id'];
        $name = $_GET['name'];
        $data = array(
            'id' => $id,
            'name' => $name,
        );
        $this->renderDa('categoryupdate',$data);
      

      
      
    }
  
    public function categoryupdate()
    {
        extract($_POST);
        $obj = new CategoryModel();

        $id = $_POST['id'];
        $name = $_POST['name'];
        $data = array(
            'name' => $name,
        );
        $insertedId = $obj->updateRecord("category", $data, "id", $id);
        header("Location: http://localhost:8000/category");
      
    }
}


