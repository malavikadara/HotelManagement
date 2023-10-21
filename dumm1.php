<?php

include "connection.php";
$sql = 'SELECT id from rooms where type= Occupied';
$result= mysqli_query($conn,$sql);
$optionArray= array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($optionArray,$row);
    }
}
print_r(optionArray);
?>