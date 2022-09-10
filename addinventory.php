<?php

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


$inv_data = mysqli_query($link, "SELECT * FROM `intentory_name` WHERE `id` = '$id';");



if(isset($_POST['add'])) { 

    $category = $_POST['category'];
    
    $item = $_POST['item'];

    $price = $_POST['price'];
    
    

    $id =  $user_row['0'];

    $uid = $id;

    $sql = "INSERT INTO `intentory_name`(`id`,`Category`, `Name`, `Price` ) VALUES ('$id','$category','$item','$price');";
    $result = mysqli_query($link, $sql);


     if($sql){

         echo "<h6>Add InVentory Sucesfully  <a class='btn btn-danger ms-5' href='user.php?page=alllist.php'>View Here</a></h6>";
     }

     else {
         echo "Change not Working";
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

        h6{
            background: #68C17D;
            color: white;
            padding: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }
        body
        
        {
            font-family: 'PT Sans Narrow', sans-serif;

        }
    </style>
</head>


<body>

<div class="container">
    <div class="row">
        <div class="col border shadow p-5">
            <form  method="post">
        <table class="table">

<tbody class="border bg-light p-5">
    <h4>Add InVentory Here</h4> <hr>
 
  <tr>
    <td>Inventory Category</td>
    <td><input type="text" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="category"></td>
  </tr>
  <tr>
    <td>Inventory Name</td>
    <td><input type="text" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="item"></td>
  </tr>
  <tr>
    <td>Inventory Price <b>(Taka)</b></td>
    <td><input min="0.00" max="10000.00" step="0.01" type="number" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="price"></td>
  </tr>

</tbody>

</table>
<input type="submit" name="add" class="btn btn-danger" value="Add Now">
</form>
        </div>
    

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>