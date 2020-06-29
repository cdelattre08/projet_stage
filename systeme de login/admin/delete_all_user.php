

<!DOCTYPE html>
<html>
  <head>
    <title>Supprime un utilisateur</title>
    <link rel="stylesheet" href="../style.css" />
    <meta charset="utf-8">
  </head>
<body>
<?php
     
      $host  = '127.0.0.1';      // Votre identifiant
      $user  = 'rooot';       // Votre identifant 
      $mdp  = 'rooot';       // Votre mot de passe
      $base  = 'registration';       // Nom de botre base
      $vidage   = 'users';  // Nom de la table que tu veux vider
       
    // ON SE CONNECTE ET ON SELECTIONNE LA BASE
        mysql_connect($host, $user, $mdp)
        or die("Impossible de se connecter au serveur ".$host);
      mysql_select_db($base)
        or die("Impossible de connecter à la base ".$base);

    function vider_table($vidage){
      $sql  = "TRUNCATE TABLE ".$vidage; 
      mysql_query($sql);
      
      if(mysql_query($sql))
        // SUCCES
        echo "La table ".$vidage." a été vidée !"; 
      else
        // ECHEC
        echo "La table ".$tablevidage_a_vider." n'a pas été vidée de son contenu.";
    }
    // ON VIDE $vidage
    vider_table($vidage);
?>