<?php include("includes/connection.php");?>

<!DOCTYPE html>
<html>
<head>
    <style>

    .img {
        position: relative;
        left: 80px;
        top: 80px;
        width: 250px;
        height : 200px;
        padding: 20px;

     }
    .img img {
        border:100% solid #ccc;
        box-shadow: 0px 6px 15px  0px rgb( 0, 0, 1 );

    }

    .desc-title{
        color:#2d70d5;
        font-variant: small-caps;
        font-family: "Yu Gothic UI";
        font-size: 40px;
        position: relative;
        top: -150px;
        left: 400px;
        text-decoration: none;

    }
    .desc-content{
        position: relative;
        font-size: 25px;
        font-family:  "Yu Gothic UI";
        top: -130px;
        left: 400px;
    }
    </style>

</head>
<body>

    <div class="img">

        <?php

            $query_category1="SELECT art_work.art_imagepath,art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_status
                         FROM art_work,user
                        where art_work.user_id = user.user_id AND art_work.art_status = 'Available' ORDER BY art_work.art_title ASC";
            $result_category1 = mysqli_query($conn,$query_category1);

            while($row1 = mysqli_fetch_array($result_category1))
{

                echo '<img class="img" src="pictures/arts/'.$row1['art_imagepath'].'" ></a><br />'.'<a href=info_art.php?id='.$row1['art_id'].' class="desc-title"> '.$row1['art_title'].' </a>  <p class="desc-content"> Artist:  '.$row1['user_fname'].' '.$row1['user_mname'].' '.$row1['user_lname'].' <br>Php '.$row1['art_price'].'</p>';
            }

        echo "<br><br>";


        ?>
    </div>
<p class="title"></p>
</body>
</html>
