<!doctype html>

<?php


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if(isset($_POST['forminscription'])) {
$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);
$mail2 = htmlspecialchars($_POST['mail2']);
$pass = sha1($_POST['pass']);
$pass2 = sha1($_POST['pass2']);
if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['pass']) AND !empty($_POST['pass2'])) {
$pseudolength = strlen($pseudo);
if($pseudolength <= 255) {
   if($mail == $mail2) {
      if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
         $reqmail = $bdd->prepare("SELECT * FROM Users WHERE email = ?");
         $reqmail->execute(array($mail));
         $mailexist = $reqmail->rowCount();
         if($mailexist == 0) {
            if($pass == $pass2) {
               $insertmbr = $bdd->prepare("INSERT INTO Users(username, email, pass) VALUES(?, ?, ?)");
               $insertmbr->execute(array($pseudo, $mail, $pass));
               $error = "Votre compte a bien été créé ! <a href=\"connect_view.php\">Me connecter</a>";
            } else {
               $error = "Vos mots de passes ne correspondent pas !";
            }
         } else {
            $error = "Adresse mail déjà utilisée !";
         }
      } else {
         $error = "Votre adresse mail n'est pas valide !";
      }
   } else {
      $error = "Vos adresses mail ne correspondent pas !";
   }
} else {
   $error = "Votre pseudo ne doit pas dépasser 255 caractères !";
}
} else {
$error = "Tous les champs doivent être complétés !";
}
}
?>




<html>
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">
     
   </head>
   <body>
      
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <table>  
               <tr>
                 
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                 
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                 
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
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
         if(isset($error)) {
            echo '<font color="red">'.$error."</font>";
         }
         ?>
         
      </div>
   </body>
</html>


