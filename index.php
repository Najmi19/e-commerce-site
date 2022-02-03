<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>Veste MNL</title>
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
    </head>
    <body>
	<?php
		header('Location:html/index.php');
	?>
        <header>
            <h1>Veste MNL</h1>
           
        </header> 

        <nav>
            <ul class="menu">
                <li><a href=""> Article </a>
                    <ul>
                        <li><a href="html/Homme.php"> Homme </a></li>
                        <li><a href="html/Femme.php"> Femme </a></li>
                        <li><a href="html/Enfant.php"> Enfant </a></li>
                    </ul>
                </li>
                <li><a href="#"> Connexion </a>
                    <ul>
                        <li><a href="html/admin.php"> Administrateur </a></li>
                        <li><a href="html/Inscription.php"> Inscription </a></li>
                    </ul>       
                </li>
                <li><a href="Qui sommes-nous.php"> Qui sommes-nous ? </a>
                </li>
                <li><a href="Panier.php">Panier</a>
                </li>
            </ul>
        </nav><br><br>
        <?php
                session_start();
                if($_SESSION['login'] !== ""){
                    $login = $_SESSION['login'];
                    // afficher un message
                    echo "Bonjour $login, vous êtes connecté";
                }
        ?>
        <img src="../img/famille.png" 
        height="300px"
        width="500px"
        alt="Bienvenue"/>
       

        </section><br><br>


        <footer>
            <p>France</p>
        </footer>
        
    </body>
</html>