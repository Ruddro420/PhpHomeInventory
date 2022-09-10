<?php
// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");

//Decode The Specific Data Transfer
$id = base64_decode($_GET['id']);


// Data Collect from Database

$user_data = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `id` = '$id';");

//Fetch Data from Database
$user_row = mysqli_fetch_row($user_data);

$id = ($user_row['0']);

$sql = "UPDATE `user_information_for_shop` SET `status`= 1 WHERE `id` = '$id'";

    $result = mysqli_query($link, $sql);

    if($result){

      echo "<script type='text/javascript'>alert('Account Active Successfully !! Please Login ');location='login.php';</script>";
  }
  
  else{
      echo "<script type='text/javascript'>alert('Something Wrong !!');location='user.php?page=profile.php';</script>";
  }
    
?>

