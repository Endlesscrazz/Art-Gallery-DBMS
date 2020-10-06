
<?php include("includes/connection.php");
include("includes/head.php");
include("functions.php");
if(isset($_POST['submit'])){
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
$cpassword = $_POST['cpassword'];
$USER_FNAME= $_POST['Fname'];
$USER_MNAME= $_POST['Mname'];
$USER_LNAME= $_POST['Lname'];
$USER_GENDER= $_POST['gender'];
$USER_AGE= $_POST['age'];
$USER_BDAY= $_POST['bday'];
$USER_CONTACT= $_POST['contact'];
$USER_EMAIL= $_POST['email'];
$USER_MUNICIPAL= $_POST['municipal'];
$USER_PROVINCE= $_POST['province'];
$USER_ZIPCODE= $_POST['zipcode'];
$USER_BRGY= $_POST['Brgy'];
$USER_STREET= $_POST['Street'];
$USER_HOUSE_NUMBER= $_POST['House_num'];
$user_type = $_POST['type'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username= '" . $username . "' ") or die("Failed to query database ".mysqli_error($conn));

$count = mysqli_fetch_row($query);
if($password !== $cpassword){
    echo "<script type=\"text/javascript\">window.alert('Password Didnot Match.');window.location.href = 'create_account.php';</script>";
}
else{
if ($count>0) {
  echo "<script type=\"text/javascript\">window.alert('Username Already Exists!');window.location.href = 'create_account.php';</script>";
}
else{

$password = password_hash($password,PASSWORD_DEFAULT);

$sql="INSERT INTO user (username,password,USER_FNAME,USER_MNAME,USER_LNAME,USER_GENDER,USER_AGE,USER_BDAY,USER_CONTACT,USER_MUNICIPAL,USER_PROVINCE,USER_ZIPCODE,USER_BRGY,USER_STREET,USER_HOUSE_NUMBER,USER_IMAGEPATH,USER_TYPE,USER_EMAIL) VALUES ('$username','$password','$USER_FNAME', '$USER_MNAME','$USER_LNAME','$USER_GENDER',
'$USER_AGE', '$USER_BDAY', '$USER_CONTACT', '$USER_MUNICIPAL',
'$USER_PROVINCE','$USER_ZIPCODE','$USER_BRGY','$USER_STREET',
'$USER_HOUSE_NUMBER','$target_file','$user_type','$USER_EMAIL')" ;

if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\">window.alert('You have successfully created an account! Click OK to Login now!');window.location.href = 'login_form.php';</script>";


} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
}
}
?>



<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<title>Sign Up</title>
<style>



    #image{
        position: absolute;
        top: 250px;
        left: 30px;
        width: 50px;
        height: 50px;
    }

    .headspace{
        position: relative;
        top:30px;
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
           left:110px;
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
            top: -20px;
            left:-300px;
        }
        .table{
            position: relative;
            top: -25px;
            left: 530px;

        }
        .fsize-title{
              margin: 70px 50px 10px 430px;
             font-size: 15px;
        }

        .fsize-img{
            margin: 0px 50px 10px 200px;
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
           left: 900px;
           width: 170px;
           height: 45px;
        }
        .select {
            border-radius: 8px;
            padding: 5px;
           font-size: 16px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: absolute;
          left: 510px;
          top: 260px;
          width: 250px;
          height: 35px;
        }

         .border{
          border-radius: 8px;
        float: left;
        border: 1px solid none;
        background-color: white;
        padding: 30px 50px 30px 60px;
        margin-left: 45px;
        margin-top: 72px;
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
            height: 30px;
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
          width: 195px;
          height: 32px;
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



</style>
<body>
<div class="border">
         <h2 class="headt1"> Sign </h2>
         <h2 class="headt2"> Up </h2>
      </div>
      <form action = "create_account.php"enctype="multipart/form-data" method="POST">
            <h2 class="headspace font infospace"> Account Information <hr class="hr" style="border-bottom: 2px solid #2d70d5;"></h2>
            <p class="fsize-title">I'm a/an &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <select class="select" name="type">
                          <option value="Artist" selected>Artist</option>
                          <option value="Customer">Customer</option>
            </select></br></br>

           <p class="fsize-text"> Profile picture:</p>
            <table class="table" style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
              <tbody>
                <tr>
                  <td>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="file" name="file_upload" />
                  </td>
                </tr>
              </tbody>
            </table><br>


           <p class="fsize-text"> Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" required name="username" ><br><br>

            Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="password" class="textbox" type="password" required name="password" ><br><br>

            Confirm Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="cpassword" class="textbox" type="password" required name="cpassword" >

            </p>


            <h2  class="font infospace"> Personal Information <hr class="hr" style="border-bottom: 2px solid #2d70d5;"></h2>

            <p class="fsize-text">First name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Fname" required name="Fname"><br><br>
            Middle name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Mname" name="Mname" ><br><br>
            Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Lname" required name="Lname" ><br><br>
            Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select class="Gender" name="gender">


                 <option value="Male">Male</option>
                 <option value="Female">Female</option>

              </select><br><br>

            Birthdate:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="bday" name="bday"><br><br>
            Contact Number:&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="contact" required name="contact"><br><br>
             Email address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Street" required name="email"><br><br>

             House Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="House_num" name="House_num"><br><br>

              Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Street" name="Street"><br><br>

            City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="Brgy" name="Brgy" ><br><br>

            State:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="municipal" name="municipal" ><br><br>
            Country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="province" name="province"><br><br>
            Zipcode:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="zipcode" name="zipcode"><br><br>


            </p>

            <input class="inputbar" type="submit" name="submit" value="&#10093;&#10093; Create"><br><br><br><br>
          </p>
          </div>
      </form>

</body>
</html>