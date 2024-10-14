<?php 
if ($_SESSION['connected_id'] != null){
    include 'head_header.php';
}
else {
    include 'head_header_disconected.php';
}

