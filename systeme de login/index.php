
<html>
    <head>
        <title>Espace client</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" />
    </head>
<body>
<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
  
?>

    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre espace utilisateur.</p>
    <a href="logout.php">Déconnexion</a>
    </div>
    

</body>
</html>
<link rel="stylesheet" href="text.css">
    <meta charset='utf-8'/>  