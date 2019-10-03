<?php

require_once "models/DBConnectModel.php";

class CommentsManager extends DBConnectManager
{

    public function addComment($postId, $userId, $author, $comment)
    {

        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO Comments(idArticles, authorId, authorName, comment, dateCreation) VALUES (?, ?, ?, ?, NOW())');

        $ins->execute(array($_GET['postId'], $_SESSION['id'], $_SESSION['username'], $comment));

        return $ins;
    }

    public function getComments($getid)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM Comments INNER JOIN Articles  ON  Comments.idArticles = Articles.postId  where Articles.postId = ? ORDER BY dateCreation DESC');
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

    public function deleteCommentPost($postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM Comments WHERE commentsId = ?');
        $comment->execute(array($postId));
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM Comments WHERE commentsId = ?');
        $comment->execute(array($commentId));
    }

    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE Comments SET report = report + 1 WHERE idArticles = ?');
        $affectedLines = $comment->execute(array($commentId));

        return $affectedLines;
    }

    public function getReportComment()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT idArticles, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%imin%ss\') AS dateCreation, comment, report FROM Comments WHERE report > 0 ORDER BY report DESC LIMIT 0, 5');

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
