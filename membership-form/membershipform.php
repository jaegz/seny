<?php
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['text'];

//send email
    mail("email@gmail.com", "This is an email from:" .$email, $message);
}
?>