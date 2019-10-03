<?php

// require 'models/frontend/CommentsModel.php';



function home()
{

    require 'views/frontend/home.php';
}
function register()
{

    require 'views/frontend/registerView.php';
}
// function getComments()
// {
//     $commentManager = new CommentsManager;


//     $comments = $commentManager->getComments($_GET['id']);
//     require 'views/frontend/chapterView.php';
// }

// function addComment($comment, $getid, $author)
// {
//     if (isset($_POST['submit_comment'])) {
//         if (isset($_POST['comment']) and !empty($_POST['comment'])) {
//             if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {

//                 $newComment = new CommentsManager;
//                 $addNewComment = $newComment->addComment($comment, $getid, $author);
//             } else {
//                 throw new Exception("Impossible d\'ajouter le commentaire !");
//             }
//         }
//     }
//     require 'views/frontend/chapterView.php';
// }




// function listUsers($mail)
// {


//     $listusers = new UserManager;
//     $list = $listusers->listUsers($mail);
//     require 'views/backend/listusers.php';
// }
