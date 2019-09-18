<!DOCTYPE html>
<html>

<head>
   <title>Article</title>
   <meta charset="utf-8">
</head>

<body>
   <?php

   $articlelu = $post->fetch();
   $title = $articlelu['title'];
   $content = $articlelu['content']; ?>

   <h1><?= $title ?></h1>
   <p><?= $content ?></p>
</body>

</html>