<?php session_start();
 include("includes/connection.php");
 include("admin.php");

?>


<!DOCTYPE html>
<html>
<head>
    <style>

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
     .photo {
            position: relative ;
            width: 300px;
           height : 250px;
        }

    .desc-title{
        color:#2d70d5;
        font-variant: small-caps;
        font-family: "Yu Gothic UI Light";
        font-size: 29px;
        position: relative;
        top: 0px;
        left: 5px;
        text-decoration: none;
    }
    .desc-content{
        position: relative;
        font-size: 18px;
        font-family:  "Yu Gothic UI Light";
        top: 0px;

    }
    .desc-content2{
        position: relative;
        font-size: 18px;
        font-family:  "Yu Gothic UI Light";
        top: -20px;
    }

     .pic-table{
            border: 3px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            overflow: auto;
            margin: 0px 50px 100px 0px;
        }
        .space{
          margin-top: 120px;
          position: relative;
          left:130px;

        }

    .deletebutton{
        border-radius: 8px;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 25px;
           background-color: #FF0017;

           position: relative;
           top: -20px;
           padding: 10px;
           left: 10px;
           width: 100px;
           height: 35px;
           text-decoration: none;
    }
    </style>

</head>
<body>
<script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to delete this artwork?'))
    {
        return true;
    }
    else
        return false;
};
</script>

    <p><h1 class="head-table" >TABLE: </h1>
       <h1 class="head-user" >Artworks</h1><br> <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
    </p>
<form action="delete_artwork.php" method="POST">
        <?php


            $query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath, art_work.art_category
                         FROM art_work,user
                        where art_work.user_id = user.user_id AND art_work.art_status = 'Available' ORDER BY ART_WORK.ART_DATE ASC";
            $result_category = mysqli_query($conn,$query_category);
if(mysqli_num_rows($result_category) <=0)
        {
            echo '<h1 align="Center"><br><br><br><br><br><br><br>No Available Artworks </h1>';
        }
        else{
            while($row = mysqli_fetch_array($result_category)){


               echo ' <div class="space" >
                            <table  class="pic-table">
                                <tr>
                                    <td>
                                        <img class="photo" src="pictures/arts/'.$row['art_imagepath'].'" > <br>'.

                                        '<a  href=info_art.php?id='.$row['art_id'].' class="desc-title"> '.$row['art_title'].' </a>

                                         <p class="desc-content">'.$row['art_category'].'</p>

                                         <p class="desc-content" style="float: right;">Rs.'.$row['art_price'].'.00</p> <br>

                                         <p class="desc-content2">'.$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'].'</p>

                                         <p><a class="deletebutton" href =admin_artworks_action.php?delete='.$row['art_id'].'&pic='.$row['art_imagepath'].' onclick="return(YNconfirm());"  > Delete </a></p>
                                    </td>
                                </tr>
                            </table>
                        </div>';


        }
    }
      echo "<br><br>";
        ?>
    </div>
</form>
</body>
</html>
