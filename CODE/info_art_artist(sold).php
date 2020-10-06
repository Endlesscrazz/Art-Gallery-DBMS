<?php include("includes/connection.php");
session_start();
include("includes/head.php");     ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>

    .img{
            margin-bottom: 50px;
            position: absolute;
            left: 40px;
            top: 200px;
            width:600px;
            height: 500px;
            box-shadow: 1px 1.732px 30px 0px rgb( 55, 52, 52 );

        }
         .img img {
        border:100% solid #ccc;
        box-shadow: 0px 6px 15px  0px rgb( 0, 0, 1 );
        }
        .head-title{

           margin-top: 105px;

          font-size: 55px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #2d70d5;
          position: absolute;
          left: 678px;
          top: 100px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .artist{
            margin-top: 105px;
          font-size: 20px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #333333;
          position: absolute;
          left: 690px;
          top: 200px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .hr{
            position: absolute;
            top: 470px;
            left: 680px;
            width: 508px;
        }

        .buybutton{
           font-family: "Yu Gothic UI";
           color: white;
           font-size: 15px;
           margin-right: 30px;
           background-color: #43b353;
           position: absolute;
           top:385px;
           right: 435px;
           width: 115px;
           height: 50px;
        }
         .contact{
            margin-top: 105px;
          font-size: 16px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #333333;
          position: absolute;
          left: 690px;
          top: 330px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .about{
            margin-top: 105px;
          font-size: 20px;
          font-family: "MingLiU_HKSCS-ExtB";
          font-weight: bold;
          color: #333333;
          position: absolute;
          left: 690px;
          top: 378px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .desc{
            margin-top: 105px;
          font-size: 14px;
          font-family: "MingLiU_HKSCS-ExtB";
          text-align: justify;
          color: #333333;
          position: absolute;
          left: 690px;
          top: 420px;
          width: 500px;
          height: 35px;
          z-index: 3;
        }

        .rate{

          font-size: 14px;
          font-family: "MingLiU_HKSCS-ExtB";

          color: #333333;
          position: absolute;
          left: 690px;
          top: 600px;

          z-index: 3;
        }
        .status{

          font-size: 14px;
          font-family: "MingLiU_HKSCS-ExtB";
          font-size: 150%;
          color: red;
          position: absolute;
          left: 690px;
          top: 655px;

          z-index: 3;
        }
        </style>
        <?php $art_id = $_GET['id'];
        $_SESSION['art_id'] = $art_id;
        ?>
<body><form action="shipping.php" method="POST">
<?php

$query_category1="SELECT ART_IMAGEPATH,art_category FROM art_work WHERE art_id = '$art_id'";
        $result_category1 = mysqli_query($conn,$query_category1);

        while($row=mysqli_fetch_array($result_category1)){
echo '<h1>'.$row['art_category'].'</h1>';
            echo '<a href= "pictures/arts/'.$row['ART_IMAGEPATH'].'"> <img class="img" src="pictures/arts/'.$row['ART_IMAGEPATH'].'" ></a><br />';
        }





 $query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_status,buy_transaction.courier_name,buy_transaction.courier_contact
                         FROM art_work,user,buy_transaction
                        where art_work.user_id = user.user_id AND buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND art_work.art_id = '$art_id' AND art_work.art_status = 'sold'";
        $result_category = mysqli_query($conn,$query_category);

        while($row=mysqli_fetch_array($result_category)){

            echo '<p class="head-title" >"'. $row['art_title'].'"<p class="artist">'.$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'].'<br><br>'.$row['art_category'].', '.$row['art_width'].' x '.$row['art_height'].' x '.$row['art_thickness'].'<br></p><br><br><br> <input  class="buybutton"type="submit" name="buy" value="Php '.$row['art_price'].' BUY"></form><br><br><br><p class="contact"> Contact: 0'.$row['user_contact'].'<p class="about">About this Artwork <br><br></p><p class="desc">'.$row['art_description'].'<p class="rate"><form action="rate_art.php" class="rate" method = "POST"><br><br>Rate:&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="rate">
              <option value="5" selected>5</option>
              <option value="4">4</option>
               <option value="3">3</option>
                <option value="2">2</option>
                 <option value="1">1</option>
              </select>
    <input type ="submit" name="rate" value ="rate">
      </p></form>
    <p class="status"> THIS ARTWORK IS '.$row['art_status'].'
';
        }

            ?>
<p class="status"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><?php include("comment.php"); ?>
            <br>


</body>
</html>
