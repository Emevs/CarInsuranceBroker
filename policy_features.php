<!DOCTYPE html>
<?php
    session_start();
    if(isset($_POST['policy_features'])) {
        $url_end = "policy_features";
        $post_info = array(
            "policy_excess" => $_POST['policy_excess'],
            "breakdown_cover" => $_POST['breakdown_cover'],
            "windscreen_repair" => $_POST['windscreen_repair'],
            "windscreen_excess" => $_POST['windscreen_excess'],
            "uuid" => $_SESSION['uuid']
        );   
        include '../model/communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        
        if ($processed_return == ''){
            header('Location: quote_details.php');
        }
        
    }
    include 'view/policy_features_form.html';
?>
