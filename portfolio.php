<?php
include("header.php");
$servername='localhost';
$username='root';
$password='';

try{
$idcom=new PDO("mysql:host=$servername;dbname=portfolio", $username, $password);
$idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo "Error connexion". $e->getMessage();
}
 // Sécuriser la page en creant une session qui ridirige vers la de connexion
 session_start();
 if(!$_SESSION['mdp']){
    header('location: connexion.admin.php');
 }


$requete = $idcom->query('SELECT * FROM publication ORDER BY id DESC' );
while($user = $requete->fetch()){
    
   echo "<section id=\"portfolio\">
  
   <div>

    
   <div class=\"projet\">

    <div class=\"cadre\">

         <div class=\"img-container\">
             <a href=".$user['url_projet']." target=\"_blank\">
                 <img src='./projet/images/".$user['monfichier']."' alt=\"projet-1\">
             </a>
         </div>
    </div>

     <div class=\"legende\">
         <h4><img src=\"./media/html.png\" alt=\"html\"> <img src=\"./media/css.png\" alt=\"css\">" . $user['titre'] . "</h4>
         <p>". $user['decision']."</p>
         <a href=". $user['lien_github']." target=\"_blank\"><h5><i class=\"fa fa fa-github\"></i> > Code source du projet</h5></a>
     </div>

  </div> 
 </div>
</section>";
    // echo $user['titre'].'</br>'. $user['monfichier'].'</br>'. $user['decision'].'</br>'. $user['url_projet'].'</br>'. $user['lien_github'].'</br>'. $user['id']; 
    
    
}


?>


<!--<section id="portfolio">
<h3>Portfolio</h3>
<div> 
      <div class="projet"> 
       <div class="cadre">
            <div class="img-container">
                <a href="./projet/index.html" target="_blank">
                    <img src="./projet/images/acropro.png" alt="projet-1">
                </a>
            </div>
        </div>
        <div class="legende">
            <h4><img src="./media/html.png" alt="html"> <img src="./media/css.png" alt="css">Site de tourismes</h4>
            <p>J'ai réalisé cette page de tourisme  au compte d'un projet qui nous avait été demander par notre formateur,mon choix etait tombé sur la cité d'athenes dont j'ai eu l'occasion de visiter.</p>
            <a href="https://github.com/Minkailou/Commit" target="_blank"><h5><i class="fa fa fa-github"></i> > Code source du projet</h5></a>
        </div>
    </div> 
     
    <div class="projet">
        <div class="cadre">
            <div class="img-container">
                <a href="./media/portfolio/P.2/index.html" target="_blank">
                    <img src="./media/Sans .jpg" alt="projet-2">
                </a>
            </div>
        </div>
        <div class="legende">
            <h4><img src="./media/bootstrap.png" alt="bootstrap"> <img src="./media/html.png" alt="html">Site de photographie</h4>
            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte</p>
            <a href="http://www.github.com" target="_blank"><h5><i class="fa fa fa-github"></i> > Code source du projet</h5></a>
        </div>
    </div>
     
    <div class="projet">
        <div class="cadre">
            <div class="img-container">
                <a href="./media/portfolio/P.3/index.html" target="_blank">
                    <img src="./media/sexio.jpg" alt="projet-3">
                </a>
            </div>
        </div>
        <div class="legende">
            <h4><img src="./media/sass.png" alt="sass"> <img src="./media/js.png" alt="js">Site culturel</h4>
            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte</p>
            <a href="http://www.github.com" target="_blank"><h5><i class="fa fa fa-github"></i> > Code source du projet</h5></a>
        </div>
    </div> -->

    


<?php
include("footer.php")
?>