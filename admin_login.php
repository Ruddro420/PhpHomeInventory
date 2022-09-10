<?php

if(isset($_POST['submit'])) { 

  
  $user_name = $_POST['user_name'];
  
  
  $password = $_POST['password'];

 
// Add connection

$link = mysqli_connect("localhost", "root", "", "register_details");


// UserName And Email Checking Start

$user_check = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `user_name` = '$user_name';");


if(mysqli_num_rows($user_check) > 0 )
{

  $row = mysqli_fetch_assoc($user_check);

  if($row['password'] == $password)
  
  {


    session_start();

    $_SESSION['admin_user_page'] = $user_name ;
    header("Location:admin_add_cat.php");

  }

  else
  
  {
      $error_message = "Username or password not matching";
  }
  
}
  
  else 
  {
  
    $error_message = "Username or password not matching";
  
  }
  
  //Usename and Email Checking End




}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Login</title>
    <style>
      body
      {
        font-family: 'PT Sans Narrow', sans-serif;
      }
    </style>
</head>
<body>
<!--Main Body-->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card m-5 border shadow">
        <div class="card-body">
        <div class="container">
    <div style="margin:100px;" class="row">
        <div class="col text-center">
        <h1>Login Here</h1> <br>
        <h6 style="color: red; background:yellow; text-align:center;" ><?php if(isset($error_message)) echo $error_message; ?></h6>

<form method="post">
  <div class="form-group">
    
    <input type="text" class="form-control btn-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter UserName" name="user_name" required>
  </div> <br>
  <div class="form-group">
  
    <input type="password" class="form-control btn-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
  </div>
 <br>
 <input  class="btn btn-danger" type="submit" name="submit" value="Login Here"> <br> <br>
 <b>If you have not registered, <a href="register.php">Register Here</a> </b>
  
</form>


        </div>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
</div>








<!--JS FILE-->
<script src="https://kit.fontawesome.com/ee680e596f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>