<?php 

$BDDLike = "SELECT * FROM likes WHERE user_id = $userId AND post_ID = $post[id]";
$queryLike = $mysqli->query($BDDLike);
$liked = $queryLike->fetch_assoc();
if (! $liked)
{
    $alreadyLiked = false; 
    ?>
    <form action="../config/likeSystem.php?id=<?php echo $post['id']?>" method="post">
            <input type='submit' style ="display : none;"><span style="cursor: pointer;" onclick="this.closest('form').submit();">♥</span> 
            </form>  <?php echo $post['like_number']?></small>
    <?php

}
else
{
    $alreadyLiked = true;
    ?>
      <form action="../config/unlikeSystem.php?id=<?php echo $post['id']?>" method="post">
            <input type='submit' style ="display : none;"><span style="cursor: pointer;" onclick="this.closest('form').submit();">❤️</span> 
            </form>  <?php echo $post['like_number']?></small>
    <?php
}
?>