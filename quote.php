<?php
    session_start();
    
    if (isset($_SESSION['uuid'])) {
        if (isset($_POST['logout'])) {
            header("Location: logout.php");
        }
        $url_end = "quotes/".$_SESSION['quote_reference']."?quote_reference=".$_SESSION['quote_reference'];
        include 'communicate_with_underwriter.php';
        $get_return = get_from_underwriter($url_end);
       
        $quote = process_get($get_return);  
        include 'view/quote.html';
     } else {
        header("location: index.php");
    }
?>