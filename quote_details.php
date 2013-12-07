<!DOCTYPE html>
<?php
    session_start();
    if (isset($_POST['save_quote'])) {
        echo '<br>'.$_SESSION['quote_reference'].' '.$_SESSION['amount'];
       $url_end = "quotes";
        $post_info = array(
            "quote_reference" => $_SESSION['quote_reference'],
            "amount" => $_SESSION['amount'],
            "uuid" => $_SESSION['uuid']
        );   
        include '../model/communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        echo "<br>processes return: ";
        var_dump($processed_return);
        if ($processed_return === ""){
            var_dump($list_of_errors);
            header('Location: quote_saved.php');
            
        }   
        
    } else {
        $fields_to_exclude = array("vehicle_id", "created_at", "updated_at");

        $get_params = array(
            "uuid" => $_SESSION['uuid']
        );
        $url_end = 'quotes';

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
        include 'view/quote.html';
    }
    
?>