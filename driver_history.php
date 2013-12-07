<!DOCTYPE html>
<?php
    session_start();
    
    if(isset($_POST['driver_history'])) {
        $url_end = "driver_histories";
        
        $post_info = array(
            "number_of_incidents" => $_POST['num_of_incidents'],
            "uuid" => $_SESSION['uuid']
        ); 
        
        $_SESSION['num_of_incidents'] = $_POST['num_of_incidents'];
        
        include 'communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        
        if (isset($processed_return) && $_SESSION['num_of_incidents'] != 0){
            header('Location: incident.php');
            $_SESSION['incident_count'] = 0;
        } else {
            if ($_SESSION['num_of_incidents'] == 0) {
               header('Location: vehicle.php'); 
            }
        }
        
    }
    include 'view/driver_history_form.html';
?>
