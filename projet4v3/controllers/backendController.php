<?php



class BackendController
{

    public function listArticles()
    {

        $listArticles = new DisplayPosts();
        $articles = $listArticles->listArticles();


        require 'backend/views/postsView.php';
    }

    public function displayArticle()
    {

        $displayArticle = new DisplayPosts();

        $article = $displayArticle->getArticle($_GET['id']);

        require 'backend/views/ArticlesView.php';
    }

    public function addArticle()
    {

        $addArticle = new EditPosts;
        $newArticle = $addArticle->postArticles();


        require 'backend/views/editView.php';
    }
    public function editArticle()
    { }
}
