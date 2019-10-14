<?php ob_start(); ?>


<div class="container py-5">
    <?php
    while ($data = $articles->fetch()) {
        ?>




        <div class="jumbotron">
            <h1> <?= htmlspecialchars($data['title']) ?></h1>
            <p>Le <?= htmlspecialchars($data['creationDate']) ?></p>
            <p><?= truncate($data['content'], 450,) ?></p>
            <p><a href="index.php?action=displayArticle&postId=<?= $data['postId'] ?>" class="btn btn-primary btn-large">Lire la suite »</a> </p>
        </div>








    <?php
    }
    $articles->closeCursor();
    ?>
    <?php $content = ob_get_clean(); ?>

    <?php require('frontendTemplate.php'); ?>