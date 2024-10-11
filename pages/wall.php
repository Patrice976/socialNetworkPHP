<?php
session_start();
include '../config/head_header.php';
include '../config/bdd.php';
include '../config/listTags.php';
?>
<div id="wrapper">
  <?php
  /**
   * Etape 1: Le mur concerne un utilisateur en particulier
   * La première étape est donc de trouver quel est l'id de l'utilisateur
   * Celui ci est indiqué en parametre GET de la page sous la forme user_id=...
   * Documentation : https://www.php.net/manual/fr/reserved.variables.get.php
   * ... mais en résumé c'est une manière de passer des informations à la page en ajoutant des choses dans l'url
   */
  $userId = intval($_GET['user_id']);
  $listAuteurs = [];
  $laQuestionEnSql = "SELECT * FROM users";
  $lesInformations = $mysqli->query($laQuestionEnSql);
  while ($user = $lesInformations->fetch_assoc()) {
    $listAuteurs[$user['alias']] = [
      'id' => $user['id'],
      'url' => 'wall.php?user_id=' . $user['id']
    ];
  }

  ?>


  <aside>
    <?php
    /**
     * Etape 3: récupérer le nom de l'utilisateur
     */
    $laQuestionEnSql = "SELECT * FROM users WHERE id= '$userId' ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    $user = $lesInformations->fetch_assoc();
    //@todo: afficher le résultat de la ligne ci dessous, remplacer XXX par l'alias et effacer la ligne ci-dessous
    // echo "<pre>" . print_r($user, 1) . "</pre>";
    ?>
    <img src="../img/user.jpg" alt="Portrait de l'utilisatrice" />
    <section>
      <h3>Présentation</h3>
      <p>Sur cette page vous trouverez tous les message de l'utilisatrice :<?php echo " " . $user['alias'] ?>
        (n° <?php echo $userId ?>)
      </p>
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
        <address>
          <?php echo "par <a href='" . $listAuteurs[$post['author_name']]['url'] . "'>" . htmlspecialchars($post['author_name']) . "</a>"; ?>
        </address>


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