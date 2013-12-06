<!DOCTYPE html>
<?php
    if(isset($_POST['policy_features'])) {
        $url_end = "policy_features";
        $post_info = array(
            "policy_excess" => $_POST['policy_excess'],
            "breakdown_cover" => $_POST['breakdown_cover'],
            "windscreen_repair" => $_POST['windscreen_repair'],
            "windscreen_excess" => $_POST['windscreen_excess']
        );   
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors == ''){
            header('Location: quote_details.php');
        }
        
    }
    include '../view/policy_features_form.html';
?>
