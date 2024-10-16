<?php 
if (isset($_SESSION['connected_id'])){
    include 'head_header.php';
}
else {
    include 'head_header_disconected.php';
}

