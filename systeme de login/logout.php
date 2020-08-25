<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8">
    </head>
</html>
<?php

// Initialiser la session
session_start();


// Détruire la session.
session_destroy();

  unset($_SESSION['username'], $_SESSION['password']);
  
  // Redirection vers la page de connexion
  header("Location: login.php");
    
?>       