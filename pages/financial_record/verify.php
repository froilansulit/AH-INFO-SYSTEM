<?php

	// require "mail.php";


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';

	function send_mail($recipient,$subject,$message)
	{

		$mail = new PHPMailer();
		$mail->IsSMTP();

		$mail->SMTPDebug  = 0;  
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = "swapandgo2023@gmail.com";
		$mail->Password   = "yhnecknkholgrrju";

		$mail->IsHTML(true);
		$mail->AddAddress($recipient, "esteemed customer");
		$mail->SetFrom("swapandgo2023@gmail.com", "OTP VERIFICATION");
		//$mail->AddReplyTo("reply-to-email", "reply-to-name");
		//$mail->AddCC("cc-recipient-email", "cc-recipient-name");
		$mail->Subject = $subject;
		$content = $message;

		$mail->MsgHTML($content); 
		if(!$mail->Send()) {
			//echo "Error while sending Email.";
			//echo "<pre>";
			//var_dump($mail);
			return false;
		} else {
			//echo "Email sent successfully";
			return true;
		}

		// swapandgo2023@gmail.com
	//  pass: swapngo2023	

	}
	

	// if($_SERVER['REQUEST_METHOD'] == "POST"){
	// 	echo 'working';
	
	// }

	if(isset($_POST['verifyEmail'])) {
		// echo "Welcome";

		$code = rand(100, 1000);

		$message = "your code is " .$code;
		$subject = "Email verification";
		$recipient = "mallari.r.bscs@gmail.com";
		send_mail($recipient,$subject,$message);
	}

	// if($_SERVER['REQUEST_METHOD'] == "POST"){

	// 	if(!check_verified()){

	// 		$query = "select * from verify where code = :code && email = :email";
	// 		$vars = array();
	// 		$vars['email'] = $_SESSION['USER']->email;
	// 		$vars['code'] = $_POST['code'];

	// 		$row = database_run($query,$vars);

	// 		if(is_array($row)){
	// 			$row = $row[0];
	// 			$time = time();

	// 			if($row ->expires > $time){

	// 				$id = $_SESSION['USER']->id;
	// 				$query = "update users set email_verify = email where id = '$id' limit 1";
					
	// 				database_run($query);

	// 				header("Location: profile.php");
	// 				die;
					
	// 			}else{
	// 				echo "Code expired";
	// 			}
				
	// 		}else{
	// 			echo "wrong code";
	// 		}
			
	// 	}else{
	// 		echo "You're already verified";
	// 	}
	// }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Verify</title>
</head>
<body>
	<!-- <center>
	<body background="bg.jpg">
	<font color="red"><h1>Verify</h1>

  
	<br><br>
 	<div>
			<h3><br>Email was sent to your address. paste the code from the email here<br></h3>
		<div>
	
		</div><br>
		<form method="post">
			<input type="text" name="code" placeholder="Enter your Code"><br>
 			<br>
			<input type="submit" value="Verify">
		</form>
	</div> -->

</body>
</html>