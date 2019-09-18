<?php

require_once "DBConnectModel.php";

class DisplayPosts extends DBConnectManager
{

    public function listArticles()
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
        if ($article->rowCount() != 1) {

            die('Cet article n\'existe pas !');
        } else {

            return $article;
        }
    }
}
