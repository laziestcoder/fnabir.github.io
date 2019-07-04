<?php

if(isset($_POST['submit']))
{
	 $name = $_POST['name'];
	 $mailFrom = $_POST['mail'];
	 $phone = $_POST['phone'];
	 $district = $_POST['district'];
	 $message = $_POST['message'];
	 $mailTo = "asianliftbangladesh@gmail.com"
	 $headers = "From: ".$mailFrom;
	 $txt = "You have received an e-mail from ".$name.".\n".$phone.".\n".$district.".\n\n".$message;
	 mail($mailTo, $subject, $txt, $headers);
	 header("Location: index.php?mailsend");
}
?>