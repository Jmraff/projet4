<?php

require_once 'models/frontend/CommentsModel.php';
require_once 'models/backend/ArticlesModel.php';



function home()
{

    require 'views/frontend/home.php';
}
function register()
{

    require 'views/frontend/registerView.php';
}
function listArticles()
{

    $listArticles = new DisplayArticles();
    $articles = $listArticles->listArticles();




    require 'views/frontend/listArticlesView.php';
}


function displayArticle()
{

    $commentManager = new CommentsManager;

    $displayArticle = new DisplayArticles;
    $comments = $commentManager->getComments($_GET['postId']);


    $article1 = $displayArticle->getArticle($_GET['postId']);



    require 'views/frontend/chapterView.php';
}

function reportComment($commentId, $postId)
{

    $report = new CommentsManager;
    $reportComment = $report->reportComment($commentId);
    header('Location: index.php?action=displayArticle&postId=' . $postId);
}
function addComment($postId, $userId, $author, $comment)
{




    if (isset($_POST['submit_comment'])) {




        if (isset($_GET['postId']) && !empty($_GET['postId'])) {

            if (isset($_POST['comment']) and !empty($_POST['comment'])) {

                if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {

                    $newComment = new CommentsManager;
                    $addNewComment = $newComment->addComment($_GET['postId'], $_SESSION['id'], $_SESSION['username'], htmlspecialchars($_POST['comment']));
                    header('Location: index.php?action=displayArticle&postId=' . $postId);

                    require 'views/frontend/chapterView.php';
                } else {
                    echo ("Impossible d\'ajouter le commentaire !");
                }
            } else {
                $error = "Le commentaire ne peut être vide !";
            }
        }
    }
}
function truncate($text, $lg_max)
{
    if (strlen($text) > $lg_max) {
        $text = substr($text, 0, $lg_max);
        $last_space = strrpos($text, " ");
        $string = substr($text, 0, $last_space) . "...";
        return $string;
    }

    require 'views/frontend/listArticlesView.php';
}
