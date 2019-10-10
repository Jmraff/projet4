<?php ob_start(); ?>



<h1>Page d'edition</h1>


<form method="POST" action="/projet4v3/index.php?action=updateArticle&postId=<?= $displayEditArticle['postId'] ?>">
    <input type="text" id="article_title" name="new_article_title" placeholder="Titre" value="<?= $displayEditArticle['title'] ?>">

    <textarea id="article_content" name="new_article_content" placeholder="Contenu de l'article"><?= $displayEditArticle['content'] ?></textarea><br />

    <input type="submit" value="Envoyer l'article" />
</form>

<br />

<?php
if (isset($error)) {
    echo '<font color="red">' . $error . "</font>";
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>