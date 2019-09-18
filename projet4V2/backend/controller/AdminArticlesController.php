<?php
require 'backend/models/ArticlesModel.php';
require 'backend/models/EditPostsModel.php';

function listPosts()
{
    $listPosts = new DisplayPosts();

    $posts = $listPosts->listArticles();

    require 'backend/views/postsView.php';
}
function displayArticle()
{

    $displayPosts = new DisplayPosts();

    $post = $displayPosts->getArticle($_GET['id']);

    require 'backend/views/ArticlesView.php';
}

function ModifyPosts()
{

    $modifyPosts = new EditPosts;
    $modifyPost = $modifyPosts->editArticle($_GET['edit']);

    require 'backend/views/editView.php';
}
function AddPosts()
{


    $addPosts = new EditPosts;
    $addPost = $addPosts->postArticles();
    require 'backend/views/editView.php';
}
