<?php require('config.php'); ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Inscrivez-vous</title>
  <link rel="stylesheet" href="style.css" />
  <meta charset="utf-8">
  </head>
  <body>
<?php


  session_start();
  if (isset($_REQUEST['username'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'])){

  // récupérer le prénom de l'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
    
  // récupérer le nom de l'utilisateur
  $name = stripslashes($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);

  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);

  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  
  if (empty($username)  || empty($name) || empty($email) || empty($password))
  {
    echo "<div class='sucess'>
    <h3>Vous n'avez pas remplis tous les champs.</h3>
    <p></p>
    </div>";
    header("refresh:5;url=registration.php");
    exit('');
  }

  $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
  if(mysqli_num_rows($select)) {
    echo "<div class='sucess'>
    <h3>Cet utilisateur existe déja.</h3>
    </div>";
    header("refresh:5;url=registration.php");
    exit('');
}

  $select2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
  if(mysqli_num_rows($select2)) {
    echo "<div class='sucess'>
    <h3>Cette adresse mail existe déja.</h3>
    </div>";
    header("refresh:5;url=registration.php");
    exit('');
} 
  $query = "INSERT into `users` (username, name, email, type, password)
        VALUES ('$username', '$name', '$email', 'user', '".hash('sha256', $password)."')";
  $res = mysqli_query($conn, $query);
  
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<div class="Menu"> <!--Contient le menu qui apparait en haut de la page.-->
            <h1></h1>
            <nav> <!--Contient le menus-->
                <ul> 
                    
                    <li><a href="../systeme de login/index.php">Connexion</a></li> <!--Appartient au menus-->
                    <li><a href="../page site/Apropos.html">A propos de nous</a></li> <!--Appartient au menu-->
                    <li><a href="../page site/index.html">Accueil</a></li> <!--Appartient au menu-->
                </ul>
            </nav>
</div>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">
    <p>S'inscrire sur bêtapro</p>
  </h1>
    
  <input type="text" class="box-input" name="username" 
  placeholder="Prénom" required />

  <input type="text" class="box-input" name="name" 
  placeholder="Nom" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? 
  <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>