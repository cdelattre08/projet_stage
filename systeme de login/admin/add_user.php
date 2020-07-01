<?php require('../config.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ajoute un utilisateur</title>
    <link rel="stylesheet" href="../style.css" />
    <meta charset="utf-8">
  </head>
<body>
<?php


if (isset($_REQUEST['username'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){

  $username = stripslashes($_REQUEST['username']);
  
  $username = mysqli_real_escape_string($conn, $username);
  
  $name = stripslashes($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);

  $email = stripslashes($_REQUEST['email']);
 
  $email = mysqli_real_escape_string($conn, $email);

  $password = stripslashes($_REQUEST['password']);
  
  $password = mysqli_real_escape_string($conn, $password);

  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);

  $mail = $_POST['email']."@la-providence.net";


  if (empty($username)  || empty($name) || empty($email) || empty($type) || empty($password))
  {
    echo "<div class='sucess'>
    <h3>Vous n'avez pas remplis tous les champs.</h3>
    <p></p>
    </div>";
    header("refresh:5;url=add_user.php");
    exit('');
  }
  $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
  if(mysqli_num_rows($select))
  {
    echo "<div class='sucess'>
    <h3>Cet utilisateur existe déja.</h3>
   
    </div>";
    header("refresh:5;url=add_user.php");
    exit('');
  }

  $select2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
  if(mysqli_num_rows($select2)) 
  {
    echo "<div class='sucess'>
    <h3>Cette adresse mail existe déja.</h3>
    </div>";
    header("refresh:5;url=add_user.php");
    exit('');
  } 

  if($mail)
  {
    echo "<div class='sucess'>
    <h3>Le format de l'adresse mail est valide.</h3>
    </div>"; 
  }
  else
  {
    echo "<div class='sucess'>
    <h3>Le format de l'adresse mail n'est pas valide.</h3>
    </div>";
    header("refresh:5;url=add_user.php");
    exit('');
  }

    $query = "INSERT into `users` (username, name, email, type, password)
          VALUES ('$username', '$name', '$email', '$type', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);

    // message de succès/erreur, de la suppresion de l'utilisateur

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créé avec succés.</h3>
       </div>";
       header("refresh:5;url=home.php");
    }
    
      
      
}else{
?>

<!-- formulaire de d'ajout -->



<form class="box" action="" method="post">
  <h1 class="box-title"><a href = "home.php">Retour sur espace administrateur</a><br></h1>
  <h1 class="box-logo box-title">
    <p>Bêtapro</p>
  </h1>
    <h1 class="box-title">Ajouter un utilisateur</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Prénom" required />

  <input type="text" class="box-input" name="name" 
  placeholder="Nom" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Administrateur</option>
        <option value="professeur">Professeur</option>
        <option value="professeur">Personnel</option>
        <option value="eleve">Elève</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="Ajouter" class="box-button" />
   
</form>
<?php } ?>
</body>
</html>