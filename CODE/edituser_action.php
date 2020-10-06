<?php
 session_start();
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
    $upload_dir = "pictures/profile";

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


$username = $_POST['username'];
$password = $_POST['password'];
$USER_FNAME= $_POST['Fname'];
$USER_MNAME= $_POST['Mname'];
$USER_LNAME= $_POST['Lname'];
$USER_GENDER= $_POST['gender'];
$USER_AGE= $_POST['age'];
$USER_BDAY= $_POST['bday'];
$USER_CONTACT= $_POST['contact'];
$USER_MUNICIPAL= $_POST['municipal'];
$USER_PROVINCE= $_POST['province'];
$USER_ZIPCODE= $_POST['zipcode'];
$USER_BRGY= $_POST['Brgy'];
$USER_STREET= $_POST['Street'];
$USER_HOUSE_NUMBER= $_POST['House_num'];
$id = $_SESSION['edit_id'];
$USER_EMAIL = $_POST['email'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE username= '" . $username . "' ") or die("Failed to query database ".mysqli_error($conn));

$count = mysqli_fetch_row($query);

if ($count>0) {
  echo "<script type=\"text/javascript\">window.alert('Username Already Exists!');window.location.href = 'edituser.php';</script>";
}
else{
$sql="UPDATE user SET username = '$username', password = '$password', USER_FNAME = '$USER_FNAME',USER_MNAME = '$USER_MNAME', USER_LNAME = '$USER_LNAME',USER_GENDER = '$USER_GENDER',
 USER_AGE = '$USER_AGE',USER_BDAY = '$USER_BDAY',USER_CONTACT = '$USER_CONTACT',USER_MUNICIPAL = '$USER_MUNICIPAL',
  USER_PROVINCE = '$USER_PROVINCE',USER_ZIPCODE = '$USER_ZIPCODE',USER_BRGY = '$USER_BRGY',USER_STREET = '$USER_STREET',
  USER_HOUSE_NUMBER = '$USER_HOUSE_NUMBER', USER_IMAGEPATH = '$target_file', USER_EMAIL = '$USER_EMAIL' WHERE USER_ID = $id" ;

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    redirect_to("admin_user.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
mysqli_close($conn);
?>

