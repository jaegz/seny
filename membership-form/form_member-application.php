<?php
    if ($_POST) {
        $to = "form@safetyexecutivesny.org";
        $subject = "New form submission from:";
        //$name = $_POST['name'];
        //$email = $_POST['email'];
        
        // this needs to be all the form data
        // $message = $_POST['text'];
        $message = "this is a test";
        
        $headers = array('Content-Type: text/html; charset=UTF-8');

        //send email
        // wp_mail( $to, $subject, $message, $headers, $attachments );
        // wp_mail($to, $subject, strip_tags($message), $headers);
        wp_mail($to, $subject, $message, $headers);
    }
?>