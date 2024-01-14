<?php

namespace App\Controllers;
use App\Controller;
use App\Models\WikiModel;

class WikiController extends Controller
{
    public function wiki()
    {
        $obj = new WikiModel();
        $rows=$obj->selectRecords("wiki");

// var_dump($rows);
        $this->renderDa('wiki', ['rows' => $rows]);
    
    }
    public function wikifr()
    {
        $obj = new WikiModel();
// var_dump($rows);
$this->render('wiki');
   
    }
    public function wikifrshow(){
        $obj = new WikiModel();
    //     $categories = $obj->selectRecords("category", "*");
    // $users = $obj->selectRecords("user", '*');
    $categories=$obj->selectRecords("category","*");
   
    $users=$obj->selectRecords("user",'*');
    $tags=$obj->selectRecords("tag",'*');
    $this->render('wikiadd', ['categories' => $categories, 'users' => $users,'tags'=>$tags]);
}
    
public function wikifradd()
{
    extract($_POST);
    $obj = new WikiModel();
    $rows = $obj->selectRecords("wiki", "*");

    $data = array(
        'title' => $title,
        'description' => $description,
        'Content' => $Content,
        'categoryId' => $categoryId,
        'userId' =>$_SESSION['user_id'],
        'status'=>'0',
    );
   
     $wikiId = $obj->insertRecord('wiki', $data);
    
    if (isset($tags) && is_array($tags)) {
    foreach ($tags as $tagId) {
        // Check if the tagId exists in the tag table before inserting into tag-wiki
        $tagExists = $obj->recordExists('tag', ['Id' => $tagId]);

        if ($tagExists) {
            $tagdata = array(
                'idTag' => (int)$tagId,
               'idWiki' => (int)$wikiId,
            );
            $obj->insertRecord('`tag-wiki`', $tagdata);
        } else {
            // Handle the case where the tagId does not exist in the tag table
            // You might want to log an error or handle it appropriately
        }
    }
    }
    header("location:/");
}


    public function wikiadd(){
        extract($_POST);
        $obj = new WikiModel();
        $rows=$obj->selectRecords("wiki","*");
        $categories=$obj->selectRecords("category","*");
        $data = array(
            'title' => $title,
            'description' => $description,
            'content'=>$content,
            'categoryId' => $categoryId,
            'userId' => $userId,
        );
        $users=$obj->selectRecords("user",'*');
        $rows=$obj->insertRecord('wiki', $data);
// var_dump($categories);
        $this->renderDa('wikiadd', ['categories' => $categories,'users' => $users]);
        header("Location: http://localhost:8000/wiki");
    }
    public function wikifrupdateshow()
    {
        $obj = new WikiModel();
        
        // Retrieve existing wiki data
        $wikiData = $obj->selectRecords('wiki', '*', 'Id');
        
        // Retrieve additional data needed for the update form
        $categories = $obj->selectRecords("category", "*");
        $users = $obj->selectRecords("user", '*');
        $tags = $obj->selectRecords("tag", '*');
    
        // Render the update form with existing data and additional options
        $this->renderDa('wikiupdate', [
            'wikiData' => $wikiData,
            'categories' => $categories,
            'users' => $users,
            'tags' => $tags,
        ]);
    }


    public function wikifrupdate()
    {
        extract($_POST);
        $obj = new WikiModel();
        
        // Update wiki data
        $data = array(
            'title' => $title,
            'description' => $description,
            'Content' => $Content,
            'categoryId' => $categoryId,
        );
        
        $obj->updateRecord('wiki', $data,'*', ['id' => $wikiId]);
    
        // Delete existing tags for the wiki
        $obj->deleteRecord('`tag-wiki`', '*',['idWiki' => $wikiId]);
    
        // Insert new tags for the wiki
        if (isset($tags) && is_array($tags)) {
            foreach ($tags as $tagId) {
                // Check if the tagId exists in the tag table before inserting into tag-wiki
                $tagExists = $obj->recordExists('tag', ['Id' => $tagId]);
    
                if ($tagExists) {
                    $tagdata = array(
                        'idTag' => (int)$tagId,
                        'idWiki' => (int)$wikiId,
                    );
                    $obj->insertRecord('`tag-wiki`', $tagdata);
                } else {
                    // Handle the case where the tagId does not exist in the tag table
                    // You might want to log an error or handle it appropriately
                }
            }
        }
    
        header("location:/");
    }
    






















//     public function wikiupdate(){
//         extract($_POST);
//         $obj = new WikiModel();
//         $rows=$obj->selectRecords("wiki","*");
//         $categories=$obj->selectRecords("category","*");
//         $data = array(
//             'title' => $title,
//             'description' => $description,
//             'content'=>$content,
//             'categoryId' => $categoryId,
//             'userId' => $userId,
//         );
//         $users=$obj->selectRecords("user",'*');
//         $rows=$obj->updateRecord("wiki", $data,"id", $id);
// // var_dump($categories);
//         $this->renderDa('wikiadd', ['categories' => $categories,'users' => $users]);
//         header("Location: http://localhost:8000/wiki");
//     }
    
}
