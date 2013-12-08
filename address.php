<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION['uuid'])) {
        if(isset($_POST['address'])) {
            $url_end = "addresses";
            $post_info = array(
                "house_name_or_number" => $_POST['name_or_number'],
                "street_name" => $_POST['street_name'],
                "county" => $_POST['county'],
                "city" => $_POST['city'],
                "postcode" => $_POST['postcode'],
                "uuid" => $_SESSION['uuid']
            );   
            include 'communicate_with_underwriter.php';
            $return_from_underwriter = post_to_underwriter($post_info, $url_end);
            $processed_return = process_post_return($return_from_underwriter);
            if ($processed_return == ''){
                header('Location: driver_history.php');
            }

        }
        include 'view/address_form.html';
    } else {
        header("location: index.php");
    } 
?>
