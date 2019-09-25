<?php

require_once "models/DBConnectModel.php";

class DisplayArticles extends DBConnectManager
{

    public function adminListArticles()
    {
        $db = $this->dbConnect();


        $articles = $db->query('SELECT * FROM Articles ORDER BY id DESC');

        return $articles;
    }

    public function getArticle($id)
    {
        $db = $this->dbConnect();
        $article = $db->prepare('SELECT * FROM Articles WHERE id = ?');
        $article->execute(array($id));

        return $article;
    }
}
