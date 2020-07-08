<?php require('config.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
  </head>
<body>

<?php

session_start();

if (isset($_POST['username'])){

  

  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";
      
  $result = mysqli_query($conn,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
            
    $user = mysqli_fetch_assoc($result);

    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      header('location: admin/home.php');      
    }else{
      header('location: index.php');
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
  
}
?>
 <div class="Menu"> <!--Contient le menu qui apparait en haut de la page.-->
            <h1></h1>
            <nav> <!--Contient le menus-->
                <ul> 
                    
                    <li><a href="../systeme de login/login.php">Connexion</a></li> <!--Appartient au menus-->
                    <li><a href="../page site/Apropos.html">A propos de nous</a></li> <!--Appartient au menu-->
                    <li><a href="../page site/index.html">Accueil</a></li> <!--Appartient au menu-->
                </ul>
            </nav>
        </div>
<form class="box" action="" method="post" name="login">
<script>
  onSubmit="return check();"
  onKeyUp="javascript:couleur(this);" 
</script>
<h1 class="box-logo box-title">
<p>Connectez-vous sur bêtapro</p>
</h1>

<input type="text" class="box-input" name="username" placeholder="Prénom">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">

<input type="submit" value="Connexion " name="submit" class="box-button">

</p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>