<?php

$email = $_REQUEST['emails'];
echo $email;
$message = "Your friend made a wish by throwing coin in the fountain.";
$headers = "From: rathore.shakti1912@gmail.com";
$sent = mail($email,
     "HW5 Email check", 
     $message, $headers);

if($sent)
	{
		echo $sent;
	}

else
{
	echo "not sent";
}


