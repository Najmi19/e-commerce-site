<?php 
    require 'database.php';
    session_start();
    if((!isset($_SESSION['login']) and (!isset($_SESSION['role'])))){
        header('Location: index.php');
    }
    else{
        $login = $_SESSION['login'];
        $role = $_SESSION['role'];
    }
    
    $loginErr = "";

    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM utilisateurs u INNER JOIN role r ON u.Id_Role = r.Id_role INNER JOIN sexe s on u.sexe= s.sexe WHERE id_user = ?");
    $statement->execute(array($login));
    $userinfo = $statement->fetch();
    Database::disconnect();
    $prixErr=$illustError="";
    if(isset($_GET['illustError']))
        $illustError = $_GET['illustError'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Compte utilisateur</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    </head>
    <body>
        <header>
            <h1>La beauté</h1>
        </header>
        <nav> 
            <ul class = "menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="Qui sommes-nous.php">Qui sommes-nous?</a></li>
                
            </ul>
        
            <ul class="menu">
                <!--normalement l'id devrait être positionné vers l'element cible-->
                <li><a href="#profil" role ="button"onclick="openProfil();closeGestion();closePanier()"> Profil</a>
                <ul class = "menu">
                <?php include 'Deconnexion.php'?><br>
                </ul></li>
                 <!-- penser a creer une page gestion de clients si necessaire-->
                <?php 
                    if($role==0)
                        echo "<li><a href=\"#gestion\"onclick=\"closeProfil();openGestion();closePanier()\">Gestion des articles</a></li>";

                ?>
                <li><a href="#panier" onclick="closeProfil();closeGestion();openPanier()">Modifier le panier</a></li>
            </ul>
        </nav><br><br>

        <center>
            <section id="profil">
                <form>
                    <label for="select"> --Civilité-- </label>
                    <span id ="select"><?php echo $userinfo['description']?></span><br>
                    
                    <p>
                        <label for="nom">Nom:</label><span id ="nom"><?php echo $userinfo['nom']?></span><br>
                        <label for="prenom">Prenom:</label><span id ="prenom"><?php echo $userinfo['prenom']?></span><br>
                        <label for="login">Identifiant:</label><span id ="login"><?php echo $userinfo['id_user']?></span><br>

                        <label for="date_naissance">Date de naissance:</label>	<span id ="date_naissance"><?php echo $userinfo['date_naiss']?></span><br>
                        <label for="adresse">Adresse: </label>  <span id ="adresse"><?php echo $userinfo['Adresse']?></span><br>
                        <label for="telephone">Telephone:</label>    <span id ="telephone"><?php echo $userinfo['telephone']?></span><br>
                        <label for="email">Email:</label>    <span id ="email"><?php echo $userinfo['email']?></span><br>
                    </p>
                    <br><br>
                    
                </form>
            </section>
        </center>
        <section id="gestion">
        <?php 
        if ($role==0){
            include 'gestion.php';
        }
        ?>

        </section>
        <section id="panier">
        <?php
            include 'panier.php';
        ?>

        </section>

 <!--       <section id="role">
                php include si admin
        </section> -->
        <footer>
            <p>France</p>
        </footer>
        <script src="../js/user.js"></script>
    </body>
</html>