<!DOCTYPE html>
<?php
    session_start();
   if (isset($_SESSION['uuid'])) { 
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
            include 'communicate_with_underwriter.php';
            $return_from_underwriter = post_to_underwriter($post_info, $url_end);
            $processed_return = process_post_return($return_from_underwriter);

            if ($processed_return === ""){
                header('Location: address.php');

            }   
        }
        include 'view/person_form.html';
     } else {
        header("location: index.php");
    }
?>
