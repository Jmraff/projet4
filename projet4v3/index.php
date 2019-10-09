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

            if ($_SESSION['isAdmin'] == '1') {

                header("Location: index.php?action=adminHome");
            } else {
                header("Location: index.php?action=home");
            }
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
                throw new Exception('Le commentaire ne peut être vide :)');
            }
        } elseif ($_GET['action'] == 'reportComment') {

            if (isset($_GET['commentsId']) && isset($_GET['postId'])) {

                reportComment($_GET['commentsId'], $_GET['postId']);
            } else {
                echo "erreur";
            }
        } elseif ($_SESSION['isAdmin'] == '1') {



            if ($_GET['action'] == 'adminHome') {

                adminHome();
            } elseif ($_GET['action'] == 'adminListArticles') {

                adminListArticles();
            } elseif ($_GET['action'] == 'addArticle') {
                addArticle($_POST['article_title'], $_POST['article_content']);
            } elseif ($_GET['action'] == 'adminDisplayArticle') {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    adminDisplayArticle();
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            } elseif ($_GET['action'] == 'editArticlePage') {
                editArticlePage();
            } elseif ($_GET['action'] == 'manageComments') {

                manageComments();
            } elseif ($_GET['action'] == 'deleteComment') {
                deleteComment($_GET['commentsId']);
            } elseif ($_GET['action'] == 'ignoreComment') {
                ignoreComment($_GET['commentsId']);
            }
        } else {
            throw new Exception("Cet page est réservée à l'auteur");
        }
    } else {
        throw new Exception("Veuillez vous connecter");

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
