<?php

require_once 'models/backend/ArticlesModel.php';
require_once 'models/backend/EditArticlesModel.php';
//require 'models/backend/ConnectManager.php';





function isAdmin()
{

    if (!empty($_SESSION['id'])) {
        $userManager = new UserManager;
        $connected = $userManager->connected($_SESSION['id']);

        if (($connected['isAdmin']) == 1) {
            header('Location: index.php?action=isAdmin');
        } else {
            throw new Exception("Cet page est réservée à l'auteur");
        }
    } else {
        throw new Exception("Veuillez vous connecter");
    }
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

function displayArticle()
{

    $displayArticle = new DisplayArticles;

    $article = $displayArticle->getArticle($_GET['id']);
    if ($article->rowCount() != 1) {

        die('Cet article n\'existe pas !');
    } else {

        return $article;
    }

    require 'views/backend/postsView.php';
}

function addArticle($title, $content)
{

    $addArticle = new EditPosts;
    $newArticle = $addArticle->postArticles($title, $content);


    require 'views/backend/editView.php';
}
function editArticle()
{ }
