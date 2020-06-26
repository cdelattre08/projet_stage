<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8">
    </head>
</html>
<?php

// Initialiser la session
session_start();

setcookie('username','',time()-3600);
setcookie('password','',time()-3600);
// Détruire la session.
session_destroy();

  // Redirection vers la page de connexion
  header("Location: login.php");

?>