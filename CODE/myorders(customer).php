<?php session_start();
include("includes/connection.php");
include("customer-account.php");
?>
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">

        .textbox{
             border-radius: 8px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: inherit;
          left: 200px;
          top: 10px;
          width: 170px;
          height: 25px;
        }

         .head-order {
          font-size: 30px;
          font-family: "Yu Gothic UI";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 50px;
          top: 275px;
          width: 215px;
          height: 35px;
          z-index: 19;
          }

        .head-summary{
          font-size: 30px;
         font-family: "Yu Gothic UI";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:155px;
          top: 275px;
          width: 215px;
          height: 35px;
          z-index: 19;
        }
        .fsize-title{
              margin: 10px 50px 10px 350px;
             font-size: 16px;
            font-weight: bold;
        }

        .fsize{
            margin: 10px 50px 10px 450px;
            font-size: 13px;
        }

        .inputbar{
           font-family: "Yu Gothic UI";
           color: white;
           font-size: 15px;
           margin-bottom: 30px;
           background-color: #43b353;
           position: absolute;
           right: 150px;
           width: 200px;
           height: 35px;
        }

        .fsize-special{
            margin: 10px 30px 10px 50px;
            font-size: 15px;
        }

        .image{
          position: absolute;
          top: 500px;
          left: 50px;
          height: 100px;
          width: 100px;
        }

         .head-title{

           margin-top: 105px;
          font-size: 30px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #2d70d5;
          position: absolute;
          left: 200px;
          top: 400px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

         .qty{
            margin-top: 105px;
          font-size: 16px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #333333;
          position: absolute;
          left: 220px;
          top: 450px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .delivery{
             margin-top: 105px;
          font-size: 16px;
          font-family: "MingLiU_HKSCS-ExtB";
          font-weight: bold;
          color: #333333;
          position: absolute;
          left: 570px;
          top: 420px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .price{
             margin-top: 105px;
          font-size: 16px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #333333;
          position: absolute;
          left: 1070px;
          top: 420px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

        .total{
             margin-top: 105px;
          font-size: 16px;
          font-family: "MingLiU_HKSCS-ExtB";
          font-weight: bold;
          color: #333333;
          position: absolute;
          left: 1000px;
          top: 580px;
          width: 1000px;
          height: 35px;
          z-index: 3;
        }

         .inputbar{
           font-family: "Yu Gothic UI";
           color: white;
           font-size: 15px;
           margin-bottom: 30px;
           background-color: #43b353;
           position: absolute;
           right: 50px;
           width: 200px;
           height: 35px;
        }
</style>
    <title></title>
</head>
<body><?php $id = $_SESSION['USER_ID'];
$query_category12="SELECT shipping_brgy,shipping_street,shipping_municipal,courier_contact,shipping_province,courier_name FROM buy_transaction WHERE user_id = '$id'";
        $result_category12 = mysqli_query($conn,$query_category12);

        while($row3=mysqli_fetch_array($result_category12)){
            $brgy = $row3['shipping_brgy'];
            $street = $row3['shipping_street'];
            $municipal = $row3['shipping_municipal'];
            $province = $row3['shipping_province'];
            $contact = $row3['courier_contact'];
            $name = $row3['courier_name'];

        }
?>






<?php
// query displaying orders from a customer
$query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND
                            buy_transaction.user_id = '$id'";
        $result_category = mysqli_query($conn,$query_category);

        while($row=mysqli_fetch_array($result_category)){
            echo '<a href= "pictures/arts/'.$row['art_imagepath'].'"> <img class="image" src="pictures/arts/'.$row['art_imagepath'].'" ></a><br />'.'<p class = "head-title">'.$row['art_title'].'</p>';
            $price = $row['art_price'];
            echo '<br><br><br><br><br><br>';
}
         ?>




         <p class="qty">Quantity - 1</p>
          <p class="delivery"><?php
$today = getdate();
$day = $today['weekday'];
$month = $today['month'];
$day1 = $today['mday'];
$year =$today['year'];
echo $day.' '.$month.' '.$day1.' '.$year;
?>  --- <?php $today="$day-$month-$day1-$year";
 $nextday=strftime("$year-$month-$day1-$year", strtotime("$today +1 $"));
 echo $nextday;?></p>

           <p class="price">Php <?php echo $price;?> <br><br><br><br><br>Subtotal Php<?php echo $price;?><br> Shipping Fee: Free<br><br></p>

           <p class="total">Total(Tax included) Php <?php echo $price;?></p>

</body>
</html>
