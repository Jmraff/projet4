<?php

require_once 'models/backend/ArticlesModel.php';
require_once 'models/backend/EditArticlesModel.php';
require_once 'models/frontend/CommentsModel.php';



//Admin Homepage function
function adminHome()
{
    $adminListArticles = new DisplayArticles();
    $articles = $adminListArticles->listArticles();
    require 'views/backend/adminHomeView.php';
}

function adminDisplayArticle()
{

    $commentManager = new CommentsManager;

    $displayArticle = new DisplayArticles;
    $comments = $commentManager->getComments($_GET['postId']);


    $article1 = $displayArticle->getArticle($_GET['postId']);



    require 'views/backend/adminChapterView.php';
}




// Admin comments manager functions
function manageComments()
{
    $commentManager = new CommentsManager;
    $comments = $commentManager->getReportComment();
    require 'views/backend/manageCommentsView.php';
}
function deleteComment($commentId)
{
    $commentManager = new CommentsManager;
    $deleteComment = $commentManager->deleteComment($commentId);
    require 'views/backend/manageCommentsView.php';
}
function ignoreComment($commentId)
{
    $commentManager = new CommentsManager;
    $ignoreComment = $commentManager->ignoreComment($commentId);
    $comments = $commentManager->getReportComment();
    require 'views/backend/manageCommentsView.php';
}







// Admin articles manager functions
function newChapter()
{

    require 'views/backend/addChapterView.php';
}
function adminListArticles()
{

    $adminListArticles = new DisplayArticles();
    $articles = $adminListArticles->listArticles();




    require 'views/backend/postsView.php';
}

function addArticle($title, $content)
{
    if (!empty($_POST['article_title']) && !empty($_POST['article_content'])) {
        $addArticle = new EditPosts;
        $newArticle = $addArticle->postArticles($title, $content);
    } else {
        $error = "Tous les champs doivent être complétés !";
    }

    require 'views/backend/editView.php';
}
function editArticlePage()
{
    $editArticle1 = new EditPosts;
    $displayEditArticle = $editArticle1->editArticles($_GET['postId']);



    require 'views/backend/editView.php';
}

function updateArticle($updateTitle, $updateContent, $updatePostId)
{
    if (!empty($_POST['new_article_title']) && !empty($_POST['new_article_content'])) {
        $newUpdateArticle = new EditPosts;
        $updateArticle = $newUpdateArticle->updateArticles($updateTitle, $updateContent, $updatePostId);
        header('Location: index.php?action=editArticle&postId=' . $updatePostId);
    } else {

        $error = "Tous les champs doivent être complétés !";
    }

    require 'views/backend/editView.php';
}

function deleteArticle($postId)
{

    $deleteArticle = new EditPosts;
    $deleteArticleNow = $deleteArticle->deleteArticle($postId);
    header("Location: index.php?action=adminHome");
    require 'views/backend/adminHomeView.php';
}
