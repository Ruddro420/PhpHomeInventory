<?php


// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");



if(isset($_POST['add'])) { 

    $id = $_POST['id'];

    $category = $_POST['category'];
    
    $item = $_POST['item'];

    $price = $_POST['price'];
    
    // UserName And Email Checking Start

$user_check = mysqli_query($link, "SELECT * FROM `intentory_name` WHERE `id` = '$id';");

if(mysqli_num_rows($user_check) > 0)
{

  //Data Insertion Start

 
  $sql = "INSERT INTO `intentory_name`(`id`,`Category`, `Name`, `Price` ) VALUES ('$id','$category','$item','$price');";
  $result = mysqli_query($link, $sql);


  if($result){
    echo "<script type='text/javascript'>alert('Add Successfully');location='admin_dash.php#cat';</script>";
}

else{
    echo "<script type='text/javascript'>alert('Something Wrong !!');location='admin_dash.php#cat';</script>";
}
  //Data Insertion End
  
}

else 
{
    
    $email_error = "Account Id Wrong . Please Enter The Right Account ID";
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

<nav class="navbar-light bg-light ps-5 p-2 pe-5 text-center">
            <div class="container">
              <a class="navbar-brand text-center p-4" href="admin_dash.php">Admin InVentory And Category</a>
 
  
</nav>
<br><br>
<div class="container">
    <div class="row">
        <div class="col border shadow p-5">
            <form  method="post">
        <table class="table">

<tbody class="border bg-light p-5">
    <h4>Add InVentory And Category Here</h4> <hr>
    <h6 style="color: red; background:yellow; text-align:center;" ><?php if(isset($email_error)) echo $email_error; ?></h6>
    <tr>
    <td>Account Id</td>
    <td><input type="number" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="id"></td>
  </tr>
  
    <tr>
    <td>Inventory Category</td>
    <td><input type="text" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="category" value="<?php if(isset($category)) echo $category ?>"></td>
  </tr>
  <tr>
    <td>Inventory Name</td>
    <td><input type="text" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="item" value="<?php if(isset($item)) echo $item ?>"></td>
  </tr>
  <tr>
    <td>Inventory Price</td>
    <td><input min="0.00" max="10000.00" step="0.01" type="number" class="form-control btn-md" required id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="<?php if(isset($price)) echo $price ?>"></td>
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