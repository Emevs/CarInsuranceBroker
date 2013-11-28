<!DOCTYPE html>
<?php
    if(isset($_POST['vehicle'])) {
        $url_end = "vehicles";
        $post_info = array(
            "vehicle_registration" => $_POST['vehicle_registration'],
            "annual_mileage" => $_POST['annual_mileage'],
            "estimated_value" => $_POST['estimated_value'],
            "parking_location" => $_POST['parking_location'],
            "policy_start_date" => $_POST['policy_start_date']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors === ""){
            header('Location: policy_features.php');
        }
        
    }
?>
<html>
    <head>
        <title>Vehicle Details</title>
        <!-- Bootstrap core CSS http://http://getbootstrap.com/ 
             hosted online at http://www.bootstrapcdn.com/-->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
         <!-- Custom styles for form -->
        <link href="forms.css" rel="stylesheet">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="jumbotron">
            <h1>Car Insurance Broker</h1>
        </div>
        
        <form class="form-horizontal" role= "form" method="post">
            <h2 class="form-group-heading">Vehicle Details</h2>
            <p>Please fill in your vehicle details carefully.</p>
            
            <div class="form-group">
                <?php if(isset($list_of_errors)) {echo $list_of_errors;} ?>
            </div>
            <div class="form-group">
                <label for="vehicle_registration" class="col-md-6 control-label">Vehicle registration number:</label>
                <input type="text" class="form-control" name="vehicle_registration" id="vehicle_registration">
            </div>
            <div class="form-group">
                <label for="annual_mileage" class="col-md-6 control-label">Annual Mileage:</label> 
                <input type="number" class="form-control" name="annual_mileage"  id="annual_mileage">
            </div>
            <div class="form-group">
                <label for="estimated_value" class="col-md-6 control-label">Estimated Vehicle Value:</label> 
                <input type="number" class="form-control" name="estimated_value"  id="estimated_value">
             </div>
            <div class="form-group">
                <label for="parking_location" class="col-md-6 control-label">Parking Location:</label> 
                <input type="text" class="form-control" name="parking_location"  id="parking_location">
            </div>
            <div class="form-group">
                <label for="policy_start_date" class="col-md-6 control-label">Policy start date:</label> 
                <input type="text" class="form-control" name="policy_start_date" id="policy_start_date">
            </div>
            <div class="form-group">
                <div  class="col-md-12 control-label">
                    <button type="submit" class="btn btn-default pull-right" name="vehicle">Next</button>
                </div>
            </div>
        </form>
    </body>
</html>
