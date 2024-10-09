<?php
include '../config/head_header.php';
include '../config/bdd.php';
include '../config/listAuthors.php';
?>
<div id="wrapper">
  <aside>
    <img src="../img/user.jpg" alt="Portrait de l'utilisatrice" />
    <section>
      <h3>Présentation</h3>
      <p>Sur cette page vous trouverez les derniers messages de
        tous les utilisatrices du site.</p>
    </section>
  </aside>
  <main>



  <?php

  

    /* $userId = intval($_GET['user_id']); */


    //verification
    if ($mysqli->connect_errno) {
      echo "<article>";
      echo ("Échec de la connexion : " . $mysqli->connect_error);
      echo ("<p>Indice: Vérifiez les parametres de <code>new mysqli(...</code></p>");
      echo "</article>";
      exit();
    }

   
    $laQuestionEnSql = "
                    SELECT posts.content,
                    posts.created,
                    users.alias as author_name,  
                    count(likes.id) as like_number,  
                    GROUP_CONCAT(DISTINCT tags.label) AS taglist 
                    FROM posts
                    JOIN users ON  users.id=posts.user_id
                    LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
                    LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
                    LEFT JOIN likes      ON likes.post_id  = posts.id 
                    GROUP BY posts.id
                    ORDER BY posts.created DESC  
                    LIMIT 5
                    ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    // Vérification
    if (! $lesInformations) {
      echo "<article>";
      echo ("Échec de la requete : " . $mysqli->error);

      exit();
    }


    // NB: à chaque tour du while, la variable post ci dessous reçois les informations du post suivant.
    while ($post = $lesInformations->fetch_assoc()) {
  
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
          <small>♥ <?php echo $post['like_number'] ?></small>
          <a href=""><?php echo $post['taglist'] ?></a>,
        </footer>
      </article>
    <?php
      
    } // cette accolade ferme et termine la boucle while ouverte avant.
    ?>

  </main>
</div>
</body>

</html>