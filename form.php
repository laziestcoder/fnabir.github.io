<?php

$result="";
if(!isset($_POST['submit']))
{
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username='asianliftbdctg@gmail.com';
	$mail->Password='abcdefghijklmnoprstuvwxyz';
	
	$mail->setFrom($_POST['mail'],$_POST['name']);
	$mail->addAddress('asianliftbangladesh@gmail.com');
	$mail->addReplyTo($_POST['email'],$_POST['name']);
	
	$mail->isHTML(true);
	$mail->Subject='Form Submission: '.$_POST['subject'];
	$mail->Body='<h4 align=left>Name : '.$_POST['name'].'<br>Email : '.$_POST['email'].'<br>Contact Number : '.$_POST['phone'].'<br>Email : '.$_POST['email'].'<br>Message : '.$_POST['message'].'</h4>'
	
	if(!$mail->send()){
		&result="Something went wrong. Please try again.";
	}
	else{
		&result="Thanks ".$_POST['name']." for contacting us. We'll get back to you soon!"
	}
}
   
?> 