<?php ob_start(); ?>

<div class="container py-5">
    <form method="POST" action="index.php?action=createUser">





        <fieldset>
            <legend>Inscription</legend>
            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if (isset($pseudo)) {
                                                                                                    echo $pseudo;
                                                                                                } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="mail">Mail :</label>
                <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if (isset($mail)) {
                                                                                                echo $mail;
                                                                                            } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="mail2">Confirmation du mail :</label>
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if (isset($mail2)) {
                                                                                                            echo $mail2;
                                                                                                        } ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Mot de passe :</label>
                <input type="password" placeholder="Votre mot de passe" id="pass" name="pass" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass2">Confirmation du mot de passe :</label>
                <input type="password" placeholder="Confirmez votre mdp" id="pass2" name="pass2" class="form-control">
            </div>
            <input type="submit" name="forminscription" value="Je m'inscris" class="btn btn-primary">
        </fieldset>
    </form>





    <?php
    if (isset($error)) {
        echo '<font color="red">' . $error . "</font>";
    }
    ?>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>