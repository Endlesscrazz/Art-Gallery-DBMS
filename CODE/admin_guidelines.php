<?php include("admin.php"); ?>

<?php
if (isset($_POST['submit'])) {
$text = $_POST['guide'];

$file = fopen("guidelines.txt","w");
 fwrite($file,$text);
fclose($file);
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>
    input[type=text3] {
        width: 100%;
        height: 700px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        resize: all;
    }
     .bodymargin{
            margin:80px 0px 10px 40px;
        }

        .head-table {

          font-size: 40px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
            top: 80px;
            left: 45px;

          }
        .head-user{
            font-variant: small-caps;
            font-size: 50px;
            font-family: "Yu Gothic UI Light";
            color: rgb( 00, 00, 00 );
            position: absolute;
            top: 63px;
            left: 170px;
            z-index: 19;
        }
        .hr{
            position: absolute;
            border: 1px solid #2d70d5;
            top: 145px;
            margin-left: -26px;
            width: 1150px;
            left: 73px;
        }

</style>
<body class="bodymargin">

<form action = "admin_guidelines.php" method="POST">
    <div style="margin-left:15%; padding:2px 16px;height:1000px;">
    <h1> Edit guidelines</h1>
        <?php
        $file = fopen("guidelines.txt","r");
        ?>

        <div style="margin-left:10%; padding:2px 16px;height:1000px;">

        <textarea name="guide" style="height: 70%; width: 90%" value="">

        <?php
        while(! feof($file))
          {
          echo fgets($file);
          }
          fclose($file);
          ?>

        </textarea><br>


        <input type="submit" name="submit" value="save">
    </div>

</body>
</html>