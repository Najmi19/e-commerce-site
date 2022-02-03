<?php 
if((!isset($_SESSION['login'])) or (($_SESSION['login']==""))){
    echo "<li><a href=\"connexion.php\"> Connexion </a></li>";
    echo "<li><a href=\"inscription.php\"> Inscription </a></li>";
}
else 
    echo "<li><a href=\"user.php\"> Informations personnelles </a></li>
    <li><a href=\"index.php?deconnexion=true\"> Déconnexion </a></li>";
?>
