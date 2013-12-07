<!DOCTYPE html>
<?php
    session_start();
    if (isset($_POST['save_quote'])) {
        
       $url_end = "quotes?uuid=".$_SESSION['uuid'];
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
        $fields_to_exclude = array("vehicle_id", "created_at", "updated_at");

        $url_end = 'quotes/new/';
        include 'communicate_with_underwriter.php';
        $get_return = get_from_underwriter($get_params, $url_end);

        $quote_details = '';
        if (isset($get_return)) {
            foreach($get_return as $index => $quote_info) {
                if(!(in_array($index, $fields_to_exclude))) {
                    $quote_details .= '<strong>'
                                    .str_replace('_', ' ',ucfirst($index))
                                    .': </strong>'.$quote_info.'<br>';
                    if ($index == 'quote_reference' || $index == 'amount') {
                        $_SESSION[$index] = $quote_info;
                    }
                }
            }
        } 
        include 'view/quote_details.html';
    }
    
?>