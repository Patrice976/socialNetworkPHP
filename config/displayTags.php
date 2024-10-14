<address>
<?php 
$tags = explode(',', $post['taglist']); // Explose les tags présents 1 à 1

foreach ($tags as $hashtag) { // Parcourir le tableau
    if (isset($listTags[$hashtag])) { // Vérifier si le tag EXISTE dans le tableau. Renvoie true / false. Si le tag existe pas il créé un tag en dur sans lien
        echo "<a href='tags.php?tag_id=" . $listTags[$hashtag]['id'] . "'>" . htmlspecialchars($hashtag) . "</a><br>";
    } else {
        echo htmlspecialchars($hashtag) . "<br>"; // Si le tag n'existe pas dans $listTags
    }
}
?> 
</address>