<?php
    session_start();
    
    
    
    if(isset($_POST['signin'])) {
        $url_end = "users";
        $post_info = array(
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "uuid" => ''
        );   
        include '../model/communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        if (isset($_SESSION['uuid'])){
            //header('Location: address.php');
            echo "YES";
        }   
    }
    if(isset($_POST['register'])) {
        header("Location: /CarInsuranceBroker/model/register.php");
    }
    include "../view/index.html";
?>