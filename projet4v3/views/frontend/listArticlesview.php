<?php ob_start(); ?>
<?php
while ($data = $articles->fetch()) {
    ?> <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creationDate'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=displayArticle&postId=<?= $data['postId'] ?>">Lire la suite</a></em>
        </p>
    </div>
<?php
}
$articles->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('frontendTemplate.php'); ?>