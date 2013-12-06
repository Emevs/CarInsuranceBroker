<?php
    session_start();
    
    include "../view/index.html";
    
    if(isset($_POST['signin'])) {
        $url_end = "users";
        $post_info = array(
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "uuid" => ''
        );   
        include '../model/communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors === ""){
            //header('Location: address.php');
            echo "YES";
        }   
    }
    
   
?>