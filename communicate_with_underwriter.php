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
        echo "return: ";
        var_dump($underwriter_return); 
       
        return $underwriter_return;
    }
    
    function process_post_return($return){
        $post_return = '';
        if(isset($return)) {
            $post_success = check_successful_post($return);

            if (!$post_success) {
                $post_return = handle_errors($return);
            } elseif (!isset($_SESSION['uuid'])) {
                $post_return = get_uuid($return);
            }            
        }
        return $post_return;
        
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
        $error_list_html = '<div class="alert alert-danger"> <ul>';
        foreach($errors as $error_key => $error_messages) {
            foreach($error_messages as $error) {
                $error_list_html .= "<li>".  str_replace('_', ' ',ucfirst($error_key)).' '.$error."</li>";
            }
        }
        $error_list_html .= '</ul></div>';
        return $error_list_html;
    }
    
    function get_uuid($return){
        $uuid = '';
        foreach($return as $key => $value) {
            if(is_string($value)) {
                if(strstr($key, "uuid")) {
                    $_SESSION['uuid'] = $value;
                }
            }
        }
        return $_SESSION['uuid'];
    }
    
    function get_from_underwriter($get_params, $url_end) {
        $connection = curl_init();
        $url = "localhost:3000/".$url_end;
        // Just use default header information of other options.
        $header = array('HTTP_ACCEPT' => "application/json");
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_HTTPGET, 1);
        curl_setopt($connection, CURLOPT_POSTFIELDS, $get_params);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);

        // Convert returned JSON object to something useable by PHP
        $underwriter_return = json_decode(curl_exec($connection), true);
        curl_close($connection);
        echo "return: ";
        var_dump($underwriter_return); 
       
        return $underwriter_return;
    }
    
    
?>