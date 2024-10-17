<?php
include '../config/bdd.php';
include '../config/recog_session.php';
include '../config/chooseHeader.php';
include '../config/listAuthors.php';
include '../config/listTags.php';
?>
<div id="wrapper">

  <?php
  $authorRequest= "SELECT * FROM users WHERE id=".$_GET['user_id'];
  $datasAuthor= $mysqli->query($authorRequest);
  if (! $authorRequest) {
    echo ("Échec de la requete : " . $mysqli->error);
  }
  $author= $datasAuthor->fetch_assoc();
  $laQuestionEnSql = "
  SELECT posts.content, posts.created,posts.id, users.alias as author_name, 
  COUNT(likes.id) as like_number, GROUP_CONCAT(DISTINCT tags.label) AS taglist 
  FROM posts
  JOIN users ON  users.id=posts.user_id
  LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
  LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
  LEFT JOIN likes      ON likes.post_id  = posts.id 
  WHERE posts.user_id=" .$_GET['user_id']." 
  GROUP BY posts.id
  ORDER BY posts.created DESC  
  ";
  /* "<pre>" . var_dump($_GET['user_id']). "</pre>"; */
  $lesInformations = $mysqli->query($laQuestionEnSql);
  if (! $lesInformations) {
    echo ("Échec de la requete : " . $mysqli->error);
  }
//$post = $lesInformations->fetch_assoc();

/*  "<pre>" . var_dump($author) . "</pre>";
 die; */
  ?>

  <aside>

    <img src="../img/user.jpg" alt="Portrait de l'utilisatrice" />
    <section>

      <p>Bienvenue sur le mur de <?php echo $author['alias']; ?> </p>
    <?php include '../config/subButton.php' ?>
    </section>
  </aside>
  <main>
    <?php
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
        <small> <?php include '../config/like.php' ?></small>
          <?php include '../config/displayTags.php' ?>

        </footer>
      </article>
    <?php } ?>

      <?php 
       //je récupère un tableau avec tout le contenu et infos sur le post 
  //$post = $lesInformations->fetch_assoc();
      ?>
  </main>
</div>
</body>

</html>