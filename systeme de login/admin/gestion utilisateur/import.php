<?php
if (!empty($_FILES['file'])) 
{
    try 
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=registration;charset=utf8', 'rooot', 'rooot', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET users \'UTF8\'']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (Exception $e) 
    {
        die('Erreur : '.$e->getMessage());
    }
    //UPLOAD DU FICHIER CSV, vérification et insertion en BASE
    if (isset($_FILES["file"]["type"]) != "") 
    {
        die("Ce n'est pas un fichier de type .csv");
    } 
    elseif (is_uploaded_file($_FILES['file']['tmp_name'])) 
    {
        $req = $pdo->prepare("INSERT INTO users (`id_users`, `username`, `name`, `email`, `type`, `password`) VALUES (?, ?, ?, ?, ?, ?");
        $file = new SplFileObject($_FILES['file']['tmp_name']);
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
        foreach ($file as $row) 
        {
            $req->execute([$row[0], $row[1], $row[2], $row[3], $row[4], $row[5]]);
        }
        $req->closeCursor();
    } 
    else 
    {
        echo 'epic fail<br />';
    }
}
?>

<form enctype="multipart/form-data" action="" method="POST">
    <div class="form-group">
        <input name="file" type="file" />
        <p><input type="submit" value="Envoyez le fichier"/></p>
    </div>
</form>