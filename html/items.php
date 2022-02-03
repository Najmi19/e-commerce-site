<?php
    require 'database.php';
    if(isset($_GET['item'])){
        $theitem = $_GET['item'];
    }
    else $theitem = "robe";
    
    $db = Database::connect();
    $statement = $db->query('SELECT * 
                        FROM articles a LEFT JOIN typesdarticle ta ON a.categorie like ta.type_article WHERE a.categorie like "'.$theitem.'"
                        ORDER BY a.Id_article DESC');
    
    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>BT <?php echo $theitem?></title>
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <body>
        <header>
         <marquee><h1>La beauté "<?php echo $theitem?>" </h1></marquee>
        </header> 

        <nav>
            <ul class="menu">
                <li><a href="../index.php"> Acceuil </a></li>
                <li><a href=""> Article </a>
                    <ul>
                        <?php
                            $statement2 = $db->prepare('SELECT  type_article 
                            FROM typesdarticle  WHERE type_article not like ?');
                            $statement2->execute(array($theitem));
                            while($item2 = $statement2->fetch()){
                                echo '<li><a href="items.php?item='.$item2['type_article'].'">'.$item2['type_article'].'</a></li>';
                            }
                        ?>
                    </ul>
                    <li><a href="#"> Connexion </a>
                    <ul>
                        <?php include 'Deconnexion.php'?>
                    </ul>      
                    </li>
                    <li><a href="user.php#panier.php">Panier</a></li>
            </ul>
         </nav>
        <br>
        <table>
            <thead>
                <tr>
                    <th>image</th>
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
                        echo '<td ><img src="../'.$item['illustration'].'"width=150px height=150px></td>';
                        echo '<td>'. $item['Id_article'] .'</td>';
                        echo '<td>'. $item['nom_article'] .'</td>';
                        echo '<td>'. $item['categorie'] .'</td>';
                        echo '<td>'. $item['description'] .'</td>';
                        echo '<td>'. number_format((float)$item['prix'],2,'.','') . ' €' .'</td>';
                        echo '<td><a href="commande.php?itemid='.$item['Id_article'].'"role="button">Commander</a></td>'; 
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