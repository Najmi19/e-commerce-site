<?php
    require 'database.php';
    if(!empty($_GET['Id_article']))
    {
        $id = checkInput($_GET['Id_article']);
    }
    $db = Database::connect();
    $statement = $db->query('SELECT * 
                        FROM articles a LEFT JOIN typesdarticle ta ON a.categorie like ta.type_article WHERE a.categorie like \'sac\'
                        ORDER BY a.Id_article DESC');
    
    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>BT Sac</title>
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <marquee><h1>la beauté "Sac"</h1></marquee>
        </header> 

        <nav>
            <ul class="menu">
                <li><a href="index.php"> Acceuil </a></li>
                <li><a href=""> Article </a>
                    <ul>
                        <li><a href="Robes.php"> Robe </a></li>
                        <li><a href="Vestes.php"> Veste </a></li>
                    </ul>
                    <li><a href="#"> Connexion </a></li>
                    <ul>
                    <?php include 'Deconnexion.php'?>
                    </ul>      
                    <li><a href="panier.php">Panier</a></li>
            </ul><br>
        </nav>
        
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Description</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($item = $statement->fetch()){
                        echo '<tr>';
                        echo '<td>'. $item['Id_article'] .'</td>';
                        echo '<td>'. $item['nom_article'] .'</td>';
                        echo '<td>'. $item['categorie'] .'</td>';
                        echo '<td>'. $item['description'] .'</td>';
                        echo '<td>'. number_format((float)$item['prix'],2,'.','') . ' €' .'</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                ?>
            </tbody>
        </table>

        <footer>
            <p>France</p>
        </footer>
        
    </body>
</html>