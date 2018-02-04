<?php
if(isset($_POST["submit"])){
// Assigning variables for the hmtl inputs
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$human = intval($_POST['human']);

// Additional variables required to send email
$from = 'Simple Contact Form';
$to = 'noblejoeuc@gmail.com';
$subject = 'Message from Simple Contact Form';
$body = "From: $name\n Email: $email\n Message:\n $message";

// Creating conditional statement for form validation
if(!$_POST['name']){
  $errName = 'Please enter your name';
}

// Checks if email field is empty and if it is a valid email
if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  $errEmail = 'Please enter a valid email address';
}

if(!$_POST['message']){
  $errMessage = 'Please enter a message';
}

// Checks if the spamquestion is correctly answered
if($human !== 5){
  $errHuman = 'Your anti-spam is incorrect';
}
// If there are no errors, send the Email
if(!$errName && !$errEmail && !$errMessage && !$errHuman){
  if(mail($to, $subject, $body, $from)){
    $result = '<div class="alert alert-success"> Thank You! We shall get in touch as soon as possible. </div>';

  }else{
    $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again. </div>';
  }
}
}
?>
