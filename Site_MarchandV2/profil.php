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

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM Client WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
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
     <form class="form-inline my-2 my-lg-0">
        <a class="nav-link" href="deconnexion.php">Déconnxeion</a>
    </form>
  </div>
</nav>
<br>
<div class="container">
<br>
         <h2>Profil de <?php echo $userinfo['Nom_Client']; ?></h2>
         <br /><br />
         Téléphone : <?php echo $userinfo['Tel_Client']; ?>
         <br />
         Mail : <?php echo $userinfo['Email_Client']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <?php
         }
         ?>
      </div>
      <br><br>
   </body>
</html>
<?php   
}
?>