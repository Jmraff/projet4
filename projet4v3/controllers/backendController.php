<?php

require 'models/backend/ArticlesModel.php';
require 'models/backend/EditArticlesModel.php';
require 'models/frontend/CommentsModel.php';




function adminHome()
{

    require 'views/backend/adminHomeView.php';
}



function editArticlePage()
{

    require 'views/backend/editView.php';
}


function adminListArticles()
{

    $adminListArticles = new DisplayArticles();
    $articles = $adminListArticles->adminListArticles();




    require 'views/backend/postsView.php';
}
function listArticles()
{

    $adminListArticles = new DisplayArticles();
    $articles = $adminListArticles->adminListArticles();




    require 'views/frontend/listArticlesView.php';
}
function adminDisplayArticle()
{

    //     $displayArticle = new DisplayArticles;

    //     $article = $displayArticle->getArticle($_GET['id']);
    //     if ($article->rowCount() != 1) {

    //         die('Cet article n\'existe pas !');
    //     } else {

    //         return $article;
    //     }

    require 'views/backend/postsView.php';
}
function displayArticle()
{

    $commentManager = new CommentsManager;

    $displayArticle = new DisplayArticles;
    $comments = $commentManager->getComments($_GET['postId']);


    $article1 = $displayArticle->getArticle($_GET['postId']);



    require 'views/frontend/chapterView.php';
}
function addComment($postId, $userId, $author, $comment)
{




    if (isset($_POST['submit_comment'])) {
        if (isset($_GET['postId']) && !empty($_GET['postId'])) {

            if (isset($_POST['comment']) and !empty($_POST['comment'])) {

                if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {

                    $newComment = new CommentsManager;
                    $addNewComment = $newComment->addComment($_GET['postId'], $_SESSION['id'], $_SESSION['username'], $_POST['comment']);
                    header('Location: index.php?action=displayArticle&postId=' . $postId);

                    require 'views/frontend/chapterView.php';
                } else {
                    echo ("Impossible d\'ajouter le commentaire !");
                }
            }
        }
    }
}
function addArticle($title, $content)
{

    $addArticle = new EditPosts;
    $newArticle = $addArticle->postArticles($title, $content);


    require 'views/backend/editView.php';
}
// function editArticle()
// { }
