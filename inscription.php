<?php
	try
		{
		$bdd = new PDO('mysql:host=localhost:3306;dbname=site_marchand;charset=utf8', 'root', '');
		}
	catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}

if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $mail = htmlspecialchars($_POST['email']);
   $tel = htmlspecialchars($_POST['tel']);
   $civi = htmlspecialchars($_POST['civi']);
   $date = htmlspecialchars($_POST['date']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdpv']);
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['tel']) AND !empty($_POST['civi']) AND !empty($_POST['date']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpv'])) {
      $pseudolength = strlen($nom);
      if($pseudolength <= 255) {
         if($mail == $mail) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM client WHERE Email_Client = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO `client`(`Nom_Client`, `Prenom_Client`, `Civilite_Client`, `Tel_Client`, `Email_Client`, `Motdepasse_Client`, `Anniversaire_Client`) VALUES (?, ?, ?, ?, ?, ?, ?)");
                     $insertmbr->execute(array($nom, $prenom, $civi, $tel, $mail, $mdp, $date ));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
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
<form action="" method="post">
<div class="container">
	<div class="row">

	            <div class="form-group col-sm-6">
	                <label for="name" class="h4">Nom</label>
	                <input type="text" class="form-control" name="nom" placeholder="Votre nom" required>
	            </div>
	            <div class="form-group col-sm-6">
	                <label for="name" class="h4">Prénom</label>
	                <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" required>
	            </div>
	            <div class="form-group col-sm-6">
                	<label for="email" class="h4">Email</label>
                	<input type="email" class="form-control" name="email" placeholder="Votre mail" required>
            	</div>       	
	            <div class="form-group col-sm-6">
	                <label for="name" class="h4">Téléphone</label>
	                <input type="text" class="form-control" name="tel" placeholder="Votre numéro" required>
	            </div>
				  <div class="form-group col-sm-6">
				    <label for="name" class="h4">Civilité</label>
				    <select class="form-control" name="civi">
				      <option>Homme</option>
				      <option>Femme</option>
				    </select>
				  </div>
				<div class="form-group col-sm-6">
	                <label for="name" class="h4">Date de naissance</label>
	                <input class="form-control" type="date" value="2011-08-19" name="date" required>
	            </div>            
	            <div class="form-group col-sm-6">
	                <label for="name" class="h4">Mot de passe</label>
	                <input type="password" id="password" class="form-control" name="mdp" placeholder="Votre mot de passe" required>
	                    <label>
							<input type="checkbox" value='' title="Mask/Unmask password" onclick=toto()> Afficher les caractères
					    </label>
	            </div>
	            <div class="form-group col-sm-6">
	                <label for="name" class="h4"> Vérification mot de passe</label>
	                <input type="password" id="passwordi" class="form-control" name="mdpv" placeholder="Votre mot de passe" required>
	                    <label>
							<input type="checkbox" value='' title="Mask/Unmask password" onclick=toti()> Afficher les caractères
					    </label>	                
	            </div>
	        </div>	      
	        <button type="submit" id="form-submit" name="forminscription" class="btn btn-secondary btn-lg pull-right ">S'inscrire</button>
</div>
</form>
<div class="container">
	<br>
<?php
         if(isset($erreur)) {
            echo '<div class="alert alert-danger" role="alert"><p>'.$erreur."</div>";
         }
         ?>
</div>

<script type="text/javascript">
     function toto()
          {
          mdp = document.getElementById('password');
          theType = mdp.getAttribute('type');
          if ( theType == 'password' )
               mdp.setAttribute('type', 'text') ;
          else
               mdp.setAttribute('type', 'password') ;
          };
     function toti()
          {
          mdp = document.getElementById('passwordi');
          theType = mdp.getAttribute('type');
          if ( theType == 'password' )
               mdp.setAttribute('type', 'text') ;
          else
               mdp.setAttribute('type', 'password') ;
          };          
</script>
</body>
</html>