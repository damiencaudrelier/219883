<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Catalogue</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=sitemarchandv1;charset=utf8', 'root', '');
				$idCategorie =$_GET['categorie'];
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
		?>
	</head>
	<body>   
        <div class="div_categorie">
			<h1>Catégorie</h1>
				<div class="categorie">		
   	<li><a href="categorie">Client</a>
      <ul>
         <li><a href="connexion.php">Connexion</a></li>
         <li><a href="modifier.php">Modifier</a></li>
      </ul>
      </div>
			<a class="categorie" href="index.php">Accueil</a></br>
			<?php
				$reponse = $bdd->query('SELECT * FROM categorie');		
				while ($donnees = $reponse->fetch())	
				{
				?>
					<a class="categorie" href="categorie.php?categorie=<?php echo $donnees['idCategorie']; ?>"><?php echo $donnees['nomCategorie']; ?></a></br>
				<?php
				}

				$reponse->closeCursor(); 
			?>
        </div>
		
		<div class="zone_article">
			<?php
				$requete = ('SELECT * FROM produit WHERE idCategorie = ' . $idCategorie);
				$reponse = $bdd->query($requete);	
				while ($donnees = $reponse->fetch())	
				{
				?>
				<div class="div_article" id="produit-<?php echo $donnees['idProduit']; ?>">
					<img class="image_article" src="img/<?php echo $donnees['photo']; ?>.jpg">
					<a><?php echo $donnees['description']; ?></a>
					<strong><a><?php echo $donnees['prix']; ?>€</a></strong>
				</div>

				<?php
				}
				$reponse->closeCursor(); 
			?>
		</div>
	<body>
</html>