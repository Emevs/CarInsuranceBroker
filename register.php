<?php    
    
    session_start();
    if(isset($_POST['submit_registration'])) {
        $url_end = "users";
        $post_info = array(
            "username" => $_POST['register_username'],
            "password" => $_POST['register_password'],
            "uuid" => ''
        );   
        include '../model/communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        var_dump($processed_return);
        if (isset($_SESSION['uuid'])){
            header('Location: person.php');
            //echo $_SESSION['uuid'];
        }   
    }
    
   include "view/register.html";
?>