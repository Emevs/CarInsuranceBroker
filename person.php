<!DOCTYPE html>
<?php
    session_start();
    if(isset($_POST['person'])) {
        $url_end = "personal_details";
        $post_info = array(
            "title" => $_POST['title'],
            "forenames" => $_POST['forenames'],
            "surname" => $_POST['surname'],
            "email" => $_POST['email'],
            "date_of_birth" => $_POST['dob'],
            "telephone_number" => $_POST['telephone'],
            "license_type" => $_POST['license_type'],
            "license_period" => $_POST['license_period'],
            "occupation" => $_POST['occupation'],
            "uuid" => $_SESSION['uuid']
        );   
        include '../model/communicate_with_underwriter.php';
        $return_from_underwriter = post_to_underwriter($post_info, $url_end);
        $processed_return = process_post_return($return_from_underwriter);
        echo "<br>processes return: ";
        var_dump($processed_return);
        if ($processed_return === ""){
            var_dump($list_of_errors);
            header('Location: address.php');
            
        }   
    }
    include 'view/person_form.html';
?>
