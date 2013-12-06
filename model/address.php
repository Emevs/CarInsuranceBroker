<!DOCTYPE html>
<?php
    if(isset($_POST['address'])) {
        $url_end = "addresses";
        $post_info = array(
            "house_name_or_number" => $_POST['name_or_number'],
            "street_name" => $_POST['street_name'],
            "county" => $_POST['county'],
            "city" => $_POST['city'],
            "postcode" => $_POST['postcode']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors == ''){
            header('Location: driver_history.php');
        }
        
    }
    include '../view/address_form.html';
?>
