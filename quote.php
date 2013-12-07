<?php
    session_start();
    $fields_to_exclude = array("vehicle_id", "created_at", "updated_at");
    $url_end = "quotes/".$_SESSION['quote_reference']
                        ."?quote_reference=".$_SESSION['quote_reference'];
                        //."?uuid=".$_SESSION['uuid'];
    include 'communicate_with_underwriter.php';
    $get_return = get_from_underwriter($url_end);
    var_dump($get_return);
    $_SESSION['quote_details'] = '';
    if (isset($get_return)) {
        foreach($get_return as $index => $quote_info) {
            if(!(in_array($index, $fields_to_exclude))) {
                $_SESSION['quote_details'] .= '<strong>'
                                               .str_replace('_', ' ',ucfirst($index))
                                               .': </strong>'.$quote_info.'<br>';
                                       var_dump($quote_info);
            }
        }
    }
    include 'view/quote.html';
?>