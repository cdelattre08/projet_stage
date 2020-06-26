
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
    

    <?php
	if(isset($_POST['mailform'])) {
	   if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])) {
	      $header="MIME-Version: 1.0\r\n";
	      $header.='From:"nom_expediteur"marcopolow60@gmail.com'."\n";
	      $header.='Content-Type:text/html; charset="uft-8"'."\n";
	      $header.='Content-Transfer-Encoding: 8bit';
	      $message='
	      <html>
	         <body>
	            <div align="center">
	               
	               <br />
	               <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
	               <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
	               <br />
	               '.nl2br($_POST['message']).'
	               <br />
	               
	            </div>
	         </body>
	      </html>
        ';
        ini_set("SMTP", "smtp.google.com");
	      mail("mathispade@gmail.com", "Sujet du message", $message, $header);
	      $msg="Votre message a bien été envoyé !";
	   } else {
	      $msg="Tous les champs doivent être complétés !";
	   }
	}
	?>
	
	  
	      <h2>Formulaire de contact !</h2>
	      <form method="POST" action="">
	         <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
	         <input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
	         <textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
	         <input type="submit" value="Envoyer !" name="mailform"/>
	      </form>
	      <?php if(isset($msg)) {
	         echo $msg;
	      }
	      ?>
	
    
</body>
</html>
<link rel="stylesheet" href="text.css">
    <meta charset='utf-8'/>  