<?php

require_once "models/DBConnectModel.php";

class EditPosts extends DBConnectManager
{


    public function editArticles($edit_id)
    {



        $db = $this->dbConnect();


        $edit_article = $db->prepare('SELECT * FROM Articles WHERE postId = ?');
        $edit_article->execute(array($edit_id));
        $editArticle = $edit_article->fetch();
        return $editArticle;
    }

    public function postArticles($title, $content)
    {

        $db = $this->dbConnect();


        $req = $db->prepare('INSERT INTO Articles(title, content, creationDate) VALUES (?, ?, NOW())');
        $post = $req->execute(array($title, $content));

        return $post;
    }

    public function updateArticles($updateTitle, $updateContent, $updatePostId)
    {

        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE Articles SET title = ?, content = ?, editionDate = NOW() WHERE postId = ?');
        $update->execute(array($updateTitle, $updateContent, $updatePostId));
        return $update;
    }
    public function deleteArticle($postId)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM Articles WHERE postId = ?');
        $req->execute(array($postId));
    }
}
