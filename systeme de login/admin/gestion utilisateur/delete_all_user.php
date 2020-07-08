<?php require('../../config.php'); ?>
<html>
  <head>  
    <meta charset='utf-8'>  
    <title>Supprimer tous les utilisateurs</title>
  </head>
  <body>
    <form action="../captcha/validate.php" method="post">
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
  </body>
</html>




