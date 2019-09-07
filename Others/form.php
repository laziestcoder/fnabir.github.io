<?php

$result="";
require 'phpmailer/PHPMailerAutoload.php';
if(!isset($_POST['submit']))
{
$email = $_POST['email'];
$phone = $_POST['phone'];
$name = $_POST['name'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$thankyou_page = "thanks.html";
	
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username='asianliftbdctg@gmail.com';
$mail->Password='abcdefghijklmnoprstuvwxyz';
	
	$mail->setFrom($_POST['mail'],$_POST['name']);
	$mail->addAddress('asianliftbangladesh@gmail.com');
	$mail->addReplyTo($_POST['email'],$_POST['name']);
	
	$mail->isHTML(true);
	$mail->Subject='Form Submission: '.$_POST['subject'];
	$mail->Body='<h4 align=left>Name : '.$_POST['name'].'<br>Email : '.$_POST['email'].'<br>Contact Number : '.$_POST['phone'].'<br>Email : '.$_POST['email'].'<br>Message : '.$_POST['message'].'</h4>'
	
	if(!$mail->send()){
		header( "Location: $thankyou_page" );
	}
	else{
		header( "Location: $thankyou_page" );
	}
}
   
?> 