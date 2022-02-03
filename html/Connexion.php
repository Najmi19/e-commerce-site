<?php
    

    $loginError=$mdpError="";
    session_start();
    if((isset($_SESSION['login'])) and ($_SESSION['login']!=="")){
    header('Location: index.php');}
    if(!empty($_POST))
    {
        require 'database.php';
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $login = checkInput($_POST['login']);
        $mdp = checkInput($_POST['mdp']);
        $isSuccess = true;

        if(empty($login))
        {
            $loginError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($mdp))
        {
            $mdpError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if($isSuccess)
        {
            $db = Database::connect();
            //$hashed_mdp = password_hash($mdp, PASSWORD_BCRYPT);
            $statement = $db->prepare("SELECT mdp,Id_Role FROM utilisateurs where 
              id_user like ? ");
              $statement->execute(array($login));
            $count = $statement->fetch();
            if(password_verify($mdp,$count['mdp'])!=0) // nom d'utilisateur et mot de passe correctes
            {
                $_SESSION['login'] = $login;
                $_SESSION['role'] = $count['Id_Role'];
               header('Location:index.php');
            }
            else
            {
               header('Location: connexion.php?Error=1'); // utilisateur ou mot de passe incorrect
            }
            Database::disconnect();
        }

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
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>BT Connexion</title>
        <link rel="stylesheet" type="text/css" href="../css/Style.css">
        <!-- CSS only -->	
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <h1>La beauté</h1>
            <nav>
                <ul class="menu">
                    <li><a href="index.php"> Accueil </a></li>
                    
                        <li><a href="Qui sommes-nous.php"> Qui sommes-nous ?</a></li>
                        <br><br><br><br>
                </ul>   
            </nav>
        </header> 

        <section>    
        <center>
 
            <span class="Tout"> Tout les champs doivent etre remplis </span><br><br>
        
            <form action="./Connexion.php" method="post">
                    <p>  
                        <label for="login">Identifiant</label>	<input type="text" name="login" id="login" required><br><br>
                        <span><?php echo $loginError; ?></span>
                        <label for="mdp">mot de passe</label>	<input type="password" name="mdp" id="mdp" required><br><br>
                        <span><?php echo $mdpError; ?></span>
                        <input class="Validation" type="submit" value="Valider" ><br><br><br>
                        <?php
                            if(isset($_GET['Error'])){
                                $err = $_GET['Error'];
                                if($err==1 || $err==2)
                                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                            }
                        ?>
                    </p>
                </center>
            </form>
            
        </section>
        
        <footer>
            <p>France</p>
        </footer>
        
    </body>
</html>