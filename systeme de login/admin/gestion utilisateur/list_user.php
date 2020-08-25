<html>
<head>
<link rel="stylesheet" href="../../../style/list_user.css" />
<meta charset="utf-8" />
<title>Liste des utilisateurs</title>
</head>
</html>


	<?php
	     
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=registration;charset=utf8','root','');
	 
	$select = $bdd->query('SELECT username,name,email FROM users ORDER BY id_users DESC');
	if(isset($_GET['q']) AND !empty($_GET['q'])) {
	   $q = htmlspecialchars($_GET['q']);
	   $select = $bdd->query('SELECT username,name,email FROM users WHERE username LIKE "%'.$q.'%" ORDER BY id_users DESC');
	   if($select->rowCount() == 0) {
	      $select = $bdd->query('SELECT username,name,email FROM users WHERE CONCAT(username, name) LIKE "%'.$q.'%" ORDER BY id_users DESC');
	   }    
	}        
    ?>
    <a href = "gestion_utilisateur.php">Retour sur espace admin</a><br>
	<form method="GET"><br>
	   <input type="search" name="q" placeholder="Recherche..." />
	   <input type="submit" value="Valider" />
    </form>
    <br>
    <caption>Informations utilisateur</caption>
	<?php if($select->rowCount() > 0) { ?>
	   <ul>
       <table>   
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse E-mail</th>
            </tr>
        </table>
       <?php while($a = $select->fetch()) { ?>
        
        <table>
            <tr>
                <td> <?= $a['username'] ?> </td>
                <td> <?= $a['name'] ?> </td>
                <td> <?= $a['email'] ?> </td>
            <tr>
        </table>
   
   
          
	   <?php } ?>
	   </ul>
	<?php } else { ?>
	L'utilisateur ( <?= $q ?> ) n'existe pas. 
    <?php } ?> <br>

    
