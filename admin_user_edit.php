<?php

// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");

//Decode The Specific Data Transfer
$id = base64_decode($_GET['id']);

// Data Collect from Database

$user_data = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `id` = '$id';");

//Fetch Data from Database
$user_row = mysqli_fetch_row($user_data);


if(isset($_POST['update'])) { 

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$user_name = $_POST['user_name'];

$email = $_POST['email'];

$password = $_POST['password'];

$status = $_POST['status'];

$message = "Data Update";
    
$id =  $user_row['0'];



// UserName And Email Checking Start

$user_check = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `user_name` = '$user_name';");
$email_check = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `email_address` = '$email';");

if(mysqli_num_rows($user_check) == 0){

  // Start Inner Loop For Email Checking
    
  if(mysqli_num_rows($email_check) == 0)
  {
  
   
  //Data Insertion Start

  $sql = "UPDATE `user_information_for_shop` SET `first_name`='$first_name',`last_name`='$last_name',`user_name`='$user_name',`email_address`='$email',`password`='$password',`status`='$status' WHERE `id` = '$id'";
  $result = mysqli_query($link, $sql);


  if($result){
    echo "<script type='text/javascript'>alert('Update Successfully');location='admin_dash.php#user';</script>";
}

else{
    echo "<script type='text/javascript'>alert('Something Wrong !!');location='admin_dash.php#user';</script>";
}
  //Data Insertion End
    
  }
  
  else 
  {
      
      $email_error = "This Email Has Already Exits. Please Use another one";
  }
  
  //End Inner Loop For Email Checking 
  
  }
  
  else 
  {
  
  $user_error = "This UserName Has Already Exits. Please Use another one";
  
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
            
              <a class="navbar-brand text-center p-4" href="admin_dash.php">Admin User Edit</a>
 
  
</nav>

<div class="container">
    <div class="row mt-5">
        <div class="col border shadow p-5">
            <form  method="post">
        <table class="table">

<tbody class="border bg-light p-5">
    <h4>InVentory Edit Here</h4>
    <h6 style="color: red; background:yellow; text-align:center;" ><?php if(isset($email_error)) echo $email_error; ?></h6>
    <h6 style="color: red; background:yellow; text-align:center;" ><?php if(isset($user_error)) echo $user_error; ?></h6>
  <tr>
    <td>Account Id</td>
    <td><?= $user_row['0']?></td>
  </tr>
  <tr>
    <td>First Name</td>
    <td><input type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['1']?>" name="first_name"></td>
  </tr>
  <tr>
    <td>Last Name Name</td>
    <td><input type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['2']?>" name="last_name"></td>
  </tr>
  <tr>
    <td>User Name</td>
    <td><input type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['3']?>" name="user_name"></td>
  </tr>
  <tr>
    <td>Email Address</td>
    <td><input type="email" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['4']?>" name="email"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['5']?>" name="password"></td>
  </tr>

  <tr>
    <td>Status</td>
    <td><input min="0" max="1" type="number" class="form-control btn-md" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['6']?>" name="status"></td>
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