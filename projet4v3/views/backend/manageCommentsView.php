<?php ob_start(); ?>
<h2>Modération des commentaires</h2>

<div id="content">

    <div id="comments">

        <?php
        while ($comment = $comments->fetch()) {
            ?>
            <div class="comment">
                <h3>
                    <em>le <?= $comment['dateCreation'] ?></em>
                </h3>

                <p>
                    <?= nl2br(htmlspecialchars($comment['comment'])) ?> <br />

                </p>
                <p>Nombre de signalement : <?= $comment['report'] ?></p>
                <em><a href="index.php?action=deleteComment?commentsId=<?= $comment['commentsId'] ?>" class="adminButton">Supprimer</a></em>
                <em><a href="index.php?action=ignoreComment?commentsId=<?= $comment['commentsId'] ?>" class="adminButton">Ignorer</a></em>
            </div>
        <?php
        }
        $comments->closeCursor();
        ?>

    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'backendTemplate.php'; ?>