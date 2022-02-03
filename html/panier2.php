<?php require 'database.php';
     if(isset($_POST['envoyerpanier'])){
        $vider = checkInput($_POST['vider']);
        $db = Database::connect();
        if($vider){
            $statement = $db->query('DELETE FROM commande');
        }
        Database::disconnect();
        header('Location: user.php#panier');
     }

     function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    session_start();
?>