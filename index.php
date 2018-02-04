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


<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Simple Contact Form</title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   </head>
   <body>
     <div class="container">
       <div class="col-sm-6">
     <form class="form-horizontal" role="form" method="post" action="index.php">
       <div class="form-group">
         <label for="name" class="col-sm-2 control-label">Name</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" id="name" name="name" placeholder="First & Last name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
           <?php echo "<p class='text-danger'>$errName</p>";?>
         </div>
       </div>
       <div class="form-group">
         <label for="email" class="col-sm-2 control-label">Email</label>
         <div class="col-sm-10">
           <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
           <?php echo "<p class='text-danger'>$errEmail</p>";?>
         </div>
       </div>
       <div class="form-group">
         <label for="message" class="col-sm-2 control-label">Message</label>
         <div class="col-sm-10">
           <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']); ?></textarea>
           <?php echo "<p class='text-danger'>$errMessage</p>";?>
         </div>
       </div>
       <div class="form-group">
         <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
           <?php echo "<p class='text-danger'>$errHuman</p>";?>
         </div>
       </div>
       <div class="form-group">
         <div class="col-sm-10  col-sm-offset-2">
           <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
         </div>
       </div>
       <div class="form-group">
         <div class="col-sm-10 col-sm-offset-2">
           <!-- will be used to display an alert to the user -->
           <?php echo $result; ?>
         </div>
       </div>
     </form>
   </div>
 </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
 </html>
