<?php
include "connection.php";
session_start();
$user=$_SESSION['name'];
$ro=$_SESSION['room'];
$in=$_SESSION['cin'];
$out=$_SESSION['cout'];
$stmt = $conn->prepare('insert into details(id,name,check_in,check_out) values(:room,:user,:chin,:chout)');
    $stmt->bindParam(':room', $ro);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':chin', $in);
    $stmt->bindParam(':chout', $out);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE rooms SET status = 'occupied' WHERE id = :room");
$stmt->bindParam(':room', $ro);
$stmt->execute();
echo 'Booking Succesful';

?>