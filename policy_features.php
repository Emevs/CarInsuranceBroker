<!DOCTYPE html>
<?php
    if(isset($_POST['policy_features'])) {
        $url_end = "policy_features";
        $post_info = array(
            "policy_excess" => $_POST['policy_excess'],
            "breakdown_cover" => $_POST['breakdown_cover'],
            "windscreen_repair" => $_POST['windscreen_repair'],
            "windscreen_excess" => $_POST['windscreen_excess']
        );   
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors == ''){
            header('Location: quote_details.php');
        }
        
    }
?>
<html>
    <head>
        <title>Policy Features</title>
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
            <h2 class="form-group-heading">Policy Features</h2>
            <p>Please fill in your policy features carefully.</p>
            
            <div class="form-group">
                <?php if(isset($list_of_errors)) {echo $list_of_errors;} ?>
            </div>
            <div class="form-group">
                <label for="policy_excess" class="col-md-6 control-label">Policy Excess:</label>
                <input type="text" class="form-control" name="policy_excess" id="policy_excess">
            </div>
            <div class="form-group">
                <label for="breakdown_cover" class="col-md-6 control-label">Breakdown cover:</label> 
                <input type="text" class="form-control" name="breakdown_cover"  id="breakdown_cover">
            </div>
            <div class="form-group">
                <label for="windscreen_repair" class="col-md-6 control-label">Windscreen repair:</label> 
                <input type="text" class="form-control" name="windscreen_repair" id="windscreen_repair">
            </div>
            <div class="form-group">
                <label for="windscreen_excess" class="col-md-6 control-label">Windscreen excess:</label> 
                <input type="text" class="form-control" name="windscreen_excess" id="windscreen_excess">
            </div>
            <div class="form-group">
                <div  class="col-md-12 control-label">
                    <button type="submit" class="btn btn-default pull-right" name="policy_features">Next</button>
                </div>
            </div>
        </form>
    </body>
</html>
