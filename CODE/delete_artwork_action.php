<?php include("includes/connection.php");

include("functions.php");
$id = $_GET['delete'];
$pic = $_GET['pic'];
    $delete ="DELETE FROM art_work WHERE art_id = '$id' ";
    $delete1 ="DELETE FROM exhibition WHERE art_id = '$id' ";
if (mysqli_query($conn, $delete)) {
    echo "Record updated successfully";
    unlink('pictures/arts/'.$pic.'');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
if (mysqli_query($conn, $delete1)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



redirect_to("myartworks_available.php");
?>