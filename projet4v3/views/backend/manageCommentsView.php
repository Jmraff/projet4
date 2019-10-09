<?php ob_start(); ?>


<h2>Modération des commentaires</h2>

<div class="container py-5">

    <?php
    while ($comment = $comments->fetch()) {

        ?>
        <div class="jumbotron">
            <h3>
                le <?= htmlspecialchars($comment['dateCreation']) ?>
            </h3>
            <h5>
                le <?= htmlspecialchars($comment['dateCreation']) ?>
            </h5>

            <p>
                <?= nl2br(htmlspecialchars($comment['comment'])) ?> <br />

            </p>
            <p>Nombre de signalements : <?= $comment['report'] ?></p>
            <em><a href="index.php?action=deleteComment&commentsId=<?= $comment['commentsId'] ?>" class="adminButton">Supprimer</a></em>
            <em><a href="index.php?action=ignoreComment&commentsId=<?= $comment['commentsId'] ?>" class="adminButton">Ignorer</a></em>
        </div>
    <?php
    }
    $comments->closeCursor();
    ?>

</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'backendTemplate.php'; ?>