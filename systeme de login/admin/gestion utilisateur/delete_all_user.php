<?php require('../../config.php'); ?>
<html>
  <head>    
    <title>Supprimer tous les utilisateurs</title>
  </head>
  <body>
    <form action="../captcha/validate.php" method="post">
    <table>
    <tr>         
      <td>
        <label>Entrer le texte dans l'image</label>
        <input name="captcha" type="text">
        <img src="../captcha/captcha.php" style="vertical-align: middle;"/>
      </td>
    </tr>
    <tr>
      <td><input name="submit" type="submit" value="Submit"></td>
    </tr>
    </table>
    </form>
  </body>
</html>




