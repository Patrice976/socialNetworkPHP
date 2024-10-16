<?php
          //session_start();
          include '../config/bdd.php';
          include '../config/recog_session.php';
          include '../config/chooseHeader.php';
          include '../config/listAuthors.php';
          ;
          

        ?>
  <div id="wrapper">
    <aside>
      <img src="../img/user.jpg" alt="Portrait de l'utilisatrice" />
      <section>
        <h3>Présentation</h3>
        <p>Sur cette page vous trouverez la liste des personnes que <?php echo $USER['alias'] ?> suit  </p>

      </section>
    </aside>
    <main class='contacts'>
      <?php

      
      // Etape 3: récupérer le nom de l'utilisateur
      $laQuestionEnSql = "
                    SELECT users.* 
                    FROM followers 
                    LEFT JOIN users ON users.id=followers.followed_user_id 
                    WHERE followers.following_user_id='$userId'
                    GROUP BY users.id
                    ";
      $lesInformations = $mysqli->query($laQuestionEnSql);
      // Etape 4: à vous de jouer
      //@todo: faire la boucle while de parcours des abonnés et mettre les bonnes valeurs ci dessous 


      while ($subscriptions = $lesInformations->fetch_assoc()) {

      ?>
        <article>
          <img src="../img/user.jpg" alt="blason" />
          <h3>
          <?php echo "par <a href='" . 'wallAuthor.php?user_id=' . $subscriptions['id'] . "'>" . htmlspecialchars($subscriptions['alias']) . "</a>"; ?>
          </h3>
          <p><?php echo $subscriptions['id'] ?></p>
        </article>
      <?php } ?>
    </main>
  </div>
</body>
</html>