<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php include("includes/connection.php");
echo "<table border='1'><tr>";
$n = $n+1;
$query_category1="SELECT art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath

 FROM art_work,user
 where art_work.user_id = user.user_id AND
  art_id = $n";
$result_category1 = mysqli_query($conn,$query_category1);
while($row = mysqli_fetch_array($result_category1))
      {
        echo "<tr>";
        echo '<td><a href= "pictures/arts/'.$row['art_imagepath'].'"> <img src="pictures/arts/'.$row['art_imagepath'].'" height = 200></a></td>';
      echo "<td>".$row['art_title'] . "<br>Name: " .$row['user_fname']. " " .$row['user_mname']. " " .$row['user_lname']. "<br>Price: " . $row['art_price']."";
      echo "<br />";

     echo '<a href="test.php"> see more..</a></td></tr>';
     echo '<br><br><br>';
      }
?>


</body>
</html>

