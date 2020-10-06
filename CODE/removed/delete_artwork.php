<?php session_start();
 include("includes/connection.php");
 include("account.php");

?>


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

    <div class="img">
<form action="delete_artwork.php" method="POST">
        <?php
$id = $_SESSION['USER_ID'];
echo '<h1> Available </h1>';
            $query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath
                         FROM art_work,user
                        where art_work.user_id = user.user_id AND user.user_id = '$id' AND art_work.art_status = 'Available'";
            $result_category = mysqli_query($conn,$query_category);

            while($row = mysqli_fetch_array($result_category)){


                echo '<img class="img" src="pictures/arts/'.$row['art_imagepath'].'" ></a><br />'.'<a href=info_art.php?id='.$row['art_id'].' class="desc-title"> '.$row['art_title'].' </a>  <p class="desc-content"> Artist:  '.$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'].' <br>Php '.$row['art_price'].'<br><a href =delete_artwork_action.php?delete='.$row['art_id'].'&pic='.$row['art_imagepath'].' onclick="return(YNconfirm());"  > delete this artwork </a>

                 </p>';


        echo "<br><br>";
        }
        ?>
    </div>
</form>
</body>
</html>
