<!DOCTYPE html>
<?php
    if(isset($_POST['address'])) {
        $url_end = "addresses";
        $post_info = array(
            "house_name_or_number" => $_POST['name_or_number'],
            "street_name" => $_POST['street_name'],
            "county" => $_POST['county'],
            "city" => $_POST['city'],
            "postcode" => $_POST['postcode']
        );   
        include 'communicate_with_underwriter.php';
        $list_of_errors = post_to_underwriter($post_info, $url_end);
        if ($list_of_errors == ''){
            header('Location: driver_history.php');
        }
        
    }
?>
<html>
    <head>
        <title>Address</title>
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
            <h2 class="form-group-heading">Address</h2>
            <p>Please fill in your address details carefully.</p>
            
            <div class="form-group">
                <?php if(isset($list_of_errors)) {echo $list_of_errors;} ?>
            </div>
            <div class="form-group">
                <label for="name_or_number" class="col-md-6 control-label">House name or number:</label>
                <input type="text" class="form-control" name="name_or_number" id="name_or_number">
            </div>
            <div class="form-group">
                <label for="street_name" class="col-md-6 control-label">Street name:</label> 
                <input type="text" class="form-control" name="street_name"  id="street_name">
            </div>
            <div class="form-group">
                <label for="county" class="col-md-6 control-label">County:</label> 
                <input type="text" class="form-control" name="county" id="county">
            </div>
            <div class="form-group">
                <label for="city" class="col-md-6 control-label">City:</label> 
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="form-group">            
                <label for="postcode" class="col-md-6 control-label">Postcode:</label> 
                <input type="text" class="form-control" name="postcode" id="postcode">    
            </div>
            <div class="form-group">
                <div  class="col-md-12 control-label">
                    <button type="submit" class="btn btn-default pull-right" name="address">Next</button>
                </div>
            </div>
        </form>
    </body>
</html>
