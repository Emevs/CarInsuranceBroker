<?php
    session_start();
    if (isset($_SESSION['uuid'])) {
        if (isset($_POST['retrieve'])) {
            $_SESSION['quote_reference'] = $_POST['quote_ref'];
            header("Location: quote.php");
        }

        include 'view/retrieve_quote.html';
    } else {
        header("location: index.php");
    }
?>