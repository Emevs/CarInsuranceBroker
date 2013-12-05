<!DOCTYPE html>
<?php
    if(isset($_POST['person'])) {
        $url_end = "people";
        $post_info = array(
            "title" => $_POST['title'],
            "forenames" => $_POST['forenames'],
            "surname" => $_POST['surname'],
            "email" => $_POST['email'],
            "date_of_birth" => $_POST['dob'],
            "telephone_number" => $_POST['telephone'],
            "license_type" => $_POST['license_type'],
            "license_period" => $_POST['license_period'],
            "occupation" => $_POST['occupation']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors === ""){
            var_dump($list_of_errors);
            //header('Location: address.php');
             //include 'address.php';
        }   
    }
    include '../view/person_form.html';
?>
