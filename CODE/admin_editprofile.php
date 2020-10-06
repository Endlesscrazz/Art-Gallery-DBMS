<?php
 session_start();
 include("functions.php");
include("includes/connection.php");

if(isset($_POST['submit'])){
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
$USER_EMAIL = $_POST['email'];
$USER_BDAY= $_POST['bday'];
$USER_CONTACT= $_POST['contact'];
$USER_MUNICIPAL= $_POST['municipal'];
$USER_PROVINCE= $_POST['province'];
$USER_ZIPCODE= $_POST['zipcode'];
$USER_BRGY= $_POST['Brgy'];
$USER_STREET= $_POST['Street'];
$USER_HOUSE_NUMBER= $_POST['House_num'];
$id = $_SESSION['USER_ID'];
$sql4="SELECT  username FROM user WHERE user_id = $id";
$ss= mysqli_query($conn, $sql4);
while($aa = mysqli_fetch_array($ss)){
  $temp_use = $aa['username'];
}


$sql3="UPDATE user SET username = 'NULL' WHERE user_id = $id";
$ss= mysqli_query($conn, $sql3);
$query = mysqli_query($conn, "SELECT * FROM user WHERE username= '" . $username . "' ") or die("Failed to query database ".mysqli_error($conn));

$count = mysqli_fetch_row($query);

if ($count>0) {
  echo "<script type=\"text/javascript\">window.alert('Username Already Exists!');window.location.href = 'profile.php';</script>";
$sql3="UPDATE user SET username = '$temp_use' WHERE user_id = $id";
$ss= mysqli_query($conn, $sql3);
}
else{

$sql="UPDATE user SET username = '$username', password = '$password', USER_FNAME = '$USER_FNAME',USER_MNAME = '$USER_MNAME', USER_LNAME = '$USER_LNAME',USER_GENDER = '$USER_GENDER',
 USER_AGE = '$USER_AGE',USER_BDAY = '$USER_BDAY',USER_CONTACT = '$USER_CONTACT',USER_MUNICIPAL = '$USER_MUNICIPAL',
  USER_PROVINCE = '$USER_PROVINCE',USER_ZIPCODE = '$USER_ZIPCODE',USER_BRGY = '$USER_BRGY',USER_STREET = '$USER_STREET',
  USER_HOUSE_NUMBER = '$USER_HOUSE_NUMBER', USER_IMAGEPATH = '$target_file', USER_EMAIL = '$USER_EMAIL' WHERE USER_ID = $id" ;

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    redirect_to("admin_editprofile.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
}


if(isset($_POST['delete'])){
  $user_id = $_SESSION['USER_ID'];
  $sql = "DELETE FROM user WHERE user_id = '$user_id'";
  if(mysqli_query($conn,$sql)){
    include("functions.php");
    include("logout.php");
  }
  else{
    echo 'Error deleting account';
  }

}
?>
<?php

  include("head_admin.php");

?>


<?php
$user_id = $_SESSION['USER_ID'];
 include("includes/connection.php");
$query_category1="SELECT username,password,user_fname,user_mname,user_lname,user_gender,user_age,user_bday,user_contact,user_municipal,user_province,user_zipcode,user_brgy,user_street,user_house_number,user_email FROM user
where user_id = $user_id";

$result_category1 = mysqli_query($conn,$query_category1);
 while($row1 = mysqli_fetch_array($result_category1)){
    $username = $row1['username'];
    $password = $row1['password'];
    $fname = $row1['user_fname'];
    $mname = $row1['user_mname'];
    $lname = $row1['user_lname'];
    $gender = $row1['user_gender'];
    $age = $row1['user_age'];
    $bday = $row1['user_bday'];
    $contact = $row1['user_contact'];
    $municipal = $row1['user_municipal'];
    $province = $row1['user_province'];
    $zipcode = $row1['user_zipcode'];
    $brgy = $row1['user_brgy'];
    $street = $row1['user_street'];
    $house = $row1['user_house_number'];
    $email = $row1['user_email'];
 }


  ?>
<!DOCTYPE html>

 <html>
 <head>
</head>
<style type="text/css">

    .success{
  position: absolute;
  top:100px
  left:40px;
  color: white;
  font-family: "Yu Gothic UI Light";
  font-size: 20px;
  text-align: center;
  z-index: 50;
    margin: -30px 50px 0 -100px;

}
.border-success{
    position: absolute;
    top: 100px;
    left:400px;
    border-radius: 8px;
    background-color: #429B47;
    box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
    padding: 50px 320px 30px 150px;
    margin: -20px 100px 100px 0px;
    opacity: .75;
      z-index: 50;
}

    #image{
        position: absolute;
        top: 250px;
        left: 30px;
        width: 50px;
        height: 50px;
    }

    .headspace{
        position: relative;
        top:-20px;
    }
    .font{
        font-variant: small-caps;
        color: rgb(0, 0, 3);
        font-family: "Yu Gothic UI Light";
        font-size: 30px;
    }

    .infospace{
        padding-left: 200px;
        padding-top: 120px;
    }

    .content{
        padding-left: 450px;

    }
    .special{
        position: relative;
        top: -80px;
    }

    .headt1 {
          font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 50px;
          top: 80px;
          z-index: 19;
          }

        .headt2{
          font-size: 30px;
         font-family: "Yu Gothic UI Light";
          position: absolute;
           left:165px;
          top: 80px;
          z-index: 19;
        }

        .hr{
            position: relative;
            border: 1px solid #2d70d5;
            top: -15px;
            width: 1000px;
            left: -32px;

        }
        .headspace2{
            position: relative;
            top: -100px;
            left:50px;
        }

          .headspace3{
            position: relative;
            top: -150px;
            left:50px;
        }
        .table{
            position: absolute;
            top: -25px;
            left: 1050px;
        }
        .fsize-title{
              margin: 0px 50px 10px 430px;
             font-size: 15px;
        }

        .fsize-img{
            margin: 0px 50px 20px 530px;
            font-size: 15px;
        }
        .fsize-text{
            margin: -10px 50px 00px 430px;
            font-size: 15px;
        }
         .fsize-special{
            margin: 10px 30px 10px 375px;
            font-size: 15px;
        }

        .img{
             box-shadow: 1px 1.732px 10px 0px rgb( 55, 52, 52 );
        }
        .inputbar{
           border-radius: 8px;
            box-shadow: 1px 1px 5px 0px rgb( 55, 52, 52 );
           border: none;
           cursor: pointer;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 22px;
           background-color: #43b353;
           position: relative;
           top:220px;
           left: 900px;
           width: 170px;
           height: 45px;
        }
        .select1 {
            border-radius: 8px;
            padding: 5px;
           font-size: 16px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: absolute;
          left: 530px;
          top: 265px;
          width: 250px;
          height: 40px;
          z-index:

        }

         .border{
          border-radius: 8px;
        float: left;
        border: 1px solid none;
        background-color: white;
        padding: 30px 155px 30px 60px;
        margin-left: 45px;
        margin-top: 25px;
    }
     .textbox{
             border-radius: 8px;
             padding: 0px 10px;
             box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
             border: 2px solid steelblue;
            background-color: white;
            position: inherit;
            left: 200px;
            top: 10px;
            width: 210px;
            height: 35px;
        }
    .Gender {
           border-radius: 8px;
          padding: 0px 10px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: inherit;
          left: 200px;
          top: 10px;
          width: 210px;
          height: 35px;
        }
  input[type=text],

textarea,
fieldset {
/* required to properly style form
   elements on WebKit based browsers */
  -webkit-appearance: none;



  font-family: inherit;
  font-size: 90%;

  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

input:invalid {
  box-shadow: 0 0 5px 1px red;
}

input:focus:invalid {
  outline: none;
}

.spacing{
  margin: -100px 0px 30px 430px;
}
.inputbardelete{
   border-radius: 8px;
            box-shadow: 1px 1px 5px 0px rgb( 55, 52, 52 );
           border: none;
           cursor: pointer;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 22px;
           text-align: center;
           background-color: #FF1127;
           position: absolute;
           top:1630px;
           left: 300px;
           width: 150px;
           height: 45px;
}
.fordelete{
  font-family: "Yu Gothic UI Light";
  font-weight: bold;
  font-size: 20px;
  position: absolute;
  top:1570px;
  left: 300px;
}
 </style>
 <body background="pictures/home.png">
 <script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to delete your Account?  (WARNING ALL YOUR DATA IN THE WEBSITE WILL BE DELETED INCLUDING YOUR ORDERS)'))
    {
        return true;
    }
    else
        return false;
};
</script>
  <div class="border">
               <h2 class="headt1"> Account </h2>
               <h2 class="headt2">  Profile</h2>
      </div>

   <form action = "admin_editprofile.php"enctype="multipart/form-data" method="POST">
<h2 class="headspace font infospace"> Account Information <hr class="hr" style="border-bottom: 4px solid #2d70d5;"> </h2>


<p class="fsize-title"> Profile picture: </p>
            <p class="fsize-img">
<?php
$query_category="SELECT user_imagepath FROM user WHERE user_id = $user_id";
$result_category = mysqli_query($conn,$query_category);
while($row=mysqli_fetch_row($result_category))
{

    echo ' <img class="img" src="pictures/profile/'.$row[0].'" height = 30%';
    } ?>
<table class="table" style="border-collapse: collapse; font: 12px YU Gothic UI;" border="1" cellspacing="5" cellpadding="5">
<tbody style="box-shadow: 1px 1.732px 10px 0px rgb( 45, 112, 213);"><tr>
<td>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
          <input type="file" name="file_upload" />
</td>
</tr>
</tbody></table><br>
 <p class="fsize-text">
                      Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" required name="username" value="<?php echo $username; ?>"><br><br>

                      Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" required name="password" value="<?php echo $password; ?>"><br><br>


        <h2  class="headspace2 font infospace"> Personal Information <hr class="hr" style="border-bottom: 4px solid #2d70d5;"> </h2>

            <div class="spacing">
            First name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Fname" required name="Fname" value="<?php echo $fname; ?>"><br><br>

            Middle name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Mname" name="Mname" value="<?php echo $mname; ?>"><br><br>

            Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Lname" required name="Lname" value="<?php echo $lname; ?>"><br><br>

            Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="gender" required name="gender" value="<?php echo $gender; ?>"><br><br>

            Birthdate:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="bday" name="bday" value="<?php echo $bday; ?>"><br><br>

            Contact Number:&nbsp;&nbsp;<input class="textbox" type="text" id="contact" required name="contact" value="0<?php echo $contact; ?>"><br><br>
            Email Address:&nbsp;&nbsp;<input class="textbox" type="text" id="contact" required name="email" value="<?php echo $email; ?>"><br><br>

            Municipal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="municipal" name="municipal" value="<?php echo $municipal; ?>"><br><br>

            Province:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="province" name="province" value="<?php echo $province; ?>"><br><br>
            Zipcode:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="zipcode" name="zipcode" value="<?php echo $zipcode; ?>"><br><br>
            Brgy:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Brgy" name="Brgy" value="<?php echo $brgy; ?>"><br><br>
            Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Street" name="Street" value="<?php echo $street; ?>"><br><br>
            House Number:&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="House_num" name="House_num" value="<?php echo $house; ?>"><br><br>

             </div>
                <input class="inputbar" type="submit" name="submit" value="Save">


        </form>
    </p>
     <h2  class="headspace3 font infospace"> Close Account <hr class="hr" style="border-bottom: 4px solid #2d70d5;"> </h2>

    <form action="admin_editprofile.php" method="POST">
        <p class="fordelete"> ATTENTION: This action will delete all your images and all your content for ever.</p>
        <input class="inputbardelete" type="submit" name="delete" value=" &#10006; Delete" onclick="return(YNconfirm());">
    </form>
</form>
</body>
</html>