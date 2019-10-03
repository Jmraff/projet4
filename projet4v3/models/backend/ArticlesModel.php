<?php

require_once "models/DBConnectModel.php";

class DisplayArticles extends DBConnectManager
{

    public function adminListArticles()
    {
        $db = $this->dbConnect();


        $articles = $db->query('SELECT * FROM Articles ORDER BY postId DESC');

        return $articles;
    }

    public function getArticle($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM Articles WHERE postId = ?');
        $req->execute(array($_GET['postId']));
        $article = $req->fetch();

        return $article;
    }
}
