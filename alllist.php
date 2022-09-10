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

<div class="container">
    <div class="row">
        <div class="col border shadow p-sm-2 p-md-5">
            <form  method="post">
            <h4>My InVentory List</h4> <hr>
        <table class="table">


        <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Price (TAKA) </th>
    </tr>
  </thead>

<tbody class="border bg-light p-5">

<?php

$inv_data = mysqli_query($link, "SELECT * FROM `intentory_name` WHERE `id` = '$id';");


while($row = mysqli_fetch_assoc($inv_data)){?>



  <tr>
    <td><?php echo $row['uid'] ?></td>
    <td><?php echo $row['Category']?></td>
    <td><?php echo $row['Name']?></td>
    <td><?php echo number_format($row['Price'],2)."<br>"?></td>
    <td><a class="btn btn-dark mt-2" href="editinv.php?id=<?php echo base64_encode($row['uid'])?>">Edit</a><a class="btn btn-success text-center mt-2 ms-3" href="deleteinv.php?id=<?php echo base64_encode($row['uid']) ?>">Delete</a></td>
  </tr>

  <?php

}

?>

</tbody>

</table>
</form>
        </div>
    

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>