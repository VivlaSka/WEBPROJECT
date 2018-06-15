<?php
// Waar ik dit heb gevonden https://stackoverflow.com/questions/8239782/how-to-create-an-email-form-that-can-send-email-using-html
$errors = '';
$myemail = 'matheo.dexelle@student.ehb.be';
if(empty($_POST['fullName'])  ||
   empty($_POST['email']) ||
   empty($_POST['msg']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['fullName'];
$email_address = $_POST['email'];
$message = $_POST['msg'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Message from: $name";
$email_body = "Someone left a message on the your store: ".
"Name: $name \n ".
"Email: $email_address\n Message: \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: contact-submitted.php ');
}
?>