
<?php
session_start();
include("includes/connection.php");
include("functions.php");
$user_id = $_SESSION['USER_ID'];
 $sql = "SELECT user_type  FROM user WHERE user_id ='$user_id' ";
            $result_set = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result_set)){

if($row['user_type'] == "Admin") {
                    $comment_id = $_GET['id'];
                    $sql = "DELETE FROM comment WHERE comment_id = '$comment_id'";
if(mysqli_query($conn,$sql)){
    redirect_to("admin_comment.php");
}
else{
    echo 'error';
}
                }


else if ($row['user_type'] == "Artist" || $row['user_type'] == 'Customer' )
                {
$comment_id = $_GET['comment_id'];
$art_id = $_GET['art_id'];



$sql = "DELETE FROM comment WHERE comment_id = '$comment_id'";
if(mysqli_query($conn,$sql)){
    redirect_to("info_art.php?id=$art_id");
}
else{
    echo 'error';
}

                }

}
?>