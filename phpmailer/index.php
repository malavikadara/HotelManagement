



<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "pavandurgasairam24@gmail.com";
//Set gmail password
	$mail->Password = "qonyyfmkrlhmdxbd";
//Email subject
	$mail->Subject = $_POST['subject'];

//Set sender email

	$mail->setFrom('durgasairam24@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
//Email body
$mail->Body = $_POST['message'];
//Add recipient
	$mail->addAddress('durgasairam24@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		header("location:http://localhost/project%20cielo/contact.php?Email Sent");
	}else{
		echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
	}
//Closing smtp connection
	$mail->smtpClose();
	?>