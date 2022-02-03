<center>
<span class="Tout"> Tout les champs sont obligatoires </span><br><br>

    <section>
        <form action="panier2.php" method="POST">
            <!-- prix total javascript-->
            <!-- note pour plus tard: modifier la structure d'article
            pour inclure la quantité restante-->

            <label>supprimer toutes les commandes </label><br>
            <label for="oui">Oui   </label><input type="radio" id="oui"name="vider"value=true>
           
            <label for="non">non   </label><input type="radio" id="non"name="vider"value=false checked=true>
            

            <TABLE>
                <thead>
                    <tr>
                        <th>Illustration</th>
                        <th>Numero d'article</th>
                        <th>Nom d'article</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Prix total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = Database::connect();
                        $statement = $db->prepare('SELECT * FROM commande c LEFT JOIN articles a 
                                                ON c.Id_article = a.Id_article WHERE c.id_user =?');
                        $statement->execute(array($_SESSION['login']));
                        $commandes = $statement->fetchAll();
                        foreach($commandes as $commande){
                            echo '<tr>';
                            echo '<td ><img src="../'.$commande['illustration'].'"width=150px height=150px></td>';
                            echo '<td>'. $commande['Id_article'] .'</td>';
                            echo '<td>'. $commande['nom_article'] .'</td>';
                            echo '<td>'. number_format((float)$commande['prix'],2,'.','') . ' €' .'</td>';
                            echo '<td>'. $commande['quantite'] .'</td>';
                            echo '<td>'. number_format((float)$commande['Ptt'],2,'.','') . ' €' .'</td>';
                            echo '<td><a href="commande.php?itemid='.$commande['Id_article'].'"role="button">Modifier/supprimer</a></td>'; 
                            echo '</tr>';
                        }
                        Database::disconnect();
                    ?>
                </tbody>
            </TABLE>
            <input class="Validation"name="envoyerpanier"  type="submit" value="Valider"><br><br>
        </form>
    </section>
</center>
