<!DOCTYPE html>
<?php
    if(isset($_POST['incident'])) {
        $url_end = "incident";
        $post_info = array(
            "date_of_incident" => $_POST['date_of_incident'],
            "claim_value" => $_POST['claim_value'],
            "incident_type" => $_POST['incident_type'],
            "description" => $_POST['description']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors == ''){
            include 'driver_history.php';
        }
        
    }
?>
<html>
    <head>
        <title>Incident</title>
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
        
        <form class="form-horizontal" role= "form" action="address.php" method="post">
            <h2 class="form-group-heading">Incident</h2>
            <p>Please fill in your incident details carefully.</p>
            
            <div class="form-group">
                <?php if(isset($list_of_errors)) {echo $list_of_errors;} ?>
            </div>
            <div class="form-group">
                <label for="date_of_incident" class="col-md-6 control-label">Date of incident:</label>
                <input type="date" class="form-control" name="date_of_incident" id="date_of_incident">
            </div>
            <div class="form-group">
                <label for="claim_value" class="col-md-6 control-label">Claim Value:</label> 
                <input type="text" class="form-control" name="claim_value"  id="claim_value">
            </div>
            <div class="form-group">
                <label for="incident_type" class="col-md-6 control-label">Incident type:</label> 
                <input type="text" class="form-control" name="incident_type" id="incident_type">
            </div>
            <div class="form-group">
                <label for="description" class="col-md-6 control-label">Description:</label> 
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="form-group">
                <div  class="col-md-12 control-label">
                    <button type="submit" class="btn btn-default" name="incident">Next</button>
                </div>
            </div>
        </form>
    </body>
</html>
