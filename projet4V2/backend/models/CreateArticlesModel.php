<?php

require_once "DBConnectModel.php";

class EditPosts extends DBConnectManager
{
    public $edit_mode = 0;

    public function editArticles()
    {



        $db = $this->dbConnect();

        $edit_id = htmlspecialchars($_GET['edit']);
        $edit_article = $db->prepare('SELECT * FROM Articles WHERE id = ?');
        $edit_article->execute(array($edit_id));
        if ($edit_article->rowCount() == 1) {
            $edit_article = $edit_article->fetch();
        } else {
            die('Erreur : l\'article n\'existe pas...');
        }
    }

    public function postArticles()
    {

        $db = $this->dbConnect();
        $edit_id = htmlspecialchars($_GET['edit']);
        $edit_mode = 0;
        $article_title = htmlspecialchars($_POST['article_title']);
        $article_content = $_POST['article_content'];
        if ($edit_mode == 0) {
            $ins = $db->prepare('INSERT INTO Articles(title, content, creationDate) VALUES (?, ?, NOW())');
            $ins->execute(array($article_title, $article_content));
            var_dump($ins);
            $message = 'Votre article a bien été posté';
        } else {
            $update = $db->prepare('UPDATE Articles SET title = ?, content = ?, editionDate = NOW() WHERE id = ?');
            $update->execute(array($article_title, $article_content, $edit_id));
            var_dump($ins);
            $message = 'Votre article a bien été mis à jour !';
        }
    }
}
