<?php
session_start();

$user_type = $_SESSION['user_type'];
if($user_type == 'Artist'){
  include("account.php");

}
else if($user_type == 'Customer'){
  include("customer-account.php");

}
else if($user_type == 'Admin'){
  include("head_admin.php");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .welc{
            position: absolute;
            top: 65px;
            width:100%;
            height: 89%;
        }

        body{
            overflow-x: hidden;
        }

    </style>
</head>
<body>
    <img class="welc"src="pictures/welcome_user.jpg">
</body>
</html>