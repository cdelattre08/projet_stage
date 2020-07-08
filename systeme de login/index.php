<?php require('config.php'); ?>
<html>
  <head>
    <title>Ajoute un TICKET</title>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
  </head>
<body>
<?php


if (isset($_REQUEST['type'], $_REQUEST['cycle'], $_REQUEST['priorite'], $_REQUEST['probleme'])){

  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);

  $cycle = stripslashes($_REQUEST['cycle']);
  $cycle = mysqli_real_escape_string($conn, $cycle);
  
  $priorite = stripslashes($_REQUEST['priorite']);
  $priorite = mysqli_real_escape_string($conn, $priorite);

  $probleme = stripslashes($_REQUEST['probleme']);
  $probleme = mysqli_real_escape_string($conn, $probleme);

  if (empty($type)  || empty($cycle) || empty($priorite) || empty($probleme))
  {
    
    header("refresh:5;url=add_user.php");
    exit('');
  }

    $query = "INSERT into `ticket` (type, cycle, priorite, probleme)
          VALUES ('$type', '$cycle', '$priorite', '$probleme')";
    $res = mysqli_query($conn, $query);

    // message de succès/erreur, de la création de l'utilisateur

    if($res)
    {
       echo "<div class='sucess'>
             <h3>Le ticket a été crée avec succès.</h3>
       </div>";
       header("refresh:5;url=index.php");
    }
  
}
else
{

?>
    
    
<script>
  onsubmit = "return check();"
  onkeyup = "javascript:couleur(this);"
</script>

<!-- formulaire de d'ajout -->
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">
    <a href="logout.php">Déconnexion</a> 
    
    <p></p>
  </h1>
    <h1 class="box-title">Ajouter un ticket</h1>
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Administrateur</option>
        <option value="Professeur">Professeur</option>
        <option value="Personnel">Personnel</option>
        <option value="Eleve">Elève</option>
      </select>
  </div>
          
  <div>
    <select class="box-input" name="cycle" id="cycle" >
        <option value="" disabled selected>Cycle</option>
        <option value="Ecole">Ecole</option>
        <option value="College">Collège</option>
        <option value="LEGT">LEGT</option>
        <option value="LP">LP</option>
        <option value="BTS">BTS</option>
        <option value="UFA">UFA</option>
        <option value="CFC">CFC</option>
        <option value="Personnel admin">Personnel administratif</option> 
    </select>
  </div>

  <div>
      <select class="box-input" name="priorite" id="priorite" >
        <option value="" disabled selected>priorite</option>
        <option value="Faible">Faible</option>
        <option value="Moyen">Moyen</option>
        <option value="Urgent">urgent</option>
      </select>
  </div>

  <div>
    <select class="box-input" name="probleme" id="probleme" >
        <option value="" disabled selected>probleme</option>
        <option value="Reseau">Réseau</option>
        <option value="Logiciel">Logiciel</option>
        <option value="Installation">Installation</option>
        <option value="Vol">Vol</option>
        <option value="Vandalisme">Vandalisme</option>
    </select>
    <label for="Autres demandes">Autres demandes :</label>
        <TEXTAREA name="nom" rowspan=4 cols=40></TEXTAREA>
  </div>

  <label>Commentaire : </label>
  <TEXTAREA name="nom" rowspan=4 cols=40></TEXTAREA>
  <input type="submit" name="submit" value="Ajouter" class="box-button" />
 

  <?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
  <?php } ?>
   
</form>
<?php } ?>
</body>
</html>