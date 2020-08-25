<!DOCTYPE html>
<html>

<head>
  <title>Importation</title>
</head>

<body>
  

    <form enctype="multipart/form-data" action="import.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label">Choisir un fichier CSV</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
            <br />
        </div>
    </form>

    <?php
      // Connect to database
      include("../../config.php");

            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID users</th>
                    <th>Username</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tbody>
                    <tr>
                        <td> <?php  echo $row['id_users']; ?> </td>
                        <td> <?php  echo $row['username']; ?> </td>
                        <td> <?php  echo $row['name']; ?> </td>
                        <td> <?php  echo $row['email']; ?> </td>
                        <td> <?php  echo $row['password']; ?> </td>
                    </tr>
            <?php } ?>
                </tbody>
        </table>
        <a href = "gestion_utilisateur.php">Retour sur espace Utilisateur</a>
        <?php } ?>
</body>
</html>
