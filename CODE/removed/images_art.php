<?PHP include("includes/connection.php");?>

<!DOCTYPE html>
<html>
<head>
<style>
div.img {
    margin: 50px;
     border:100% solid #ccc;
      float: left;
       width: 250px;
        height : 200px;

         }

div.img img {
                width: 100%;
                 height: 100%;
             }

             </style>
    <title></title>
</head>
<body>
<br>
<table>
<?php $n =0;
echo "<table border='2'>";
$query_category="SELECT ART_IMAGEPATH FROM art_work";
$result_category = mysqli_query($conn,$query_category);
while($row=mysqli_fetch_row($result_category))
{
echo "<tr>";
   /* echo '<td><a href= "pictures/arts/'.$row[0].'"> <img src="pictures/arts/'.$row[0].'" height = 200></a>';
    echo "</td></tr>";*/
         include("images_art1.php");
}


?>
</table>
</body>
</html>
