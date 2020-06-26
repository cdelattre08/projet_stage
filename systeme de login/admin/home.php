<?php require('../config.php'); ?>
<html>
    <head>
        <title>Espace Administrateur</title>
        <meta charset="utf-8">
    </head>
</html>
<?php

  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: ../login.php");
    exit(); 
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="sucess">
    <h1>Bienvenue <?php echo "".strip_tags($_SESSION['username']); ?> !</h1>
    <p>C'est votre espace administrateur.</p>
    <a href="add_user.php">Ajouter un utilisateur</a> | 
    <a href="delete_user.php">Supprimer un utilisateur</a> |
    <a href="list_user.php">Liste complète d'utilisateur</a> |
    <a href="../logout.php">Déconnexion</a>
    </div>
  </body>
</html>

