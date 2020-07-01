<?php
// Informations d'identification
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'rooot');
define('DB_PASSWORD', 'rooot');
define('DB_NAME', 'registration');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect("127.0.0.1", "rooot", "rooot", "registration");
 
// Vérifier la connexion
if($conn == false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>    

   