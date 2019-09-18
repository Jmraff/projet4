<?php

require 'backend/controller/ArticlesController.php';
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {

            listPosts();
        } elseif ($_GET['action'] == 'displayArticle') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                displayArticle();
                echo 'display';
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'addPosts') {

            addPosts();
        } elseif ($_GET['action'] == 'ModifyPosts') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                ModifyPosts();
            } else {
                echo 'Erreur : larticle nexiste pas';
            }
        }
    } else {
        addPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
