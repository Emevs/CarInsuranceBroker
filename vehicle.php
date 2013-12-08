<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION['uuid'])) {
        if(isset($_POST['vehicle'])) {
            $url_end = "vehicles";
            $post_info = array(
                "vehicle_registration" => $_POST['vehicle_registration'],
                "annual_mileage" => $_POST['annual_mileage'],
                "estimated_value" => $_POST['estimated_value'],
                "parking_location" => $_POST['parking_location'],
                "policy_start_date" => $_POST['policy_start_date'],
                "uuid" => $_SESSION['uuid']
            );   
            include 'communicate_with_underwriter.php';
            $return_from_underwriter = post_to_underwriter($post_info, $url_end);
            $processed_return = process_post_return($return_from_underwriter);

            if ($processed_return === ""){
                header("location: policy_features.php");
            }

        }
        include 'view/vehicle_form.html';
    } else {
        header("location: index.php");
    }
?>
