<?php
include '../config/bdd.php';
include '../config/recog_session.php';
include '../config/chooseHeader.php';
include '/Applications/MAMP/htdocs/socialNetworkPHP/config/listAuthors.php';
include '../config/listTags.php';
?>
<div id="wrapper">


  <aside>
    
    <img src="../img/user.jpg" alt="Portrait de l'utilisatrice" />
    <section>
      <h3>Bonjour  <?php echo " " . $USER['alias'] ?> </h3>
      <p>Bienvenu sur ta pages numéro <?php echo $userId ?> , tu y retrouveras tout tes postes </p>
    </section>
  </aside>
  <main>
    <?php
    /**
     * Etape 3: récupérer tous les messages de l'utilisatrice
     */
    $laQuestionEnSql = "
                    SELECT posts.content, posts.created, users.alias as author_name, 
                    COUNT(likes.id) as like_number, GROUP_CONCAT(DISTINCT tags.label) AS taglist 
                    FROM posts
                    JOIN users ON  users.id=posts.user_id
                    LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
                    LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
                    LEFT JOIN likes      ON likes.post_id  = posts.id 
                    WHERE posts.user_id='$userId' 
                    GROUP BY posts.id
                    ORDER BY posts.created DESC  
                    ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    if (! $lesInformations) {
      echo ("Échec de la requete : " . $mysqli->error);
    }

    /**
     * Etape 4: @todo Parcourir les messsages et remplir correctement le HTML avec les bonnes valeurs php
     */
    while ($post = $lesInformations->fetch_assoc()) {

      //echo "<pre>" . print_r($post, 1) . "</pre>";
    ?>
      <article>
        <h3>
          <time><?php echo $post['created'] ?></time>
        </h3>
        
        <?php include '../config/displayAuthor.php' ?>

        <div>
          <p><?php echo $post['content'] ?></p>
        </div>
        <footer>
          <small>♥<?php echo $post['like_number'];
          var_dump($_SESSION['connected_id']) ?></small>
          <?php include '../config/displayTags.php' ?>

        </footer>
      </article>
    <?php } ?>


  </main>
</div>
</body>

</html>