<address>
<?php 
// verifie si 'taglist' existe et n'est pas vide
if (isset($post['taglist']) && !empty($post['taglist'])) {
    $tags = explode(',', $post['taglist']); // Explose les tags présents 1 à 1

    foreach ($tags as $hashtag) { // parcoure  le tableau
        if (isset($listTags[$hashtag])) { // verifie si le tag EXISTE dans le tableau
            echo "<a href='tags.php?tag_id=" . $listTags[$hashtag]['id'] . "'>" . htmlspecialchars($hashtag) . "</a><br>";
        } else {
            echo htmlspecialchars($hashtag) . "<br>"; // Si le tag n'existe pas dans $listTags
        }
    }
} else {
    
    echo "Aucun tag disponible.";
}
?> 
</address>