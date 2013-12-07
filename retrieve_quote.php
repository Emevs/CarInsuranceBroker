<?php
    session_start();
    
    var_dump($_SESSION['uuid']);
    if (isset($_POST['retrieve'])) {
        header("Location: quote.php");
    }
    
    include 'view/retrieve_quote.html';
?>