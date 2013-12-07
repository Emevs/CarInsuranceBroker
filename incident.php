<!DOCTYPE html>
<?php
    session_start();
    if(isset($_POST['incident'])) {
        $url_end = "incidents";
        $post_info = array(
            "date_of_incident" => $_POST['date_of_incident'],
            "claim_value" => $_POST['claim_value'],
            "incident_type" => $_POST['incident_type'],
            "description" => $_POST['description'],
            "uuid" => $_SESSION['uuid']
        );   
        
        include 'communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        
        if ($processed_return == ''){
            $_SESSION['incident_count']++;
            if ($_SESSION['incident_count'] == $_SESSION['num_of_incidents']) {
                header("Location: vehicle.php");
            } else {
                header("Location: incident.php");
            }
        } 
    }
    include 'view/incident_form.html';
?>
