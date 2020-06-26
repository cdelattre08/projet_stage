<?php require('../config.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Supprime un utilisateur</title>
    <link rel="stylesheet" href="../style.css" />
    <meta charset="utf-8">
  </head>
<body>
<?php


if (isset($_REQUEST['username'], $_REQUEST['name'])){

  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer le prénom de l'utilisateur
  $name = stripslashes($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);
  
  if (empty($username)  || empty($name))
  {
    echo "<div class='sucess'>
    <h3>Vous n'avez pas remplis tous les champs.</h3>
    <p></p>
    </div>";
    header("refresh:5;url=delete_user.php");
    exit('');
  }

  $select3 = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
  if(mysqli_num_rows($select3)) {
    echo "<div class='sucess'>
    <h3></h3>
    </div>";
    header("refresh:5;url=delete_user.php");
    
}else{
  echo "<div class='sucess'>
    <h3>Le Prénom de cette utilisateur n'existe pas.</h3>
    </div>";
    header("refresh:5;url=delete_user.php");
  exit('');
}

  $select4 = mysqli_query($conn, "SELECT * FROM users WHERE name = '".$_POST['name']."'");
  if(mysqli_num_rows($select4)) {
    echo "<div class='sucess'>
    <h3>L'utilisateur à bien été supprimer</h3>
    </div>";
    
    
}else{
  echo "<div class='sucess'>
    <h3>Le nom de cette utilisateur n'existe pas.</h3>
    </div>";
    header("refresh:5;url=delete_user.php");
  exit('');
}

  
    


    // suppression d'un utilisateur en base de donnée
    $query = "DELETE FROM `users` 
          WHERE username='$username' AND name='$name'";
    $res = mysqli_query($conn, $query); 

    

    if($res){
      
       echo "<div class='sucess'>
             
             </div>";
             header("refresh:5;url=home.php");
    }
    
}else{
?>
<form class="box" action="" method="post">
<h1 class="box-title"><a href = "home.php">Retour sur espace administrateur</a><br></h1>
  <h1 class="box-logo box-title">
    <p>Bêtapro</p>
  </h1>
    <h1 class="box-title">Supprimer un utilisateur</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Prénom" required/>

  <input type="text" class="box-input" name="name" 
  placeholder="Nom" required/>
  
    <input type="submit" name="submit" value="Supprimé" class="box-button" />
</form>
<?php } ?>
</body>
</html>