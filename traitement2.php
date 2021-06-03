<?php
    include('projet.php');
       

        if(isset($_POST['nom']) && isset($_POST['monfichier']) && isset($_POST['lien']) && isset($_POST['github']))
        {
            echo "variable existe";

            $requete="INSERT INTO  projet
            VALUES (DEFAULT, $nom, $monfichier, $lien, $github)";
            
            $idcom->exec($requete);
            
       }
      
       

      ?>
