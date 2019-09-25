<?php ob_start(); ?>
<h1>Bienvenue sur le blog de Jean Forteroche</h1>





<?php $content = ob_get_clean(); ?>

<?php require('frontendTemplate.php'); ?>