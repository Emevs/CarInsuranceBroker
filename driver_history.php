<!DOCTYPE html>
<?php
    if(isset($_POST['driver_history'])) {
        $url_end = "driver_history";
        $post_info = array(
            "number_of_incidents" => $_POST['num_incidents']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        var_dump($list_of_errors);
        if (isset($list_of_errors)){
            iheader('Location: incident.php');
        }
        
    }
?>
<html>
    <head>
        <title>Driver History</title>
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
        
        <form class="form-horizontal" role= "form" action="person.php" method="post">
            <h2 class="form-group-heading">Driver History</h2>
            <p>Please fill in your driver history carefully.</p>
            
            <div class="form-group">
                <?php if(isset($list_of_errors)) {echo $list_of_errors;} ?>
            </div>
            <div class="form-group">   
                <label for="num_of_incidents" class="col-md-6 control-label">Number of incidents:</label>
                <input type="number" class="form-control" name="num_of_incidents" id="num_of_incidents">
            </div>
            <div class="form-group">
                <div  class="col-md-12 control-label">
                    <button type="submit" class="btn btn-default" name="driver_history">Next</button>
                </div>
            </div>
        </form>
    </body>
</html>
