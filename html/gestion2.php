<?php require 'database.php';
        $prixErr=$illustError="";
        if(isset($_POST['Validation'])){
        $id_article = checkInput($_POST['id_artcl']);
        $categorie = checkInput($_POST['categorie']);
        $description = checkInput($_POST['description']);
        $illustration = checkInput($_FILES['image']['name']);
        $chemiillustr = 'img/'.$categorie.'s/'.basename($illustration);
        $illustrext = pathinfo($chemiillustr, PATHINFO_EXTENSION);
        $prix = checkInput($_POST['prix']);
        $nom_article = checkInput($_POST['nom_article']);
        $isSuccess = true;
        $isUploadSuccess = false;

        if(empty($prix)){
            $prixErr = "ce champ est vide";
            $isSuccess = false;
        }
        if(empty($illustration)){
            $illustError = "ce champ est vide";
            $isSuccess = false;
        }
        else{
            $isUploadSuccess = true;
            if($illustrext != "jpg" && $illustrext != "png" && $illustrext != "jpeg" && $illustrext != "gif"){
                    $isUploadSuccess = false;
                    $illustError= "Les fichiers autorisés sont de type .jpg, .jpeg, .png et .gif";
            }
            else if(file_exists('../'.$chemiillustr))
            {
                $illustError= "Le fichier existe déjà";
                $isUploadSuccess = false;
            }
            else if($_FILES["image"]["size"] > 500000)
                {
                    $illustError = "Le fichier ne doit pas dépasser les 500KB";
                    $isUploadSuccess = false;
                }
            else if($isUploadSuccess)
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"],'../'.$chemiillustr))
                {
                    $illustError = "Il y a une erreur lors de l'upload";
                    $isUploadSuccess = false;
                }
            }
        }
        
        if($isSuccess && $isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO articles (Id_article,categorie,description,illustration,prix,nom_article) values(?, ?, ?, ?, ?, ?)");
            $statement->execute(array($id_article,$categorie,$description,$chemiillustr,$prix,$nom_article));
            Database::disconnect();
            header('Location:user.php#gestion');
        }
        else{
            header('Location:user.php#gestion?illustError='.$illustError);
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