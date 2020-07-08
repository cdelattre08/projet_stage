<html>
<head>
<link rel="stylesheet" href="../../../style/list_user.css" />
<meta charset="utf-8" />
</head>
</html>


<?php
		$mysqli = new mysqli('127.0.0.1', 'rooot', 'rooot', 'registration');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT * FROM ticket';
		$resultat = $mysqli->query($requete);
		$ligne = $resultat->fetch_assoc();
	
		?>
<p></p><br>
<a href = "home.php">Retour sur espace administrateur</a><br>
<table>
            <caption>Informations utilisateur</caption>
            <thead>
                <tr>
                    <th>N°Ticket</th>
                   <!-- <th>N°Utilisateur</th> -->
                   <th>Prénom</th>
                   <th>Nom</th>
                    <th>Type</th>
                    <th>Cycle</th>
                    <th>Probleme</th>
                    <th>Priorite</th>
                    <th>Date d'échéance</th>
                    <th>Commentaire</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td> <?= $ligne['id_ticket'] ?> </td>
                    <!--<td> <?= $ligne['id_users'] ?> </td> -->
                    <td> <?= $ligne['type'] ?> </td>
                    <td> <?= $ligne['username'] ?> </td>
                    <td> <?= $ligne['name'] ?> </td>
                    <td> <?= $ligne['cycle'] ?> </td>
                    <td> <?= $ligne['probleme'] ?> </td>
                    <td> <?= $ligne['priorite'] ?> </td>
                    <td> <?= $ligne['date_echeance'] ?> </td>
                    <td> <?= $ligne['commentaire'] ?> </td>
                <tr>
        </table>
    
