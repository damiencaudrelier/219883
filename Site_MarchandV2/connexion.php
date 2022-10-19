<?php
session_start();

try
    {
    $bdd = new PDO('mysql:host=localhost:3306;dbname=site_marchand;charset=utf8', 'root', '');
    }
  catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM Client WHERE Email_Client = ? AND Motdepasse_Client = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Catalogue</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
<div class="categorie">		
      <ul>
         <li><a href="index.php">Accueil</a></li>
      </ul>
      </div>
<br>
<form action="#" method="post">
<div class="container">
	<div class="row">

	            <div class="form-group col-sm-6">
	                <label for="name" class="h4">Adresse mail</label>
	                <input type="email" class="form-control" name="mailconnect" placeholder="Votre mail" required>
	            </div>   
	            <div class="form-group col-sm-6">
	                <label for="name" class="h4">Mot de passe</label>
	                <input type="password" class="form-control" name="mdpconnect" placeholder="Votre mot de passe" required>
	            </div>
	        </div>	      
	        <button type="submit" name="formconnexion" class="btn btn-secondary btn-lg pull-right ">Se connecter</button>
</div>
</form>
<?php
         if(isset($erreur)) {
            echo '<div class="alert alert-danger" role="alert"><p>'.$erreur."</div>";
         }
         ?>
</body>
</html>