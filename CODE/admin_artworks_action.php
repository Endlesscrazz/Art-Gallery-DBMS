<?php include("includes/connection.php");

include("functions.php");
$id = $_GET['delete'];
$pic = $_GET['pic'];
    $delete ="DELETE FROM art_work WHERE art_id = '$id' ";
if (mysqli_query($conn, $delete)) {
    echo "Record updated successfully";
    unlink('pictures/arts/'.$pic.'');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


redirect_to("admin_artworks.php");
?>