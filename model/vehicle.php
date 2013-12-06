<!DOCTYPE html>
<?php
    if(isset($_POST['vehicle'])) {
        $url_end = "vehicles";
        $post_info = array(
            "vehicle_registration" => $_POST['vehicle_registration'],
            "annual_mileage" => $_POST['annual_mileage'],
            "estimated_value" => $_POST['estimated_value'],
            "parking_location" => $_POST['parking_location'],
            "policy_start_date" => $_POST['policy_start_date']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors === ""){
            header('Location: policy_features.php');
        }
        
    }
    include '../view/vehicle_form.html';
?>
