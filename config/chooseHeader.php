<?php 
"<pre>" . print_r('Into chooseHeader') . "</pre>";
"<pre>" . var_dump($_SESSION['connected_id']) . "</pre>";
"<pre>" . var_dump($USER) . "</pre>";


if ($_SESSION['connected_id'] != null){
    include 'head_header.php';
}
else {
    include 'head_header_disconected.php';
}

