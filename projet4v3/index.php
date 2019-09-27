<?php

session_start();
require 'controllers/frontendController.php';
require 'controllers/backendController.php';
require 'controllers/connectController.php';


//Admin


try {


    if (isset($_GET['action'])) {
        if ($_SESSION['isAdmin'] == 1) {
            if ($_GET['action'] == 'adminListArticles') {

                adminListArticles();
            } elseif ($_GET['action'] == 'addArticle') {

                if (!empty($_POST['article_title']) && !empty($_POST['article_content'])) {

                    addArticle($_POST['article_title'], $_POST['article_content']);
                } else {
                    throw new Exception("Erreur : tous les champs ne sont pas remplis !");
                }
            } elseif ($_GET['action'] == 'register') {


                createUser();
            } elseif ($_GET['action'] == 'displayArticle') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    displayArticle();
                    echo 'display';
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
        } else {

            //Connection

            if ($_GET['action'] == 'home') {

                home();
            } elseif ($_GET['action'] == 'userConnect') {
                userConnect();

                header("Location: index.php?action=home");
            } elseif ($_GET['action'] == 'register') {
                createUser();
            } elseif ($_GET['action'] == 'disconnect') {
                if (isset($_SESSION['id']))


                    disconnect();
                header("Location: index.php?action=home");
            } else {
                adminListArticles();
            }
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}






// try {

//     elseif (isset($_GET['action'])) {
//         if ($_GET['action'] == 'register') {

//             createUser();
//         }
//     } elseif ($_GET['action'] == 'userConnect') {
//         if (isset($_GET['mail']) && $_GET['pseudo'] > 0) {
//             userConnect();
//             echo 'display';
//         }
//     }
// } catch (Exception $e) {
//     echo 'Erreur : ' . $e->getMessage();
// }
