<?php

session_start();
require 'controllers/frontendController.php';
require 'controllers/backendController.php';
require 'controllers/connectController.php';


//Admin


try {


    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home') {

            home();
        } elseif ($_GET['action'] == 'userConnect') {
            userConnect();


            header("Location: index.php?action=home");
        } elseif ($_GET['action'] == 'register') {
            register();
        } elseif ($_GET['action'] == 'createUser') {
            createUser();
        } elseif ($_GET['action'] == 'disconnect') {
            if (isset($_SESSION['id']))
                disconnect();
            header("Location: index.php?action=home");
        } elseif ($_GET['action'] == 'listArticles') {
            listArticles();
            // } elseif ($_GET['action'] == 'addComment') {
            //     if (isset($_GET['id']) && $_GET['id'] > 0) {
            //         addComment($_POST['comment'], $_GET['id'], $_SESSION['username']);
            //     }
        } elseif ($_GET['action'] == 'displayArticle') {
            if (isset($_GET['postId']) && !empty($_GET['postId'])) {

                displayArticle();
            } else {
                throw new Exception("Erreur : aucun identifiant de billet envoyé");
            }
        } elseif ($_GET['action'] == 'addComment') {

            if (isset($_GET['postId'])) {

                addComment($_GET['postId'], $_SESSION['id'], $_SESSION['username'], $_POST['comment']);
            } else {
                echo "erreur";
            }
        } elseif ($_SESSION['isAdmin'] == 1) {
            if ($_GET['action'] == 'adminConnected') {
                isAdmin();
                adminHome();
            } elseif ($_GET['action'] == 'adminListArticles') {

                adminListArticles();
            } elseif ($_GET['action'] == 'addArticle') {

                if (!empty($_POST['article_title']) && !empty($_POST['article_content'])) {

                    addArticle($_POST['article_title'], $_POST['article_content']);
                } else {
                    throw new Exception("Erreur : tous les champs ne sont pas remplis !");
                }
            } elseif ($_GET['action'] == 'adminDisplayArticle') {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    adminDisplayArticle();
                    echo 'display';
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
        }

        //Connection


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
