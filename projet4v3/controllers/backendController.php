<?php

require 'models/backend/ArticlesModel.php';
require 'models/backend/EditArticlesModel.php';
require 'models/frontend/CommentsModel.php';




function adminHome()
{
    $adminListArticles = new DisplayArticles();
    $articles = $adminListArticles->adminListArticles();
    require 'views/backend/adminHomeView.php';
}

function newChapter()
{

    require 'views/backend/addChapterView.php';
}

function editArticlePage()
{
    $editArticle1 = new EditPosts;
    $displayEditArticle = $editArticle1->editArticles($_GET['postId']);



    require 'views/backend/editView.php';
}



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
    require 'views/backend/manageCommentsView.php';
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
    if (!empty($_POST['article_title']) && !empty($_POST['article_content'])) {
        $addArticle = new EditPosts;
        $newArticle = $addArticle->postArticles($title, $content);
    } else {
        $error = "Tous les champs doivent être complétés !";
    }

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
