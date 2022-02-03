<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>BT A propos</title>
        <link rel="stylesheet" href="../css/Style.css">
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <marquee><h1>La beauté</h1></marquee>
            <ul class="menu">
            <li><a href="../index.php"> Accueil </a></li>
            <li><a href="#"> Connexion </a>
                    <ul>
                        <?php 
                            session_start();
                            include 'Deconnexion.php';
                        ?>
                    </ul>  
            </li>       
                </ul>   

        </header> <br><br><br><br>
    
        <center>  
            <b >Chez La beauté, notre mission est de vous offrir des MARQUES DE QUALITE qui prouvent que vous êtes les plus importants pour nous. Nos produits sont non seulement au top de la tendance, mais ils sont aussi de la meilleure qualité.

                Nous avons démarré en tant que petite entreprise à Paris,France, en 2005. Nous n’avons cessé guère de fournir à nos clients des produits qui les rendent heureux, à des prix qui les rendent encore plus heureux.

                Nos clients restent au top de nos priorités et nous travaillerons durement pour développer avec eux une relation sur le long terme, basée sur la confiance et l’authenticité. 
            </b>
        </center>

        <footer>
            <p>France</p>
        </footer>

    </body>
</html>