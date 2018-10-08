<?php
	$to="company.email";/*Your Email*/
	$subject="Message from the Landing - Contact Form ";

	$date=date("l, F jS, Y");
	$time=date("h:i A");

	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$caoch=$_REQUEST['caoch'];
	$file=$_REQUEST['file'];


	$msg="
		Message sent from Landing Contact Form on date  $date, hour: $time.\n
		First Name: $name\n
		Email: $email\n
		Phone: $phone\n
		Caoch: $caoch\n
		File: $file
		";
	if($email=="") {
	echo "<div class='alert alert-danger'>
			  <a class='close' data-dismiss='alert'>×</a>
			  <strong>Warning!</strong> Please fill all the fields.
		  </div>";
	} else {
	mail($to,$subject,$msg,"From:".$email);
	echo "<div class='alert alert-success'>
			  <a class='close' data-dismiss='alert'>×</a>
			  <strong>Thank you for your message!</strong>
		  </div>";
	}


?>
