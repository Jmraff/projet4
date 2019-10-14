<?php ob_start(); ?>


<h1>Page d'ajout de chapitre</h1>


<form method="POST" action="/index.php?action=addArticle">
    <input type="text" id="article_title" name="article_title" placeholder="Titre" value="">

    <textarea id="article_content" name="article_content" placeholder="Contenu de l'article"></textarea><br />

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