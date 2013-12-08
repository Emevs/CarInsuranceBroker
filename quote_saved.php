<?php
    session_start();
    if (isset($_SESSION['uuid'])) {
        if (isset($_POST['logout'])) {
            header("Location: logout.php");
        }

        include 'view/quote_saved.html';
    } else {
        header("location: index.php");
    }
?>