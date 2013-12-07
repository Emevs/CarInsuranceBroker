<?php
    session_start();
    var_dump($_POST);
    if (isset($_POST['logout'])) {
        header("Location: logout.php");
    }
    
    include 'view/quote_saved.html';
?>