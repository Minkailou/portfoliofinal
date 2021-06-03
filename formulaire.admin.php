<!DOCTYPE html>
<html>
<head>
    <title>Formulaire admin</title>
    <meta charset="utf-8">
</head>
<body>
 <form action="traitement2.php" method="POST">
 <fieldset>
        <legend><b>Formulaire de projet</b></legend>
        <table>
          <tr>
            <td><b>Nom_projet:</b></td><td><input type="text" name="nom" size="40" maxlength="30"><td>
          </tr>
          <tr>
            <td><b>Photos:</b></td><td><input type="file" name="monfichier" accept="image/gif, image/jpeg, image/png"size="40"/><td>
          </tr>
          <tr>
            <td><b>Url:</b></td><td><input type="text" name="lien" size="40" maxlength="30"><td>
          </tr>
          <tr>
            <td><b>Github:</b></td><td><input type="text" name="github" size="40" maxlength="30"><td>
          </tr>

          <tr>
            <td><input type="submit" value="envoyer"><td>
          </tr>
        </table>
 </fieldset>
 </form>
      
</body>
</html>