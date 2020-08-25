<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer TOUS les tickets</title>
    
</head>
<body>
<form action="../captcha/validate_ticket.php" method="post">
    <table>
    <tr>         
      <td>
        <label>Entrer le numéro du captcha</label>
        <input name="captcha" type="text">
        <img src="../captcha/captcha.php" style="vertical-align: middle;"/>
      </td>
    </tr>
    <tr>
      <td><input name="submit" type="submit" value="Submit" onclick="return confirm('Voulez vous vraiment supprimer ?') "></td>
    </tr>
    </table>
    </form>

    <a href="gestion_ticket.php">Retour sur espace Ticket</a><br>
    
</body>
</html>
