<?php
    include("includes/head.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <style type="text/css">
    /*transaction box*/
        body{
             margin:0 auto;
                height: 100%;
                width: 100%;
                background: url(pictures/ForBackground.jpg) no-repeat fixed;
                background-size: cover;

        }

        .trans-box {
            background-image: url(pictures/process-box.png);
            background-size: 100% 100%;
            box-shadow: 1px 2px 2px 0px rgb( 52, 52, 52 );
            border-radius: 15px;
            position: absolute;
            top: 190px;
            left: 50px;
            height: 60px;
            width: 700px;
        }

        .text1 {
          float: left;
          overflow: auto;
          padding: 6px;
        }

        .text1, .text2 {
          display: block;
          color: #333333;
          text-align: center;
          font-family: "Yu Gothic UI";
          font-weight: bold;
          padding: 0px 55px;
          text-decoration: none;
         }

        .text1 .text2:hover:not(.logo) {
          background-color: #2d70d5;
        }

    </style>
</head>
<body>
<div class="trans-box">
<ul >
    <li class="text1">
              <li class=""><a  class="text2" href="login_form.php">LOG IN</a></li>

              <li class=""><a class="text2" href="shipping.php">SHIPPING</a></li>

              <li class=""><a class="text2" href="order-summary.php">ORDER SUMMARY</a></li>
              </li>
         </ul>
</div>

</body>
</html>