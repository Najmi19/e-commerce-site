<?php
    if(isset($_GET['item'])){
        $theitem = $_GET['item'];
    }
    else $theitem = "";
    $statement2 = $db->prepare('SELECT  type_article 
                            FROM typesdarticle  WHERE type_article not like ?');
    $statement2->execute(array($theitem));
    while($item2 = $statement2->fetch()){
        echo '<li><a href="items.php?item='.$item2['type_article'].'">'.$item2['type_article'].'</a></li>';
    }
?>