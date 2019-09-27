<?php ob_start(); ?>

<head>
    <title>Rédaction / Edition</title>
    <meta charset="utf-8">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({

            selector: '#article_content'
        });
    </script>
</head>

<body>
    <form method="POST" action="/projet4v3/index.php?action=addArticle">
        <input type="text" id="article_title" name="article_title" placeholder="Titre" <?php if ($edit_mode == 1) { ?> value="<?=
                                                                                                                                        $edit_article['title'] ?>" <?php } ?> /><br />
        <textarea id="article_content" name="article_content" placeholder="Contenu de l'article"><?php if ($edit_mode == 1) { ?><?=
                                                                                                                                        $edit_article['content'] ?><?php } ?></textarea><br />
        <input type="submit" value="Envoyer l'article" />
    </form>
    <br />
    <?php $content = ob_get_clean(); ?>
    <?php require('backendTemplate.php'); ?>