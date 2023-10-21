<?php
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\Users\Dara Malavika\Desktop\xampp\PHPMailer-FE_v4.11/src/Exception.php;';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){


$mail= new PHPMailer(true);


$mail->isSMTP();


$mail->Host= "smtp.gmail.com";


$mail->SMTPAuth = true;

$mail->Username = "daramalavika2@gmail.com "  ; 

$mail->Password = " zjtotytoklzgyxew " ;
  $mail->SMTPSecure = 'ss1';


$mail->Port = 465;


$mail->setFrom("daramalavika2@gmail.com");



$mail->addAddress($_POST["email"]);


$mail->isHTML(true);


$mail->Subject = $_POST["subject"];


$mail->Body = $_POST["message"];
$mail->SMTPSecure='ssl';

$mail->Port =465;
$mail->setFrom("daramalavika2@gmail.com");

$mail->addAddress($_POST["email"]);

$mail->isHTML(true);

$mail->Subject = $_POST["subject"];

$mail->Body= $_POST["message"];

$mail->send();



echo
"
<script>


alert('Sent Successfully');

document.location.href='email.php';


</script>
";


}
?>

