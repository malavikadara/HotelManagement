<head>
<meta charset="UTF-8">
<meta name="author" content="Sahil Kumar">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Shopping Cart System</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
<link rel='stylesheet' href='style.css' />
</head>
<?php
  session_start();
require 'connection.php';

$user=$_SESSION['name'];
$ro=$_SESSION['room'];
$in=$_SESSION['cin'];
$out=$_SESSION['cout'];
$email=$_SESSION['email'];
$amount=$_SESSION['price'];
$model=$_SESSION['type'];
$data='';

$stmt = $conn->prepare('insert into details(id,name,check_in,check_out) values(:room,:user,:chin,:chout)');
$stmt->bindParam(':room', $ro);
$stmt->bindParam(':user', $user);
$stmt->bindParam(':chin', $in);
$stmt->bindParam(':chout', $out);
$stmt->execute();
$stmt = $conn->prepare("UPDATE rooms SET status = 'occupied' WHERE id = :room");
$stmt->bindParam(':room', $ro);
$stmt->execute();
    $data .= '<div class="text-center">
                              <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                              <h2 class="text-success">Booking Successful!</h2>
                              <h4 class="bg-danger text-light rounded p-2">Booking Details :  </h4>
                              <h4>Your Name : ' . $user . '</h4>
  <h4>Your E-mail : ' . $email . '</h4>
  <h4>Room No : ' . $ro . '</h4>
  <h4>Room Type : ' . $model . '</h4>
  <h4>Check in : ' . $in . '</h4>
  <h4>Check out : ' . $out . '</h4>

                            
<h4>Total Amount Paid : ' . $amount . '</h4>

                        </div>';
    echo $data;
  
?>