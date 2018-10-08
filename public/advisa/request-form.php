<?php
	$to="company.email";/*Your Email*/
	$subject="Message from the Landing - Request Form";

	$date=date("l, F jS, Y");
	$time=date("h:i A");

	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$message=$_REQUEST['message'];
	$check=$_REQUEST['check'];
	$resCaptca=$_REQUEST['resultCaptcha'];

	$msg="
		Message sent from website form on date  $date, hour: $time.\n
		First Name: $name\n
		Email: $email\n
		Message: $message
		";
	if($email=="") {
	echo "<div class='alert alert-danger'>
			  <a class='close' data-dismiss='alert'>×</a>
			  <strong>Warning!</strong> Please fill all the fields.
		  </div>";
	} else if ($check !== $resCaptca) {
	mail($to,$subject,$msg,"From:".$email);
	echo "<div class='alert alert-danger'>
			  <a class='close' data-dismiss='alert'>×</a>
			  <strong>Wrong captcha!</strong>
		  </div>";
	} else {
	mail($to,$subject,$msg,"From:".$email);
	echo "<div class='alert alert-success'>
			  <a class='close' data-dismiss='alert'>×</a>
			  <strong>Thank you for your message!</strong>
		  </div>";
	}



?>
