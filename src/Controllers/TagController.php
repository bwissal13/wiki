<?php

namespace App\Controllers;
use App\Controller;
use App\Models\TagModel;

class TagController extends Controller
{
    public function tag()
    {
        $obj = new TagModel();
        $rows=$obj->selectRecords("tag");
// var_dump($rows);
        $this->renderDa('tag', ['rows' => $rows]);
    }
    public function tagadd(){ 
        extract($_POST);
        
       $obj = new TagModel();
       $data = array(
           'name' => $name,
       );
       $rows=$obj->insertRecord('tag', $data);
      
           $this->renderDa('tagadd');
       }
       public function tagdelete()
       {
           $obj = new TagModel();
   
           $id = $_GET['id'];
        
           $result = $obj->deleteRecord("tag", "id", $id);
           header("Location: http://localhost:8000/tag");
   
       }
   
       public function updateform()
       {
          
           $obj = new TagModel();
   
           $id = $_GET['id'];
           $name = $_GET['name'];
           $data = array(
               'id' => $id,
               'name' => $name,
           );
           $this->renderDa('tagupdate',$data);

       }
     
       public function tagupdate()
       {
           extract($_POST);
           $obj = new TagModel();
   
           $id = $_POST['id'];
           $name = $_POST['name'];
           $data = array(
               'name' => $name,
           );
           $insertedId = $obj->updateRecord("tag", $data, "id", $id);
           header("Location: http://localhost:8000/tag");
         
       }
}