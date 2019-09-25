<?php

session_start();
// require 'controllers/frontendController.php';
require 'controllers/backendController.php';



//connect


try {


    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'adminListArticles') {

            adminListArticles();
        } elseif ($_GET['action'] == 'displayArticle') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                displayArticle();
                echo 'display';
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    } else {
        adminListArticles();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}






// try {

//     if (isset($_GET['action'])) {
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
