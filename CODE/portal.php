<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style type="text/css">
        .li, .li2 {
          float: left;
          overflow: auto;
          padding: 5px ;
        }

        .li, .a2, .li2 {
          display: block;
          color: white;
          font-size: 14px;
          font-family: "Yu Gothic UI Light";
          text-decoration: none;

         }
         .li{
                margin: 18px 0px 0px 230px;
                border-right: 1px solid #f2f2f2;
         }
        .li:last-child{
            border-right: none;
        }

         .li2 {
                position: relative;
                top: 18px;
                left: 2px;

         }

         .a2:hover:not(.logo) {
          border-bottom: 1.5px solid #2d70d5;
        }
    </style>
</head>
<body>
      <li class="li"><a class="a2" href="create_account.php">Sign Up</a></li>

      <li class="li2"><a class="a2" href="login_form.php">Sign In</a></li>
</body>
</html>