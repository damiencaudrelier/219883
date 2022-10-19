<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Catalogue</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			try
			{
				// On se connecte à MySQL
				$bdd = new PDO('mysql:host=localhost;dbname=sitemarchandv1;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}
		?>
	</head>
	
	<body>
	 
        
        <div class="div_categorie">
			<h1>Catalogue</h1>
				
	<div class="categorie">		
      <ul>
         <li><a href="connexion.php">Connexion</a></li>
         <li><a href="inscription.php">Inscription</a></li>
      </ul>
      </div>
			<?php
				$reponse = $bdd->query('SELECT * FROM categorie');		// Ajout de la table produit et de tout ce qu'elle contient
				while ($donnees = $reponse->fetch())		// On affiche chaque entrée une à une
				{
				?>
					<a class="categorie" href="categorie.php?categorie=<?php echo $donnees['idCategorie']; ?>"><?php echo $donnees['nomCategorie']; ?></a></br>
				<?php
				}

				$reponse->closeCursor(); // Termine le traitement de la requête
			?>
        </div>
		
		<div class="zone_article">

			<?php
				$reponse = $bdd->query('SELECT * FROM produit');		// Ajout de la table produit et de tout ce qu'elle contient
				while ($donnees = $reponse->fetch())		// On affiche chaque entrée une à une
				{
				?>
				<div class="div_article" id="produit-<?php echo $donnees['idProduit']; ?>">
					<img class="image_article" src="img/<?php echo $donnees['photo']; ?>.jpg">
					<a><?php echo $donnees['description']; ?></a>
					<strong><a><?php echo $donnees['prix']; ?>€</a></strong>
				</div>

				<?php
				}

				$reponse->closeCursor(); // Termine le traitement de la requête
			?>

			
		</div>
	<body>
</html>