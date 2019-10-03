<?php

require 'models/connect/ConnectManager.php';

function disconnect()
{


    session_destroy();
}
function isAdmin()
{

    if (!empty($_SESSION['id'])) {
        $userManager = new UserManager;
        $connected = $userManager->connected($_SESSION['id']);

        if (($connected['isAdmin']) == '1') {
            header('Location: index.php?action=adminConnected');
        } else {
            throw new Exception("Cet page est réservée à l'auteur");
        }
    } else {
        throw new Exception("Veuillez vous connecter");
    }
}
function createUser()
{

    $usermanager = new UserManager;

    if (isset($_POST['forminscription'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);




        if (!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['pass']) and !empty($_POST['pass2'])) {
            $pseudolength = strlen($pseudo);
            if ($pseudolength <= 255) {
                if ($mail == $mail2) {
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $verify_email = $usermanager->checkMail($mail);
                        $verify_email->execute(array($mail));

                        $verify_pseudo = $usermanager->checkPseudo($pseudo);
                        $verify_pseudo->execute(array($pseudo));
                        $reqmail = $verify_email->rowCount($mail);
                        $reqpseudo = $verify_pseudo->rowCount($pseudo);



                        if (($reqmail == 0) && ($reqpseudo == 0)) {
                            if ($_POST['pass'] == $_POST['pass2']) {
                                $usermanager->createUser($pseudo, $mail, $pass);

                                header("Location: index.php?action=home");
                            } else {
                                $error = "Vos mots de passe ne correspondent pas !";
                            }
                        } else {
                            if ($reqmail != 0) {
                                $error = "Adresse mail déjà utilisée !";
                            } else {
                                $error = "Pseudo déjà utilisé !";
                            }
                        }
                    } else {
                        $error = "Votre adresse mail n'est pas valide !";
                    }
                } else {
                    $error = "Vos adresses mail ne correspondent pas !";
                }
            } else {
                $error = "Votre pseudo ne doit pas dépasser 255 caractères !";
            }
        } else {
            $error = "Tous les champs doivent être complétés !";
        }
        require 'views/frontend/registerView.php';
    }
}
function userConnect()
{

    $usermanager = new UserManager;



    if (isset($_POST['formconnection'])) {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);

        if (!empty($pseudoconnect) and !empty($_POST['passconnect'])) {

            $checkuser = $usermanager->userConnect();

            $userexist = $checkuser->rowCount();


            if ($userexist != 0) {
                $pass_hach = $checkuser->fetch();

                $mdpconnect = password_verify($_POST['passconnect'], $pass_hach['pass']);

                if ($mdpconnect == true) {

                    $_SESSION['id'] = $pass_hach['id'];
                    $_SESSION['username'] = $pass_hach['username'];
                    $_SESSION['email'] = $pass_hach['email'];
                    $_SESSION['isAdmin'] = $pass_hach['isAdmin'];
                    header("Location: index.php?action=home");
                }
            } else {
                echo "Mauvais mail ou mot de passe !";
            }
        } else {
            echo "Tous les champs doivent être complétés !";
        }
    }
    require 'views/frontend/frontendTemplate.php';
}
