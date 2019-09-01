<?php
session_start();

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if(isset($_POST['formconnection'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   //$mdpconnect = password_verify($_POST['passconnect'], SELECT );
   if(!empty($pseudoconnect) AND !empty($_POST['passconnect'])) {
      $reqpass = $bdd->prepare("SELECT * FROM Users WHERE username = ? ");
      $reqpass->execute(array(htmlspecialchars($_POST['pseudoconnect'])));
      $userexist = $reqpass->rowCount();
    
      
      if($userexist != 0) {
         $pass_hach = $reqpass->fetch();
         
         $mdpconnect = password_verify($_POST['passconnect'], $pass_hach['pass'] );
        
         if ($mdpconnect == true){
         $_SESSION['id'] = $pass_hach['id'];
         $_SESSION['username'] = $pass_hach['username'];
         $_SESSION['email'] = $pass_hach['email'];
        
         header("Location: index.php?id=".$_SESSION['id']);
     } } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
   </head>
   <body>
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
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>