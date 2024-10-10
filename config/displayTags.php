    <adress>
    <?php 
$tags = explode(',', $post['taglist']); 

foreach ($tags as $hashtag) {
    var_dump($listTags[$tag['label']]['id']);
    echo "<a href='tags.php?tag_id=" . $listTags[$tag['label']]['id'] . "'>" . $hashtag . "</a><br>";
                                             } 
?> 
    </address>