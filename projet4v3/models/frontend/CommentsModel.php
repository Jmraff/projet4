<?php

require_once "models/DBConnectModel.php";

class CommentsManager extends DBConnectManager
{

    public function addComment($postId, $userId, $author, $comment)
    {

        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO Comments(idArticles, authorId,  comment, dateCreation) VALUES (?, ?, ?,  NOW())');

        $ins->execute(array($_GET['postId'], $_SESSION['id'], $comment));

        return $ins;
    }

    public function getComments($getid)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT Comments.comment, Users.username FROM Comments INNER JOIN Users on Comments.authorId = Users.id where Comments.idArticles = ? ORDER BY dateCreation DESC');
        $comments->execute(array($getid));
        return $comments;
    }
    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT commentsId, comment, authorId, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') FROM Comments WHERE id = ?');
        $comment->execute(array($commentId));
        $commentA = $comment->fetch();

        return $commentA;
    }



    public function deleteComment()
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM Comments WHERE commentsId = ?');
        $comment->execute(array());
    }

    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE Comments SET report = report + 1 WHERE commentsId = ?');
        $affectedLines = $comment->execute(array($_GET['commentsId']));

        return $affectedLines;
    }

    public function getReportComment()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT idArticles, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%imin%ss\') AS dateCreation, comment, report, idArticles FROM Comments WHERE report > 0 ORDER BY report DESC LIMIT 0, 5');

        return $req;
    }

    public function ignoreComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE Comments SET report = 0 WHERE idArticles = ?');
        $affectedLines = $req->execute(array($commentId));

        return $affectedLines;
    }
}
