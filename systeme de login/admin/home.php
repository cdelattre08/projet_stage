<?php require('../config.php'); ?>
<html>
    <head>
        <title>Espace Administrateur</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style.css" />
    </head>
</html>
<body>
<?php

  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: ../login.php");
    exit(); 
  }
  
?>

  
 
  
  
    <div class="sucess">
    <h1>Bienvenue <?php echo "".strip_tags($_SESSION['username']); ?> !</h1>
    <p>C'est votre espace administrateur.</p>
    <a href="gestion_utilisateur.php">Gestions utilisateur</a> | 
    <a href="list_user.php">Liste complète d'utilisateur</a> |
    <a href="../logout.php">Déconnexion</a>
    </div>
    
</body>
</html>

