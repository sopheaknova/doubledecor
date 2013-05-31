<?php
	$email_text = array();
	foreach($_POST as $key => $value){
		if($value != ""){
			$email_text[str_replace("_", " ",$key)] = stripcslashes($value);					
		}
	}
	$name = $email_text['name'];
	$email = $email_text['email'];
	$subject = $email_text['subject'];
	$to = "dd_indes@yahoo.com";
	$message = $email_text['message'];
	
	$headers = "From: ". $name . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	if(mail($to, $subject, $message, $header))
	{
		echo '<h4 align="center">Thank you! Your anquiry was sent successfully. We will try to get back to you shortly</h4>';
	}else{
		echo "Couldn\'t send email. Please try emailing me from your own account. Thank you.";
	}

?>