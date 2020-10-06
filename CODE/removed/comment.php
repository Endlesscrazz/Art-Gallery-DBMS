<?php
session_start();
include("functions.php");
$user_id = $_SESSION['USER_ID'];
$art_id = 1;
include("includes/connection.php");

$sql = "SELECT user.user_fname, user.user_mname,user.user_lname,user.user_imagepath,comment.comment_date,comment.comment_content,user.user_imagepath FROM comment,user,art_work WHERE comment.art_id = art_work.art_id AND comment.user_id = user.user_id AND art_work.user_id = user.user_id AND comment.art_id = $art_id";
$result_category = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result_category)){

  echo '<table width="300" border="3" cellspacing="3" cellpadding="3" style=""><tr>';
     echo '<td><a href= "pictures/profile/'.$row['user_imagepath'].'"><img class="image" src="pictures/profile/'.$row['user_imagepath'].'" height = 50 ></a></td><td>'.$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'].'</td><br></tr><tr><td>'.$row['comment_content'].'</td></tr><br><tr><td>'.$row['comment_date'].'</td><br>';

}


if(isset($_POST['submit']))
{

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
      echo "sucesss!";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
redirect_to("comment.php");

 }


?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>
<body>
<form name="comment" method="post" action="comment.php" onSubmit="">
<table width="500" border="0" cellspacing="3" cellpadding="3" style="">

  <tr>

  </tr>
  <tr>
  </tr>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <tr>

    <td align="right" id="one"></td>
    <td>Comments: <br><textarea name="message" id="tmessageid"></textarea></td>
  </tr>
  <tr>
  <td align="right" id="one"></td>
  <td><input type="submit" name="submit" id="submit" value="post"></td>
  </tr>
</table>
</form>
</body>
</html>