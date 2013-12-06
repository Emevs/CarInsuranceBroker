<?php
    function post_to_underwriter($post_info, $url_end) {
        $connection = curl_init();
        $url = "localhost:3000/".$url_end;
        // Just use default header information of other options.
        $header = array('HTTP_ACCEPT' => "application/json");
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_POST, 1);
        curl_setopt($connection, CURLOPT_POSTFIELDS, $post_info);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);

        // Convert returned JSON object to something useable by PHP
        $underwriter_return = json_decode(curl_exec($connection), true);
        curl_close($connection);
        var_dump($underwriter_return);
        $error_list = '';
        if(isset($underwriter_return)) {
            $post_success = check_successful_post($underwriter_return);

            if (!$post_success) {
                $error_list = handle_errors($underwriter_return);
            } 
        }
        
        return $error_list;
    }
    
    function check_successful_post($return) {
        $success = false;
        foreach($return as $key => $value) {
            if(is_string($value)) {
                if(strstr($key, "created_at")) {
                    $success = true;
                }
            }
        }
        return $success;
    }
    
    function handle_errors($errors) {
        $error_list = '<div class="alert alert-danger"> <ul>';
        foreach($errors as $key => $error_messages) {
            foreach($error_messages as $error) {
                $error_list .= "<li>".  str_replace('_', ' ',ucfirst($key)).' '.$error."</li>";
            }
        }
        $error_list .= '</ul></div>';
        return $error_list;
    }
?>