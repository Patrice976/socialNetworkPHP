<?php
          session_start();
          include '../config/head_header.php';
          include '../config/bdd.php';
          include '../config/listAuthors.php';
          include '../config/recog_session.php';

        ?>
        <div id="wrapper">          
            <aside>
                <img src="../img/user.jpg" alt="Portrait de l'utilisatrice" />
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez la liste des personnes qui
                        suivent les messages de <?php echo $user['alias'] ?> <p>

                </section>
            </aside>
            <main class='contacts'>
                <?php
            
                // Etape 3: récupérer le nom de l'utilisateur
                $laQuestionEnSql = "
                    SELECT users.*
                    FROM followers
                    LEFT JOIN users ON users.id=followers.following_user_id
                    WHERE followers.followed_user_id='$userId'
                    GROUP BY users.id
                    ";
                $lesInformations = $mysqli->query($laQuestionEnSql);
                // Etape 4: à vous de jouer
                //@todo: faire la boucle while de parcours des abonnés et mettre les bonnes valeurs ci dessous 
                while ($followers = $lesInformations->fetch_assoc()) {

                  ?>
                    <article>
                      <img src="../img/user.jpg" alt="blason" />
                      <h3>  <?php echo "par <a href='" . 'wall.php?user_id=' . $followers['id'] . "'>" . htmlspecialchars($followers['alias']) . "</a>"; ?></h3>
                      <p><?php echo $followers['id'] ?></p>
                    </article>
                  <?php } ?>
            </main>
        </div>
    </body>
</html>
