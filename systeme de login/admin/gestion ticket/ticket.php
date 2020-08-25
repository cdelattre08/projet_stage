<html>
<head>
<link rel="stylesheet" href="../../../style/affiche_ticket.css" />
<meta charset="utf-8" />
</head>
</html>
<a href = "gestion_ticket.php">Retour sur espace Ticket</a><br>
<?php

    session_start();


    $mysqli = new mysqli('127.0.0.1', 'rooot', 'rooot', 'registration');
		$mysqli->set_charset("utf8");
    $requete = 'SELECT * FROM ticket ORDER BY id_ticket';

    ?>
   
    <table>
      <caption>Informations ticket(s)/utilisateur(s)</caption>   
        <thead>  
          <tr> 
            <th>N°Ticket</th>
            <th>N°Utilisateur</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Cycle</th>
            <th>Problème</th>
            <th>Priorité</th>
            <th>Date d'échéance</th>
            <th>Commentaire</th>
          </tr> 

          
        </thead> 
    </table>
    <?php
		$resultat = $mysqli->query($requete);
        while ($ligne = $resultat->fetch_assoc()) 
        {
            ?>
              <table>
                   
                <tbody>
                  <tr> 
                    <td> <?php echo "#",$ligne['id_ticket'] ?></td>
                    <td> <?php echo $ligne['id_users'] ?></td>
                    <td> <?php echo $ligne['username'] ?></td>
                    <td> <?php echo $ligne['name'] ?></td>
                    <td> <?php echo $ligne['type'] ?></td>
                    <td> <?php echo $ligne['cycle'] ?></td>             
                    <td> <?php echo $ligne['probleme'] ?></td>
                    <td> <?php echo $ligne['priorite'] ?></td>
                    <td> <?php echo $ligne['date_echeance'] ?></td>
                    <td> <?php echo $ligne['commentaire'] ?></td>
                    
           
              <br>
             
            <?php
		    }
    $mysqli->close();
  
	
    ?>
     
<p></p><br>

