<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION['uuid'])) {
        if (isset($_POST['save_quote'])) {  
            $url_end = "quotes";
            $post_info = array(
                "quote_reference" => $_SESSION['quote_reference'],
                "amount" => $_SESSION['amount'],
                "uuid" => $_SESSION['uuid']
            );   
            include 'communicate_with_underwriter.php';
            $return_from_underwriter = post_to_underwriter($post_info, $url_end);
            $processed_return = process_post_return($return_from_underwriter);

            if ($processed_return === ""){
                header('Location: quote_saved.php');
            }   

        } else {
            $url_end = 'quotes/new/?uuid='.$_SESSION['uuid'];
            include 'communicate_with_underwriter.php';
            $get_return = get_from_underwriter($url_end);
            $quote = process_get($get_return);  
     
            include 'view/quote.html';
            include 'view/save_quote.html';
        }
    } else {
        header("location: index.php");
    }
    
?>