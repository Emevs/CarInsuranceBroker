<!DOCTYPE html>
<?php
    if(isset($_POST['incident'])) {
        $url_end = "incident";
        $post_info = array(
            "date_of_incident" => $_POST['date_of_incident'],
            "claim_value" => $_POST['claim_value'],
            "incident_type" => $_POST['incident_type'],
            "description" => $_POST['description']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors == ''){
            include 'driver_history.php';
        }
        
    }
    include '../view/person_form.html';
?>
