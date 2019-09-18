<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>

<body>
    <ul>
        <?php while ($a = $posts->fetch()) { ?>

            <li>
                <a href="ArticlesView.php?id=<?= $a['id'] ?>">

                    <?= $a['title'] ?></a>
                <a href="edit.php?edit=<?= $a['id'] ?>">Modifier</a>
                <a href="delete_article.php?id=<?= $a['id'] ?>">Supprimer</a>
            </li>
        <?php } ?>
    </ul>
</body>

</html>