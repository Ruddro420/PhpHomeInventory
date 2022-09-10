<?php


// Databse Connection
$link = mysqli_connect("localhost", "root", "", "register_details");






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
   
<nav class="navbar navbar-expand-lg navbar-light bg-light ps-5 pe-5">
            <div class="container">
  <a class="navbar-brand" href="#">InVentory</a>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ms-auto">
     
        <!--Demo Nav Bar-->

        <li class="nav-item me-5">
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-danger" href="#user">View Account</a>
      </li>

      <li class="nav-item me-5">
      <a type="submit" class="btn btn-danger me-auto" href="#inv">View Inventory</a>
      </li>

      <li class="nav-item me-5">
      <a type="submit" class="btn btn-danger me-auto" href="admin_add_account.php">Add Account</a>
      </li>

      <li class="nav-item me-5">
      <a type="submit" class="btn btn-danger me-auto" href="#cat">View Category</a>
      </li>
      <li class="nav-item me-5">
      <a type="submit" class="btn btn-danger me-auto" href="admin_add_cat.php">Add Category</a>
      </li>


    </ul>
  </div>
</nav>
<br><br><br><br>
<!--USer Details ###############-->

<div id="user" class="container">
    <div class="row">
        <div class="col border shadow p-5">
            <form  method="post">
            <h4>User List</h4> <hr>
            <h6 class="text-danger">Status : 1 = Active || 0 = Deactive</h6> <hr>
        <table class="table">


        <thead>
    <tr>
      <th scope="col">Account ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Name </th>
      <th scope="col">Email Address </th>
      <th scope="col">Password </th>
      <th scope="col">Status </th>
    </tr>
  </thead>

<tbody class="border bg-light p-5">

<?php



// Data Collect from Database
$user_data = mysqli_query($link, "SELECT * FROM `user_information_for_shop`");


//Fetch Data from Database
while($user_row = mysqli_fetch_row($user_data)){?>



  <tr>
    <td><?php echo $user_row['0'] ?></td>
    <td><?php echo $user_row['1']?></td>
    <td><?php echo $user_row['2']?></td>
    <td><?php echo $user_row['3']?></td>
    <td><?php echo $user_row['4']?></td>
    <td><?php echo $user_row['5']?></td>
    <td><?php echo $user_row['6']?></td>
    <td><a class="btn btn-dark" href="admin_user_edit.php?id=<?php echo base64_encode($user_row['0'])?>">Edit</a>
    <a class="btn btn-success ms-3" href="admin_user_delete.php?id=<?php echo base64_encode($user_row['0']) ?>">Delete</a></td>
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

<br><br>

<!--Inventory Details -->

<div id="inv" class="container">
    <div class="row">
        <div class="col border shadow p-5">
            <form  method="post">
            <h4>Inventory List</h4> <hr>
        <table class="table">


        <thead>
    <tr>
    <th scope="col">Product ID</th>
      <th scope="col">Account ID</th>
      <th scope="col">Inventory Category</th>
      <th scope="col">Inventory Name</th>
      <th scope="col">Inventory Price <b>(Taka)</b> </th>
    </tr>
  </thead>

<tbody class="border bg-light p-5">

<?php



// Data Collect from Database
$user_data = mysqli_query($link, "SELECT * FROM `intentory_name`");


//Fetch Data from Database
while($user_row_inv = mysqli_fetch_row($user_data)){?>



  <tr>
    <td><?php echo $user_row_inv['0'] ?></td>
    <td><?php echo $user_row_inv['1']?></td>
    <td><?php echo $user_row_inv['2']?></td>
    <td><?php echo $user_row_inv['3']?></td>
    <td><?php echo number_format($user_row_inv['4'],2)."<br>"?></td>
    <td><a class="btn btn-dark" href="admin_inv_edit.php?id=<?php echo base64_encode($user_row_inv['0'])?>">Edit</a><a class="btn btn-success ms-3" href="admin_inv_delete.php?id=<?php echo base64_encode($user_row_inv['0']) ?>">Delete</a></td>
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
<br><br>

<!--Category List-->


<div id="cat" class="container">
    <div class="row">
        <div class="col border shadow p-5">
            <form  method="post">
            <h4>Category List</h4> <hr>
        <table class="table">


        <thead>
    <tr>
    <th scope="col">Product ID</th>
      <th scope="col">Account ID</th>
      <th scope="col">Inventory Category</th>
    </tr>
  </thead>

<tbody class="border bg-light p-5">

<?php



// Data Collect from Database
$user_data = mysqli_query($link, "SELECT * FROM `intentory_name`");

//Fetch Data from Database
while($user_row_inv = mysqli_fetch_row($user_data)){?>



  <tr>
    <td><?php echo $user_row_inv['0'] ?></td>
    <td><?php echo $user_row_inv['1']?></td>
    <td><?php echo $user_row_inv['2']?></td>
    <td><a class="btn btn-dark" href="admin_cat_edit.php?id=<?php echo base64_encode($user_row_inv['0'])?>">Edit</a></td>
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