<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprime un Ticket</title>
    <link rel="stylesheet" href="../../../style/delete.css" />
    <a href="gestion_ticket.php">Retour sur espace Ticket</a><br>
</head>

<body>

<?php


?>
<form class="box" action="" method="post">

  <h1 class="box-logo box-title">
    <p>Bêtapro</p>
  </h1>
    <h1 class="box-title">Fermer un ticket</h1>
  <input type="text" class="box-input" name="id_ticket" 
  placeholder="Numéro Ticket" required/>

  <input type="text" class="box-input" name="name" 
  placeholder="Nom" required/>

  <input type="text" class="box-input" name="username" 
  placeholder="Prénom" required/>

  
    <input type="submit" name="submit" value="Supprimer" class="box-button" />
</form>



</body>

</html>