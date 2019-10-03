<?php ob_start(); ?>



<div class="news">
    <h3>
        <?= $article1['title'] ?>
    </h3>

    <p>
        <?= $article1['content'] ?>
    </p>
    <div id="info">
        <em>le <?= $article1['creationDate'] ?></em>
    </div>
</div>

<h2>Commentaires:</h2>
<form method="POST" action="index.php?action=addComment&postId=<?= $article1['postId'] ?>">

    <textarea name="comment" placeholder="Votre commentaire..."></textarea><br />
    <input type="submit" value="Poster mon commentaire" name="submit_comment" />

</form>

<?php










?>



<?php if (isset($c_msg)) {
    echo $c_msg;
} ?>
<br /><br />
<?php while ($c = $comments->fetch()) { ?>
    <?= $c['authorId'] ?><br />
    <?= $c['comment'] ?><br />
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('frontendTemplate.php'); ?>