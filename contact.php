<?php
include("header.php");
?>
<!-- ***************************** Formulaire de contact **************************************************** -->
<form action="traitement.php" method="POST">
                <fieldset>
                   <legend><b>Formulaire de contact</b></legend>
                   <table>
                       <tr>
                           <td>Nom:</td>
                           <td><input type="text" name="nom" size="40" maxlength="30"/></td>
                       </tr>
                       <tr>
                        <td>Prenom:</td>
                        <td><input type="text" name="prenom" size="40" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>Adresse:</td>
                        <td><input type="text" name="adresse" size="40" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>Mail:</td>
                        <td><input type="text" name="email" size="40" maxlength="30"/></td>
                    </tr>

                    <tr>
                        <td><input type="reset" value="Effacer"></td> 
                        <td><input type="submit" value="Envoyer"></td>
                    </tr>
                   </table>
                  

                   </fieldset>
               </form>

<?php
include("footer.php")
?>