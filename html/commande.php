<?php
    require 'database.php';
    session_start();
    if((isset($_GET['itemid']))and isset($_SESSION['login'])){
        if(!empty($_GET['itemid']))
            $theid = checkInput($_GET['itemid']);
        else header('Location: index.php');
    } else header('Location: items.php');
    $db = Database::connect();
    $statement = $db->prepare('SELECT nom_article, prix FROM articles WHERE Id_article =?');
    $statement->execute(array($theid));
    $article = $statement->fetch(); 
    if(isset($_POST['commander'])){
        $id_art =  checkInput($theid);
        $id_log =  checkInput($_SESSION['login']);
        $id_prix = $article['prix'];
        $qte = checkInput($_POST['qte']);
        $date = date('Y-m-d');
        $choix = checkInput($_POST['choix']);
        
        if($choix==1){
            $statement = $db->prepare('INSERT INTO commande (Id_article,id_user,quantite,
                                        ptt,date_commande) VALUES(?,?,?,?,?)');
            $statement->execute(array($theid,$id_log,$qte,$qte*$id_prix,$date));

            $statement = $db->prepare('UPDATE commande SET quantite = ?, Ptt = ?, date_commande = ? WHERE commande.Id_article = ? AND commande.id_user = ?');
            $statement->execute(array($qte,$qte*$id_prix,$date,$theid,$id_log));
        }
        else if($choix==0){
            $statement = $db->prepare('DELETE FROM commande WHERE Id_article=? AND id_user=?');
            $statement->execute(array($theid,$id_log));
        }
        Database::disconnect();
        header("location:items.php");

    }
    
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
        <meta name="description" content="Faites votre commande">
        <title>Commande</title>
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <marquee><h1>La beauté</h1></marquee>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="../index.php"> Acceuil </a></li>
                <li><a href=""> Article </a>
                    <ul>
                        <?php
                            $statement2 = $db->query('SELECT  type_article 
                            FROM typesdarticle');
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
        <center>
            <form method = "POST" action = "commande.php?itemid=<?php echo $theid?>">
                <label for="id_artcl">Id: </label><span id="id_artcl"><?php echo $article['nom_article'];?></span><br>
                <label for="prix">Prix: </label><span id="prix"><?php echo $article['prix'];?></span><br>
                <label for="quantite">Quantité: </label> <input type="number" id="quantite" name="qte"required><br>
                <label for="choix">Voulez-vous supprimer ou creer/mettre à jour? </label>
                <select name="choix" id="choix">
                    <option selected value="1">creer/modifier</option>
                    <option selected value="0">supprimer</option>
                </select>
                <!-- script js pour prix total-->
                <input class="Validation"name="commander"  type="submit" value="commander"><br><br>
            </form>
        </center>
        <footer>
            <p>France</p>
        </footer>
    </body>

</html>