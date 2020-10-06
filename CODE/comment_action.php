<?php session_start();
include("includes/connection.php");
include("functions.php");
$user_id = $_SESSION['USER_ID'];
$art_id = $_GET['art_id'];
$message=$_POST['message'];
 $today = getdate();
$day = $today['weekday'];
$month = $today['mon'];
$day1 = $today['mday'];
$year =$today['year'];
$date = "$year.$month.$day1";
 $sql="INSERT INTO COMMENT
                (USER_ID,COMMENT_CONTENT,ART_ID,COMMENT_DATE) VALUES ('$user_id','$message','$art_id','$date')";

 if (mysqli_query($conn, $sql)) {
      redirect_to('info_art.php?id='.$art_id.'');

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);


?>