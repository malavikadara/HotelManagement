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
	$mail->Username = "daramalavika2@gmail.com";
//Set gmail password
	$mail->Password = "saykwgqwqznhksns";
//Email subject
	$mail->Subject = "Hotel Cielo";
//Set sender email
	$mail->setFrom('daramalavika2@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('Successfully order');
//Email body
$products=$_SESSION['products']; 
	$mail->Body = "<h3>Your Order<br> $products has been confirmed</h3> <br>Thanks for ordering";
//Add recipient
$email=$_SESSION['email']; 
	$mail->addAddress($email);
$name=$_SESSION['name'];
$products=$_SESSION['products'];
$address=$_SESSION['address'];
$phone=$_SESSION['phone'];

$amount=$_SESSION['price'];


//Finally send email
	if ( $mail->send() ) {
	header("location:http://localhost/project%20cielo/shopping-cart/final.php?success");
	}else{
		echo "Message could not be sent. Mailer Error: "($mail->ErrorInfo);
	}
//Closing smtp connection
	$mail->smtpClose();
