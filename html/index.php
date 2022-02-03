<?php require 'database.php';
    session_start();
    if(isset($_GET['deconnexion']))
    { 
        if($_GET['deconnexion']==true)
        {  
            session_unset();
            header("Location:connexion.php");
        }
    }
    $db = Database::connect();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>BT Accueil</title>
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
        <!-- CSS only -->        
	
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <marquee><h1>La Beauté</h1></marquee>
           
        </header> 

        <nav>
            <ul class="menu">
                <li><a href=""> Article </a>
                    <ul>
                        <?php include 'items0.php';
                            Database::disconnect();
                        ?>
                    </ul>
                </li>
                <li><a href="#"> Connexion </a>
                    <ul>
                        <?php 
                        include 'Deconnexion.php';
                        ?>
                    </ul>       
                </li>
                <li><a href="Qui sommes-nous.php"> Qui sommes-nous ? </a>
                </li>
                <li><a href="user.php#panier">Panier</a>
                </li>
            </ul>
        </nav><br><br>
        <!--php
                session_start();
                if($_SESSION['login'] !== ""){
                    $login = $_SESSION['login'];
                    // afficher un message
                    echo "Bonjour $login, vous êtes connecté";
                }
        -->
        <center>
        <img src="../img/P1.png" 
        height="400px"
        width="700px"
        />
        </center>
        
        
        <footer>
            <p>France</p>
        </footer>
        
    </body>
</html>