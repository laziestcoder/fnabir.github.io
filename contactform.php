<?php

if(!isset($_POST['submit']))
{
	echo "Error: You need to submit the form!";
}
	 $name = $_POST['name'];
	 $mailFrom = $_POST['mail'];
	 $phone = $_POST['phone'];
	 $district = $_POST['district'];
	 $message = $_POST['message'];
	 if(empty($name)||empty($mailFrom)||empty($message))
	 {
		 echo "Name, E-mail and Message are mandatory";
		 exit;
	 }
	 
	 $mailTo = "asianliftbangladesh@gmail.com"
	 $headers = "From: ".$mailFrom;
	 $txt = "You have received an e-mail from ".$name.".\n".$phone.".\n".$district.".\n\n".$message;
	 mail($mailTo, $subject, $txt, $headers);
	 header("Location: index.php?mailsend");
?>