<?php 

// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");

//Decode The Specific Data Transfer
$id = base64_decode($_GET['id']);

$result = mysqli_query($link,"DELETE FROM `intentory_name` WHERE `uid` = $id;");

if($result){
    echo "<script type='text/javascript'>alert('Delete Successfully');location='user.php?page=alllist.php';</script>";
}

else{
    echo "<script type='text/javascript'>alert('Something Wrong !!');location='user.php?page=alllist.php';</script>";
}
   


?>