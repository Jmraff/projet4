<?php

require_once "models/DBConnectModel.php";

class EditPosts extends DBConnectManager
{


    public function editArticles()
    {



        $db = $this->dbConnect();

        $edit_id = htmlspecialchars($_GET['edit']);
        $edit_article = $db->prepare('SELECT * FROM Articles WHERE postId = ?');
        $edit_article->execute(array($edit_id));
        if ($edit_article->rowCount() == 1) {
            $edit_article = $edit_article->fetch();
        } else {
            die('Erreur : l\'article n\'existe pas...');
        }
    }

    public function postArticles($title, $content)
    {

        $db = $this->dbConnect();


        $req = $db->prepare('INSERT INTO Articles(title, content, creationDate) VALUES (?, ?, NOW())');
        $post = $req->execute(array($title, $content));

        return $post;
    }
}
