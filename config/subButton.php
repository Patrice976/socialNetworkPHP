<?php 
$followId = $_GET['user_id'];
$userId = $_SESSION['connected_id'];

if(isset($_SESSION['connected_id'])) {
$BDDchecksub = "SELECT * FROM followers WHERE followed_user_id = $followId AND following_user_id = $userId" ;
$querychecksub = $mysqli->query($BDDchecksub);
$subbed = $querychecksub->fetch_assoc();

if (! $subbed) {
    ?><form action="../config/subscribeSystem?user_id=<?php echo $_GET['user_id'] ?>" method="post">
    <button type ="submit">S'abonner</button>
  </form>
    <?php
}elseif(isset($subbed)) {
    ?> 
    <form action="../config/unsubscribeSystem?user_id=<?php echo $_GET['user_id'] ?>" method="post">
    <button type ="submit" style="color: red;">Se désabonner</button>
  </form></p>
  <?php
}
}



