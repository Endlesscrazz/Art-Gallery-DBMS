<?php include("includes/connection.php");
 include("admin.php"); ?>

<?php include("includes/connection.php");
if(isset($_POST['submit'])){
$id = $_POST['deleteuser'];
    $delete ="DELETE FROM comment WHERE comment_id = '$id' ";
if (mysqli_query($conn, $delete)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

}

?>


<html>
<head>
<title>Comment</title>

    <style type="text/css">
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
        .deletebar{
            border-radius: 8px;
            border: 1px solid none;
            background-color: #fff;
            position: absolute;
            top: 6px;
            width:150px;
            height: 30px;
        }
        .delbutton{
            text-decoration: none;
            cursor: pointer;
            border-radius: 8px;
            padding:  5px 8px 5px 8px;
           font-family: "Yu Gothic UI Light";
           color: white;
           font-size: 13px;
           background-color: #FF0017;
           position: relative;
           top:-5px;
           left:60px;

        }
  .rowdesign:nth-child(odd){
            background-color: #f2f2f2;
        }
        .table-head{
            font-weight: bold;
        }

         .table-head .table-data{
                padding:10px;
                text-align: center;
                border-bottom: 1px solid none;
                font-family: "Yu Gothic UI Light";
        }
        .table-head:hover{
            background-color: #f5f5f5;
        }
    </style>
</head>
<body class="bodymargin">
<script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to delete this Comment?'))
    {
        return true;
    }
    else
        return false;
};
</script>
        <form action ="admin_comment.php" method="POST">

            <?php
                $db_host = 'localhost';
                $db_user = 'root';
                $db_pwd = '';

                $database = 'online_art_gallery_database_final';
                $table = 'user';

                        if (!mysqli_connect($db_host, $db_user, $db_pwd))
                            die("Can't connect to database");

                        /*if (!mysqli_select_db($database))
                            die("Can't select database");  */

                $result1 = mysqli_query($conn,"SELECT * FROM comment");

                        if (!$result1) {
                            die("Query to show fields from table failed");
                        }

                        if(mysqli_num_rows($result1) <=0){
                                echo '<h1 align="Center"><br><br><br><br><br><br><br>No Comments Available </h1>';
                        }
                        else{
                                $fields_num1 = mysqli_num_fields($result1);

                                  echo '<p><h1 class="head-table" >TABLE: </h1>
                                <h1 class="head-user" >Comment</h1><br> <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
                         </p>';
                                echo '<table style="position: absolute; top:180px;left:70px;border-collapse: collapse; width: 1050px;"><tr class="table-head">';
                                // printing table headers
                                        for($i=0; $i<$fields_num1; $i++){
                                            $field1 = mysqli_fetch_field($result1);
                                            echo '<td class="table-data" style="background-color:#308f3f; color:white;" >'.$field1->name.'</td>';
                                        }
                                         echo '<td class="table-data" style="background-color:#308f3f; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;ACTION&nbsp;&nbsp;&nbsp;&nbsp;</td>';
                                        echo "</tr>\n";
                                        // printing table rows
                                        //
                                        while($row1 = mysqli_fetch_row($result1)){
                                            echo '<tr class="rowdesign table-head">';

                                            // $row is array... foreach( .. ) puts every element
                                            // of $row to $cell variable

                                                echo '<td  class="table-data">'.$row1[0].'</td>';
                                                echo '<td  class="table-data">'.$row1[1].'</td>';
                                                echo '<td  class="table-data">'.$row1[2].'</td>';
                                                echo '<td  class="table-data">'.$row1[3].'</td>';
                                                echo '<td  class="table-data">'.$row1[4].'</td>';

                                              echo '<td> <a class="delbutton" href="delete_comment.php?id='.$row1[0].'"onclick="return(YNconfirm());"> Delete</a></td>';
                                            echo "</tr>\n";
                                        }

                        mysqli_free_result($result1);


                }
        ?>

        </form>

</body>
</html>