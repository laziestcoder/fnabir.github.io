<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Send email via Gmail SMTP server in PHP</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<meta name="robots" content="noindex, nofollow">
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-43981329-1']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script');
ga.type = 'text/javascript';
ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(ga, s);
})();
</script>
</head>
<body>
<div id="main">
<h1>Send email via Gmail SMTP server in PHP</h1>
<div id="login">
<h2>Gmail SMTP</h2>
<hr/>
<form action="index.php" method="post">
<input type="text" placeholder="Enter your email ID" name="email"/>
<input type="password" placeholder="Password" name="password"/>
<input type="text" placeholder="To : Email Id " name="toid"/>
<input type="text" placeholder="Subject : " name="subject"/>
<textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
<input type="submit" value="Send" name="send"/>
</form>
</div>
</div>
<?php
require 'PHPMailerAutoload.php';
if(isset($_POST['send']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$to_id = $_POST['toid'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {
echo '<p id="para">Message sent!</p>';
}
}
else{
echo '<p id="para">Please enter valid data</p>';
}
?>
</body>
</html>