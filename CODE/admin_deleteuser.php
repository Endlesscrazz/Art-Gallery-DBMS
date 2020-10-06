<?php
include("includes/connection.php");
$user_id = $_GET['id'];
  $sql = "DELETE FROM user WHERE user_id = '$user_id'";
  if(mysqli_query($conn,$sql)){
    include("functions.php");
    redirect_to("admin_user.php");
  }
  else{
    echo 'Error deleting account';
  }
  ?>