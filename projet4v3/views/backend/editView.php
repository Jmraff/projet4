<?php ob_start(); ?>

<!-- <head>
    <title>Rédaction / Edition</title>
    <meta charset="utf-8">
    
</head> -->

<h1>Page d'edition</h1>
<form method="POST" action="/projet4v3/index.php?action=addArticle">
    <input type="text" id="article_title" name="article_title" placeholder="Titre" <?php if ($edit_mode == 1) { ?> value="<?=
                                                                                                                                    $edit_article['title'] ?>" <?php } ?> /><br />
    <textarea id="article_content" name="article_content" placeholder="Contenu de l'article"><?php if ($edit_mode == 1) { ?><?=
                                                                                                                                    $edit_article['content'] ?><?php } ?></textarea><br />
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