
<html>
    <head>
        <title>Espace client</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" />
    </head>
<body>
<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
  
?>    

    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre espace utilisateur.</p>
    <a href="logout.php">Déconnexion</a>
    </div>
	
<?php

    if(!empty($_POST))
    {
        $u = new user();
        $valid = true;
        if(isset($_POST[("Valider")]))
        {
            $ecole = $_POST['Ecole'];
            $college = $_POST['College'];
            $lp = $_POST['LP'];
            $legt = $_POST['LEGT'];
            $bts = $_POST['BTS'];
            $ufa = $_POST['UFA'];
            $cfc = $_POST['CFC'];
            $personnel = $_POST['Personnel'];

            if(!empty($ecole))
            {
                $valid = false;
                echo "Ce champ ne peut pas être vide";
            }

        }
    }
  
    
?>
    <p>
    <div>
      <select class="box-input" name="Cycle" id="Cycle" >
        <option value="" disabled selected>Cycle</option>
        <option value="Ecole">Ecole</option>
        <option value="College">College</option>
        <option value="LEGT">LEGT</option>
        <option value="LP">LP</option>
        <option value="BTS">BTS</option>
        <option value="UFA">UFA</option>
        <option value="CFC">CFC</option>
        <option value="Personnel administratif">Personnel administratif</option>
      </select>
    </div>
    <select class="box-input" name="Problèmes rencontrés" id="Problèmes rencontrés" >
        <option value="Problèmes rencontrés" disabled selected>Problèmes rencontrés</option>
        <option value="Réseau">Réseau</option>
        <option value="Vol">Vol</option>
        <option value="Vandalisme">Vandalisme</option>
        <option value="Logiciel">Logiciel</option>
        <option value="Installation">Installation</option>

      
      </select>

    <div>
      <select class="box-input" name="Niveau de Priorité" id="Niveau de Priorité" >
        <option value="" disabled selected>Niveau de Priorité</option>
        <option value="Faible">Faible</option>
        <option value="Moyen">Moyen</option>
        <option value="Urgent">Urgent</option>
    </div>

    </p>



</body>
</html>
<link rel="stylesheet" href="text.css">
	<meta charset='utf-8'/>   
	
