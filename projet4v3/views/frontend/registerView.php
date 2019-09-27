<?php ob_start(); ?>
<h2>Inscription</h2>
<br /><br />
<form method="POST" action="index.php?action=register">
    <table>
        <tr>

            <label for="pseudo">Pseudo :</label>
            </td>
            <td>
                <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if (isset($pseudo)) {
                                                                                                    echo $pseudo;
                                                                                                } ?>" />
            </td>
        </tr>
        <tr>

            <label for="mail">Mail :</label>
            </td>
            <td>
                <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if (isset($mail)) {
                                                                                                echo $mail;
                                                                                            } ?>" />
            </td>
        </tr>
        <tr>

            <label for="mail2">Confirmation du mail :</label>
            </td>
            <td>
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if (isset($mail2)) {
                                                                                                            echo $mail2;
                                                                                                        } ?>" />
            </td>
        </tr>
        <tr>

            <label for="pass">Mot de passe :</label>
            </td>
            <td>
                <input type="password" placeholder="Votre mot de passe" id="pass" name="pass" />
            </td>
        </tr>
        <tr>

            <label for="pass2">Confirmation du mot de passe :</label>
            </td>
            <td>
                <input type="password" placeholder="Confirmez votre mdp" id="pass2" name="pass2" />
            </td>
        </tr>
        <tr>
            <td></td>

            <br />
            <input type="submit" name="forminscription" value="Je m'inscris" />
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($error)) {
    echo '<font color="red">' . $error . "</font>";
}
?>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>