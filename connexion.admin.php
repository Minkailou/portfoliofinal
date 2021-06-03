<?php
session_start(); //***definir la session******* */
//****************** Verifier l'existence de mes variables***************************/
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']); // Pour eviter d'inserer du code html brut dans les chams
        $mdp_saisi = htmlspecialchars($_POST['mdp']);
//************Vérifier  si le pseudo saisi correspond au pseudo par default********************************/
        if($pseudo_saisi == $pseudo_par_defaut && $mdp_saisi == $mdp_par_defaut ){
//******************* Déclarer une session qui permet d'echanger des information sur toutes les pages****************************** */
          $_SESSION['mdp'] = $mdp_saisi;  
          header('location: article.php');//*******Rediriger la session vers la page d'administration************* */          
        }else{
            echo"<script type=\"text/javascript\">
            alert('Veuillez saisir un pseudo ou un mot de passe correct')</script>";
        }
    }else{
        echo "<script type=\"text/javascript\">
        alert('Veuillez complétez tous les champs')</script>"; 
    }

}
?>


<!DOCTYPE html>
<html>
<head>
     <title>Espace de connexion admin</title>
     <meta charset="utf-8">
     <link href="style.admin.css" rel="stylesheet">
     <link rel="icon" href="./logo/sal3.jpg">
     <link href="style.admin.css" rel="stylesheet">
</head>
<body>

<!-- *************************** Espace administrateur ****************************** -->
    <h1>Connexion admin</h1>
     <form class="forma" action="" method="POST">
     <fieldset class="forma2">
         <div class="for_global">
             <legend><b>Espace administrateur</b></legend>
             <table>
             <tr><td><b>Pseudo:</b></td><td><input type="text" name="pseudo" size="40" maxlength="30" autocomplete="off"></td></tr>
             <tr><td><b>Password:</b></td><td><input type="password" name="mdp" size="40" maxlength="30"></td></tr>
             <tr>
                <td><input type="submit" name="valider"></td>
             </tr>
             </table>
             <p><marquee>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras purus tellus, tincidunt id felis a, lacinia sodales dolor. Pellentesque dignissim vitae lacus vitae placerat. Vestibulum tristique justo at feugiat tristique. Vivamus suscipit viverra sagittis. Nunc nec luctus orci. Fusce sit</marquee></p>
     </fieldset>
          </div>
     
     
     </form>
</body>
</html>