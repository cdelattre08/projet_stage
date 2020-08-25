<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
  </head>
  <body>
  <?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=registration;charset=utf8','root','');
session_start();
    if (isset($_POST['recup_submit'], $_POST['recup_mail']))
    {
        if(!empty($_POST['recup_mail']))
        {
            $recup_mail = htmlspecialchars($_POST['recup_mail']);
            if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL))
            {
                $mailexist = $bdd->prepare('SELECT id, namz FROM users WHERE mail = ?');
                $mailexist->execute(array($recup_mail));
                $mailexist_count  = $mailexist->rowCount();
                if ($mailexist_count == 1)
                {
                    $name = $mailexist->fetch();
                    $name = $name['name'];
                    $_SESSION['recup_mail'] = $recup_mail;
                    $recup_code = ";";
                    for($i = 0; $i < 8; $i++)
                    {
                        $recup_code .= mt_rand(0,9);
                    }
                     $_SESSION['recup_code'] = $recup_code;

                     $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ?');
                     $mail_recup_exist->execute(array($recup_mail));
                     $mail_recup_exist = $mail_recup_exist->rowCount();

                     if($mail_recup_exist == 1)
                     {
                        $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                        $recup_insert->execute(array($recup_code, $recup_mail));
                     }

                     else
                     {
                        $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail, code) VALUES (?, ?');
                        $recup_insert->execute(array($recup_mail, $recup_code));
                     }
                     $header="MIME-Version: 1.0\r\n";
         $header.='From:"DELATTRE Cyril"cyril.delattre02@gmail.com'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Votresite</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>'.$name.'</b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
         mail($recup_mail, "Récupération de mot de passe - Votresite", $message, $header);
                     
                }
                else
                {
                    $error =  "Cette adresse mail n'est pas enregistrée";
                }
            }
            else
            {
                $error = "Adresse mail invalide";
            }
        }
        else
        {
            $error = "Veuillez entrer votre adresse mail";
        }
    }
?>
    <h2>Récupération de Mot de passe</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Votre adresse mail" name="recup_mail" required>
        <button type="submit" name="recup_submit" value="Valider">Obtenir un nouveau mot de passe</button>
      </div>
    </form>
    <a href="login.php">Retour</a> 
  </body>
</html>

    
    
      
        
    