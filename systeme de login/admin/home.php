<?php require('../config.php'); ?>
<html>
    <head>
        <title>Espace Administrateur</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../style/login.css" />
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
    <a href="gestion utilisateur/gestion_utilisateur.php">Gestions utilisateur</a> | 
    <a href="gestion ticket/gestion_ticket.php">Gestions ticket</a> | 
    <a href="../logout.php">Déconnexion</a>
    </div>

    <div class="image">
      <img
        src="../../image/logojesuite.png" 
      />
    </div>
    
</body>
</html>

