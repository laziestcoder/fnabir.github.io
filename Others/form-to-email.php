<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "Error: You need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['mail'];
$phone = $_POST['phone'];
$district = $_POST['district'];
$message = $_POST['message'];

if(empty($name)||empty($visitor_email)||empty($phone)) 
{
    echo "Name, E-mail and Contact No. are mandatory";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Invalid e-mail address!";
    exit;
}

$email_from = asianliftbangladesh@gmail.com
$email_subject = "New Form submission $name.";
$email_body = "You have received a new message from the user $name.\n".
	"Phone: $phone\n".
	"District: $district\n".
    "Here is the message:\n $message".
    
$to = asinaliftbangladesh@gmail.com
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');

function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 