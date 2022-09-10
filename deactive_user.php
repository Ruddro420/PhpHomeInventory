<?php
session_start();

if(!isset($_SESSION['user_page'])){

    header("Location:login.php");

}
// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");

// Session Link
$session_user = $_SESSION['user_page'];

// Data Collect from Database

$user_data = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `user_name` = '$session_user';");

//Fetch Data from Database
$user_row = mysqli_fetch_row($user_data);

$id =  $user_row['0'];

$sql = "UPDATE `user_information_for_shop` SET `status`= 0 WHERE `id` = '$id'";

    $result = mysqli_query($link, $sql);

    if($result){

      echo "<script type='text/javascript'>alert('Deactive Successfully !! ');location='login.php';</script>";
  }
  
  else{
      echo "<script type='text/javascript'>alert('Something Wrong !!');location='user.php?page=profile.php';</script>";
  }
    
?>

