
<center> 
    <span class="Tout"> Tout les champs sont obligatoires </span><br><br>
    <form action="gestion2.php" role = "form" method="POST"enctype="multipart/form-data">
        <label for="id_artcl">Id</label><input type="text"name="id_artcl"id="id_artcl" required><br>

        <label for="select"> --Catégorie d'articles-- </label>
        <select name="categorie" id="select">
        <?php 
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM typesdarticle');
                        $typarticles = $statement->fetchAll();
                        foreach($typarticles as $typarticle){
                            echo '<option value="'.$typarticle['type_article'].'"> '
                            .$typarticle['type_article'].' </option>';
                        }
                        Database::disconnect();
                    ?> 
        </select>
        <p>
            <label for="illustration">Illustration </label><input type="file" id="image" name="image" required><span><?php echo $illustError; ?></span><br>
            <label for="prix">Prix </label><input type="number" name="prix"id="prix" required><span><?php echo $prixErr?></span><br>
            
            <label for="nom_article">Nom de l'article</label>	<input type="text" name="nom_article"id="nom_article" required><br>
            <label for="description">Description </label><textarea name="description" id="description"></textarea><br>
            
        
        </p>
        <input class="Validation"name="Validation"  type="submit" value="Valider"><br><br>
        
    </form>
    
</center>