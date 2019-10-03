<?php ob_start(); ?>
<h1>Jean Forteroche</h1>
<p>Derniers articles</p>


<?php
while ($data = $articles->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creationDate'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$articles->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('backendTemplate.php'); ?>