<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php
  // Connect to database
  include("../../config.php");

  if (isset($_POST["import"]))
{
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
      
      $file = fopen($fileName, "r");
      
      while (($column = fgetcsv($file, 10000, ";")) !== FALSE) 
      {
        $sql = "INSERT INTO users (username, name, email, password)
             VALUES ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','"  .hash('sha256', $column[3]) . "')";
        $result = mysqli_query($conn, $sql);
        
        if (($result)) 
        {
            echo "<div class='sucess'>
            <h3>L'importation confirmée.</h3>
            <p></p>
            </div>";
        } else 
        {
            echo "<div class='sucess'>
            <h3>Erreur lors de l'importation.</h3>
            <p></p>
            </div>";
        }
      }
    }
  }
  //Retourner à la page index.php
  
  exit;
?>

</body>
</html>
