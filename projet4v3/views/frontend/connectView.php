<?php ob_start(); ?>
<div align="center">
    <h2>Connexion</h2>
    <br /><br />
    <form method="POST" action="">
        <input type="text" name="pseudoconnect" placeholder="Mail" />
        <input type="password" name="passconnect" placeholder="Mot de passe" />
        <br /><br />
        <input type="submit" name="formconnection" value="Se connecter !" />
        <a href="register_view.php">Je n'ai pas de compte</a>
    </form>
    <?php
    if (isset($erreur)) {
        echo '<font color="red">' . $erreur . "</font>";
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>