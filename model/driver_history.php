<!DOCTYPE html>
<?php
    session_start();
    if(isset($_POST['driver_history'])) {
        $url_end = "driver_history";
        $post_info = array(
            "number_of_incidents" => $_POST['num_incidents']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        var_dump($list_of_errors);
        if (isset($list_of_errors)){
            iheader('Location: incident.php');
        }
        
    }
    include '../view/driver_history_form.html';
?>
