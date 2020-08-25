<html>     
    <head>
        <meta charset=utf-8>
    </head>
</html>
<?php
  session_start();
  if(isset($_POST["captcha"]) && $_POST["captcha"]!="" && $_SESSION["code"] == $_POST["captcha"])
  {

    

    $status = "<p style='color:#FFFFFF; font-size:20px'>
    <span style='background-color:#46ab4a;'>Votre code captcha est correct.</span></p>"; 
   
    $host  = '127.0.0.1';      // adresse serveur
    $user  = 'rooot';       // Votre identifant 
    $mdp  = 'rooot';       // Votre mot de passe
    $base  = 'registration';       // Nom de botre base
    $table_a_vider   = 'ticket';  // Nom de la table que tu veux vider
     
    // ON SE CONNECTE ET ON SELECTIONNE LA BASE
      
    mysql_connect($host, $user, $mdp)
      or die("Impossible de se connecter au serveur ".$host);
    mysql_select_db($base)
      or die("Impossible de connecter à la base ".$base);
 
    function vider_table($table_a_vider)
    {
      $sql  = "TRUNCATE TABLE ".$table_a_vider; 
      mysql_query($sql);
    
      if(mysql_query($sql))
        // SUCCES
        echo "La table ".$table_a_vider." a été vidée !"; 
      else
        // ECHEC
        echo "La table ".$table_a_vider." n'a pas été vidée de son contenu.";
    }
      // ON VIDE $table_a_vider
      vider_table($table_a_vider);
      header("refresh:5;url=../gestion ticket/gestion_ticket.php");
    }
    else
    {
      $status = "<p style='color:#FFFFFF; font-size:20px'>
      <span style='background-color:#FF0000;'>Le code captcha entré ne correspond pas! Veuillez réessayer.</span></p>";
      header("refresh:5;url=../gestion ticket/delete_all_ticket.php");
    }
    echo $status;
?>