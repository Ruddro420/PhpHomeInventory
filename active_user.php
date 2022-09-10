<?php

// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");

//Decode The Specific Data Transfer
$id = $_GET['id'];


// Data Collect from Database

$user_data = mysqli_query($link, "SELECT * FROM `user_information_for_shop` WHERE `id` = '$id';");

//Fetch Data from Database
$user_row = mysqli_fetch_row($user_data);

$id = ($user_row['0']);




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

<nav class="navbar-light bg-light ps-5 p-2 pe-5 text-center">
            <div class="container">
            
              <a class="navbar-brand text-center p-4" href="#">Home InVentory</a>
 
  
</nav>


<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 text-center mt-5 mb-5">

        <table class="table">

<tbody class="border bg-light p-5">
    
<div>
<a style="display:block;" type="submit" class="btn btn-outline-danger btn-lg btn-block" href="#" disabled>Dashboard</a>
</div>
  
  <br>
  <div>
<a style="display:block;" type="submit" class="btn btn-outline-secondary me-auto btn-lg" href="#" disabled>View Profile</a>
</div>
<br>
  <div>
  <a style="display:block;" type="submit" class="btn btn-outline-success me-auto btn-lg" href="#">Add Inventory</a>
  </div>
  
  <br>
<div>
<a style="display:block;" type="submit" class="btn btn-outline-info me-auto btn-lg" href="#" >Inventory List</a>
</div>
<br>
<div>
<a style="display:block;" class="btn btn-success btn-lg" href="active_user_fianl.php?id=<?php echo base64_encode($user_row['0'])?>">Active Account Now</a>
</div>
 
</tbody>

</table>


        
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 mt-md-5 text-center text-danger">
                <h3><b>Please Active Your Account First</b> </h3>
                <img src="alert.png" height="auto" width="300px" alt="">
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

