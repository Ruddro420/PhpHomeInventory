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
    <div class="row mt-5 mb-5">
        <div class="col-lg-6 col-md-4 col-sm-12 text-center mt-md-5 mb-5 border shadow p-5">
        <table class="table">

<tbody class="border bg-light p-5">
    
<div>
<a style="display:block;" type="submit" class="btn btn-outline-danger btn-lg btn-block" href="user.php?page=dashboard.php">Dashboard</a>
</div>
  
  <br>
  <div>
<a style="display:block;" type="submit" class="btn btn-outline-secondary me-auto btn-lg" href="user.php?page=profile.php">View Profile</a>
</div>
<br>
  <div>
  <a style="display:block;" type="submit" class="btn btn-outline-success me-auto btn-lg" href="user.php?page=addinventory.php">Add Inventory</a>
  </div>
  
  <br>
<div>
<a style="display:block;" type="submit" class="btn btn-outline-info me-auto btn-lg" href="user.php?page=alllist.php">Inventory List</a>
</div>
<br>
<div>
<a style="display:block;" class="btn btn-dark btn-lg ml-auto" href="logout.php">Logout</a>
</div>

<br>
<div>
<a style="display:block;" class="btn btn-danger btn-lg ml-auto" href="deactive_user.php">Deactive Account</a>
</div>
 
</tbody>

</table>

<!--Start New Modal Here-->


<?php


if(!isset($_SESSION['user_page'])){

    $messsage = "Update Successfully";

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


if(isset($_POST['update'])) { 

    $first_name = $_POST['first_name'];
    
    $last_name = $_POST['last_name'];
    
    $id =  $user_row['0'];

    $sql = "UPDATE `user_information_for_shop` SET `first_name`='$first_name',`last_name`='$last_name' WHERE `id` = '$id'";
    $result = mysqli_query($link, $sql);
     if($sql){
        
         header("Location:user.php");
     }

     else {
         echo "Change not Working";
     }
    
    
}

?>

<!-- Button trigger modal -->

        </div>
        <div class="col-lg-6 col-md-8 col-sm-12 text-center mt-5 mb-5">

        <h3 class="text-center">Hello, <?= $user_row['3']?>. Welcome To Home InVentory!</h3> <br>


        
           
            <?php

            if(isset($_GET['page'])){
              $page = $_GET['page'];
            }
            else $page = "user.php";
            
         
          if(file_exists($page)){

            require_once $page;
          }
            
            
            ?>

            
           

        </div>
    

    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



</body>
</html>