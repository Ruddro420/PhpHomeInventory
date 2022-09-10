<?php


if(isset($_POST['submit'])) { 

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$user_name = $_POST['user_name'];

$email = $_POST['email'];

$password = $_POST['password'];

 
// Add connection

$link = mysqli_connect("localhost", "root", "", "register_details");


// UserName And Email Checking Start

$user_check = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `user_name` = '$user_name';");
$email_check = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `email_address` = '$email';");

if(mysqli_num_rows($user_check) == 0){

// Start Inner Loop For Email Checking
  
if(mysqli_num_rows($email_check) == 0)
{

  //Data Insertion Start

  $sql = "INSERT INTO `user_information_for_shop`(`first_name`, `last_name`, `user_name`, `email_address`, `password`) VALUES ('$first_name', '$last_name','$user_name','$email','$password')";
  $result = mysqli_query($link, $sql);


if($result){
    echo "<script type='text/javascript'>alert('Create Account Successfully');location='admin_dash.php';</script>";
}

else{
    echo "<script type='text/javascript'>alert('Something Wrong !!');location='admin_dash.php';</script>";
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
    <title>NavBar</title>
    
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
      <div class="card m-5 p-3 border shadow">
        <div class="card-body">
          
<div class="container">
    <div class="row">
        <div class="col text-center">
        <h1>Add Account Here</h1> <br>
     
<form method="post">
<div class="form-group">
    
    <input type="text" class="form-control btn-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" name="first_name" value="<?php if(isset($first_name)) echo $first_name ?>" required>
    <br>
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control btn-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" name="last_name" value="<?php if(isset($last_name)) echo $last_name ?>">
    <br>
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control btn-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="user_name" value="<?php if(isset($user_name)) echo $user_name ?>" required>
    <label style="color: red; background: yellow" class="mt-3 mb-1" for="exampleInputEmail1"><?php if(isset($user_error)){ echo $user_error;} ?></label>
    <br>
  </div>
  <div class="form-group">
    
    <input type="email" class="form-control btn-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="<?php if(isset($email)) echo $email ?>" required>
    <label style="color: red; background: yellow" class="mt-3 mb-1" for="exampleInputEmail1"><?php if(isset($email_error)){ echo $email_error ;} ?></label>
    <br>
  </div>
  <div class="form-group">
  
    <input type="password" class="form-control btn-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
  </div> <br>
  <input  class="btn btn-info" type="submit" name="submit" value="Add Account"> <br> <br>
  
 
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