<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<?php
session_start();
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
	$mail->Password = "qfisksfggnatmejz";
//Email subject
	$mail->Subject = "Hotel Cielo";
//Set sender email
	$mail->setFrom('pavandurgasairam24@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('Successfully order');
//Email bod
    $room=$_SESSION['room'];
    $amount=$_SESSION['price'];
	$mail->Body = "<h3>Booking Sucessful<br> ROOM NO  $room has been confirmed</h3> Total amount $amount <br>";
//Add recipient
$email=$_SESSION['email']; 
	$mail->addAddress($email);
$name=$_SESSION['name'];



//Finally send email
	if ( $mail->send() ) {
	header("location:http://localhost/project cielo/final2.php?success");
	}else{
		echo "Message could not be sent. Mailer Error: "($mail->ErrorInfo);
	}
//Closing smtp connection
	$mail->smtpClose();