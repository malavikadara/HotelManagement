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
require 'config.php';

$name=$_SESSION['name'];
$products=$_SESSION['products'];
$email=$_SESSION['email']; 
$address=$_SESSION['address'];
$amount=$_SESSION['price'];

$phone=$_SESSION['phone'];

	  $data = '';
$stmt = $conn->prepare('INSERT INTO orders (name,email,phone,products,address,amount_paid)VALUES(?,?,?,?,?,?)');
	  $stmt->bind_param('ssssss',$name,$email,$phone,$products,$address,$amount);
	  $stmt->execute();	  
	  $stmt2 = $conn->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
	<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
<h4>Total Amount Paid : ' . $amount . '</h4>
<h4>Room Number : ' . $address . '</h4>
						  </div>';
	  echo $data;
	
?>