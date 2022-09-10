<?php
session_start();

if(!isset($_SESSION['user_page'])){

    header("Location:login.php");

}
// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");

// Session Link
//Decode The Specific Data Transfer
$id = base64_decode($_GET['id']);

// Data Collect from Database

$user_data = mysqli_query($link, "SELECT * FROM `intentory_name` WHERE `uid` = '$id';");

//Fetch Data from Database
$user_row = mysqli_fetch_row($user_data);


if(isset($_POST['update'])) { 

    $Category = $_POST['Category'];
    
    $Name = $_POST['Name'];

    $Price = $_POST['Price'];
    
    

    $id =  $user_row['0'];

    $sql = "UPDATE `intentory_name` SET `Category`='$Category',`Name`='$Name',`Price`='$Price' WHERE `uid` = '$id'";
    $result = mysqli_query($link, $sql);
    if($result){
      echo "<script type='text/javascript'>alert('Update Successfully');location='user.php?page=alllist.php';</script>";
  }
  
  else{
      echo "<script type='text/javascript'>alert('Something Wrong !!');location='user.php?page=alllist.php';</script>";
  }
    
    
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet"> 
    <title>User</title>
    <style>
        body
        
        {
            font-family: 'PT Sans Narrow', sans-serif;

        }
    </style>
</head>


<body>
   
<nav class="navbar-light bg-light ps-5 p-2 pe-5 text-center">
            <div class="container">
            
              <a class="navbar-brand text-center p-4" href="user.php">Home InVentory</a>
 
  
</nav>

<div class="container">
    <div class="row mt-5">
        <div class="col border shadow p-5">
            <form  method="post">
        <table class="table">

<tbody class="border bg-light p-5">
    <h4>InVentory Edit Here</h4>
  <tr>
    <td>InVentory Id</td>
    <td><?= $user_row['0']?></td>
  </tr>
  <tr>
    <td>Category Name</td>
    <td><input type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['2']?>" name="Category"></td>
  </tr>
  <tr>
    <td>Item Name</td>
    <td><input type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['3']?>" name="Name"></td>
  </tr>
  <tr>
    <td>Price <b>(Taka)</b></td>
    <td><input min="0.00" max="10000.00" step="0.01" type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['4']?>" name="Price"></td>
  </tr>

  
</tbody>

</table>
<input type="submit" name="update" class="btn btn-danger" value="Update InVentory">
</form>
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>