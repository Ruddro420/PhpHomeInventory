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
    <div class="row mb-5">
        <div class="col border shadow p-5">
        <table class="table">

<tbody class="border bg-light p-5">
    <h4>My Profile</h4> <hr>
    
  <tr>
    <td>Id</td>
    <td><?= $user_row['0']?></td>
  </tr>
  <tr>
    <td>First Name</td>
    <td><?= $user_row['1']?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><?= $user_row['2']?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?= $user_row['4']?></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><?= $user_row['3']?></td>
  </tr>
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

    if($result){
      echo "<script type='text/javascript'>alert('Update Successfully');location='user.php?page=alllist.php';</script>";
  }
  
  else{
      echo "<script type='text/javascript'>alert('Something Wrong !!');location='user.php?page=alllist.php';</script>";
  }
    
    
    
}

?>

<!-- Button trigger modal -->
<a  class="btn btn-danger" href="updateuser.php?<?= base64_encode($user_row['0'])?>">Edit Profile</a>
<!-- Modal -->
<div class="modal fade shadow" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Here</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body shadow border">
      

<div class="container">
    <div class="row">
        <div class="col p-3">
            <form  method="post">
        <table class="table">

<tbody class="border bg-light p-5">
 
  <tr>
    <td>Id</td>
    <td><?= $user_row['0']?></td>
  </tr>
  <tr>
    <td>First Name</td>
    <td><input type="text" class="form-control btn-sm" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['1']?>" name="first_name"></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" class="form-control btn-sm" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_row['2']?>" name="last_name"></td>
  </tr>

  <tr>
    <td>Email</td>
    <td><?= $user_row['4']?> <small style="color: red;">( Email Can't Change ! This is Unique )</small></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><?= $user_row['3']?> <small style="color: red;">( Username Can't Change ! This is Unique )</small></td>
  </tr>
  
</tbody>

</table>
<input type="submit" name="update" class="btn btn-danger" value="Update Profile">
</form>
        </div>
      

    </div>
</div>
      </div>
    </div>
  </div>
</div>



<!--End Modal Here-->


        </div>
      
    

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>