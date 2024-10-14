
<?php
     
     $listAuteurs = [];
     $laQuestionEnSql = "SELECT * FROM users";
     $lesInformations = $mysqli->query($laQuestionEnSql);
     while ($user = $lesInformations->fetch_assoc())
     {
         $listAuteurs[$user['id']] = $user['alias'];
     }

      $enCoursDeTraitement = isset($_POST['email']);
      if ($enCoursDeTraitement) {
       
        echo "<pre>" . print_r($_POST, 1) . "</pre>";
        $emailAVerifier = $_POST['email'];
        $passwdAVerifier = $_POST['motpasse'];
        $emailAVerifier = $mysqli->real_escape_string($emailAVerifier);
        $passwdAVerifier = $mysqli->real_escape_string($passwdAVerifier);
        $passwdAVerifier = md5($passwdAVerifier);
     
        $lInstructionSql = "SELECT * "
          . "FROM users "
          . "WHERE "
          . "email LIKE '" . $emailAVerifier . "'";
        $res = $mysqli->query($lInstructionSql);
        $user = $res->fetch_assoc();
        if (! $user or $user["password"] != $passwdAVerifier) {
          echo "La connexion a échouée. ";
        } else {
          echo "Votre connexion est un succès : " . $user['alias'] . ".";
          $_SESSION['connected_id'] = $user['id'];
        }
      }
      
      ?>

<form action="usurpedpost.php" method="post">
                        <input type='hidden' name='???' value='achanger'>
                        <dl>
                            <dt><label for='auteur'>Auteur</label></dt>
                            <dd><select name='auteur'>
                                    <?php
                                    $alias = $_GET('user_id');
                                    foreach ($listAuteurs as $id => $alias)
                                        echo "<option value='$id'>$alias</option>";
                                    ?>
                                </select></dd>
                            <dt><label for='message'>Message</label></dt>
                            <dd><textarea name='message'></textarea></dd>
                        </dl>
                        <input type='submit'>
                    </form> 

              