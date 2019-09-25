<?php

require_once "models/DBConnectModel.php";

class UserManager extends DBConnectManager
{




    public function checkUser($mail, $pseudo)
    {

        $db = $this->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM Users WHERE email = ?");
        $reqmail->execute(array($mail));
        return $reqmail;

        $reqpseudo = $db->prepare("SELECT * FROM Users WHERE username = ?");
        $reqpseudo->execute(array($pseudo));
        return $reqpseudo;
    }
    public function createUser($pseudo, $mail, $pass)
    {

        $db = $this->dbConnect();
        $insertmbr = $db->prepare("INSERT INTO Users(username, email, pass) VALUES(?, ?, ?)");
        $insertmbr->execute(array($pseudo, $mail, $pass));
    }
    public function userConnect()
    {
        $db = $this->dbConnect();
        $reqpass = $db->prepare("SELECT * FROM Users WHERE username = ? ");
        $reqpass->execute(array(htmlspecialchars($_POST['pseudoconnect'])));
        return $reqpass;
    }
    public function connected($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT admin FROM Users WHERE id = ?');
        $req->execute(array($userId));
        $connected = $req->fetch();

        return $connected;
    }
}
