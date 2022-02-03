<?php
    require 'database.php';
    $nomErr=$prenomErr=$loginErr=$dnaissErr=$adrErr=$telErr=$emailErr=$mdpErr="";
    if(!empty($_POST))
    {
        $nom = checkInput($_POST['nom']);
        $prenom = checkInput($_POST['prenom']);
        $login = checkInput($_POST['login']);
        $sex = checkInput($_POST['sex']);
        $datnaiss = checkInput($_POST['date_naissance']);
        $adresse = checkInput($_POST['adresse']);
        $tel = checkInput($_POST['telephone']);
        $email = checkInput($_POST['email']);
        $mdp = checkInput($_POST['mot_d_passe']);
        $mdp2 = checkInput($_POST['mot_d_passe2']);
        $isSuccess = true;
        
        if($mdp != $mdp2){
            $mdpErr = "Les mots de passe ne sont pas identiques";
            $isSuccess = false;
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr = "L'email n'est pas correct";
            $isSuccess = false;
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr = "L'email n'est pas correct";
            $isSuccess = false;
        }
        if($isSuccess){
            $db = Database::connect();
            $hashed_mdp = password_hash($mdp, PASSWORD_BCRYPT);
            $statement = $db->prepare("SELECT count(id_user) as idus FROM utilisateurs WHERE id_user = ?");
            $statement->execute(array($login));
            $count = $statement->fetch();
            if($count['idus']==0) // nom d'utilisateur unique
            {
                $statement=$db->query('SELECT count(*) FROM utilisateurs');
                $nbr = $statement->fetch();
                if ($nbr==0)
                    $role = 0;
                else 
                    $role = 1;
                $statement = $db->prepare("INSERT INTO utilisateurs (id_user,nom,prenom,date_naiss,Id_Role, mdp,sexe,Adresse,email,telephone) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $statement->execute(array($login,$nom,$prenom,$datnaiss,$role,$hashed_mdp,$sex,$adresse,$email,$tel));
                header("Location: index.php");
            }
            else
            {
                $loginErr = "identifiant déjà pris"; 
                header('Location: inscription.php'); // utilisateur deja present
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
        <title>BT Inscription</title>
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
                <li><a href="index.php"> Accueil </a></li>      
                <li><a href="Qui sommes-nous.php"> Qui sommes-nous ?</a></li>
                <br><br>
            </ul> 
        </nav>       
                    
        <center> 
            <span class="Tout"> Tout les champs sont obligatoires </span><br><br>
            <form action="Inscription.php" method="POST">
                <label for="select"> --Civilité-- </label>
                <select name="sex" id="select">
                    <option selected value="">  </option>
                    <?php 
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM sexe');
                        $sexes = $statement->fetchAll();
                        foreach($sexes as $sexe){
                            echo '<option selected value="'.$sexe['sexe'].'"> '
                            .$sexe['description'].' </option>';
                        }
                        Database::disconnect();
                    ?> 
                </select>
                <p>
                    <label for="nom">Nom</label><input type="text" name="nom" id="nom" required><br>
                    <label for="prenom">Prenom</label><input type="text" name="prenom"id="prenom" required><br>
                    <label for="login">Identifiant</label><input type="text" name="login"id="login" required><span><?php echo $loginErr?></span><br>
                    
                    <label for="date_naissance">Date de naissance</label>	<input type="date" name="date_naissance"id="date_naissance" required><br>
                    <label for="adresse">Adresse </label>   <input type="text" name="adresse"id="adresse" ><br>
                    <label for="telephone">Telephone</label>    <input type="tel" name="telephone"id="telephone" ><br>
                    <label for="email">Email</label>    <input type="email" name="email"id="email" ><br><span><?php echo $emailErr?></span>
                    <label for="mot_d_passe">Mot de passe</label>   <input type="password" name="mot_d_passe"id="mot_d_passe" required>
                    <label for="mot_d_passe2">Retapez le Mot de passe</label>   <input type="password" name="mot_d_passe2"id="mot_d_passe2" required>
                    <span><?php echo $mdpErr?></span>
                
                </p>
                <input class="Validation"name="Validation"  type="submit" value=" Valider "><br><br>
                
            </form>
        </center>
            

         

        <footer>
            <p>France</p>
        </footer>
        
    </body>
</html>