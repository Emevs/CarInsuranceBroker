<?php
    session_start();
    if(isset($_POST['signin'])) {
        $url_end = "users/login?username=".$_POST['username']."&password=".$_POST['password'];
        $post_info = array(
            "username" => $_POST['username'],
            "password" => $_POST['password']
        );   
        include 'communicate_with_underwriter.php';
        $get_return = get_uuid(get_from_underwriter($url_end));
        if (isset($_SESSION['uuid'])) {
            header('Location: retrieve_quote.php');
        } else {
            $error = '<div class="alert alert-danger">Username or password incorrect.</div>';
        }
    }
    if(isset($_POST['register'])) {
        header("Location: register.php");
    }
    include "view/index.html";
?>