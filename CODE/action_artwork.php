<?php session_start();
include("functions.php");

$servername = "localhost";
$uname = "root";
$password = "";
$dbname = "online_art_gallery_database_final";

// Create connection
 $conn = mysqli_connect($servername, $uname, $password, $dbname);
 // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



// In an application, this could be moved to a config file
$upload_errors = array(

    UPLOAD_ERR_OK               => "No errors.",
    UPLOAD_ERR_INI_SIZE     => "Larger than upload_max_filesize.",
  UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
  UPLOAD_ERR_PARTIAL        => "Partial upload.",
  UPLOAD_ERR_NO_FILE        => "No file.",
  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
  UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."
);

if(isset($_POST['submit'])) {
    // process the form data
    $tmp_file = $_FILES['file_upload']['tmp_name'];
    $target_file = basename($_FILES['file_upload']['name']);
    $upload_dir = "pictures/arts";

    // You will probably want to first use file_exists() to make sure
    // there isn't already a file by the same name.

    // move_uploaded_file will return false if $tmp_file is not a valid upload file
    // or if it cannot be moved for any other reason
    if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
        $message = "File uploaded successfully.";
    } else {
        $error = $_FILES['file_upload']['error'];
        $message = $upload_errors[$error];
    }

}



$ART_TITLE= $_POST['title'];
$ART_WIDTH= $_POST['width'];
$ART_HEIGHT= $_POST['height'];
$ART_THICKNESS= $_POST['thickness'];
$ART_DESCRIPTION= $_POST['description'];
$ART_DATE= $_SESSION['current_date'];
$ART_CATEGORY = $_SESSION['art_category'];
$ART_MEDIA = $_POST['media'];
$ART_PRICE= $_POST['price'];
$id = $_SESSION['USER_ID'];
$art_status = 'AVAILABLE';
if ($ART_CATEGORY == 'Sculpture'){
  $ART_STOCK = $_POST['stock'];
}
else{
  $ART_STOCK = 1;
}


$sql="INSERT INTO art_work (ART_TITLE,ART_DESCRIPTION,ART_PRICE,ART_WIDTH,ART_HEIGHT,ART_THICKNESS,ART_CATEGORY,ART_MEDIA,ART_STATUS,ART_IMAGEPATH,user_id,art_date,ART_STOCK) VALUES('$ART_TITLE','$ART_DESCRIPTION','$ART_PRICE','$ART_WIDTH','$ART_HEIGHT','$ART_THICKNESS','$ART_CATEGORY','$ART_MEDIA','$art_status','$target_file',$id,'$ART_DATE','$ART_STOCK')";

if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\">window.alert('You have successfully Uploaded your Artwork!');window.location.href = 'myartworks_available.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

