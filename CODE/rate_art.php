<?php  session_start();
include("includes/connection.php");
include("functions.php");

$id = $_SESSION['art_id'];
$art_id = $id;
$user_id = $_SESSION['USER_ID'];
$rating_value = $_POST['rate'];

$sql = "INSERT INTO rating (user_id,art_id,rating_value) VALUES ('$user_id','$art_id','$rating_value') ";
if(mysqli_query($conn,$sql)){
   // redirect_to("info_art.php?id='.$art_id.'");
   redirect_to('info_art.php?id='.$art_id.'');
}
else{
    echo 'error';
}


?>