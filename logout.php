<?php
 session_start();
 session_destroy();

 echo "<script type='text/javascript'>alert('Logout Successfully !!');location='login.php';</script>";
 


?>