<?php session_start();
include("includes/connection.php");

    include("includes/head.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shipping</title>

    <style type="text/css">

         #content{
            margin: 70px 0px 0px 50px;
        }
        .head-order {
         font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 70px;
          top: 100;

          z-index: 19;
          }

        .head-summary{
         font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:155px;
          top: 100;

          z-index: 19;
        }

        .hr{
            position: relative;
            border: 1px solid #2d70d5;
            top: -140px;
            width: 1090px;
            left: -44px;
        }
        .fsize-special{
            font-family: "Yu Gothic UI Light";
            position: absolute;
            top:160px;
            left: 110px;
            font-size: 20px;
        }

        .hr2{
            position: relative;
            border: 1px solid;
            top: 20px;
            width: 1090px;
            left: -41px;
        }

         .image{
          position: absolute;
          box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
          top: 370px;
          left: 100px;
          height: 270px;
          width: 228px;
        }

         .item-title{
          font-size: 40px;
          font-family: "Yu Gothic UI Light";
          font-weight: bold;
          color: #2d70d5;
          position: relative;
          left: 330px;
          top: 00px;
          z-index: 3;
        }

        .delivery{

          font-size: 16px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 380px;
          top: 450px;
          z-index: 3;
        }

        .qty{
          font-size: 16px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 380px;
          top: 490px;
          z-index: 3;
        }

        .price{
          font-size: 16px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 1090px;
          top: 490px;
          z-index: 3;
        }

        .special{
          font-size: 16px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: relative;
          left: 980px;
          top: 90px;
          z-index: 3;
        }
        .special2{
          font-size: 16px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: relative;
          left: 985px;
          top: 90px;
          z-index: 3;
        }

        .total{
          font-size: 16px;
          font-family: "Yu Gothic UI Light";
          font-weight: bold;
          color: #333333;
          position: absolute;
          left: 950px;
          top: 680px;
          z-index: 3;
        }

        .inputbar{
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           border: 1px solid;
           color: white;
           font-size: 25px;
           background-color: #43b353;
           position: absolute;
           top: 735px;
           left: 965px;
           width: 200px;
           height: 50px;
        }
    </style>
</head>
<body>

<?php
$name = $_POST['name'];
$province = $_POST['province'];
$brgy = $_POST['brgy'];
$street = $_POST['street'];
$zipcode = $_POST['zipcode'];
$contact = $_POST['contact'];
$house_num = $_POST['house_num'];
$area = $_POST['area'];
$municipal = $_POST['municipal'];





$_SESSION['municipal'] = $_POST['municipal'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['province'] = $_POST['province'];
$_SESSION['brgy'] = $_POST['brgy'];
$_SESSION['street'] = $_POST['street'];
$_SESSION['zipcode'] = $_POST['zipcode'];
$_SESSION['contact'] = $_POST['contact'];
$_SESSION['house_num']=$_POST['house_num'];
$_SESSION['area']=$_POST['area'];
?>


    <div id="content">

        <form  class="border" action = "shipping_process(planb).php" method="POST" > <br><br><br><br><br><br><br><br><br><br>
               <p >
                <h2 class="head-order">Order </h2>
                <h2 class="head-summary">Summary</h2><hr class="hr" style="border-bottom: 2px solid #2d70d5;">
              </p>

              <!--Values from database-->
              <p class="fsize-special">
                  <strong style="font-size: 50px; color:#222;"><?php echo $name; ?> </strong> <br>

                  <?php echo $area.', Philippines<br>'.$house_num. ' '.$street.', '.$brgy.' '.$province; ?><br>

                  <?php echo $contact;  ?>
              </p>

              <hr class="hr2" style="border-bottom: 1px solid #f2f2f2;">

              <?php

                    $art_id = $_SESSION['art_id'];
                    $query_category1="SELECT ART_IMAGEPATH,art_category FROM art_work WHERE art_id = '$art_id'";
                    $result_category1 = mysqli_query($conn,$query_category1);

                    while($row=mysqli_fetch_array($result_category1)){

                        echo '<a href= "pictures/arts/'.$row['ART_IMAGEPATH'].'"> <img class="image" src="pictures/arts/'.$row['ART_IMAGEPATH'].'" ></a><br />';
                    }

                    $query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,art_work.art_stock
                                     FROM art_work,user
                                    where art_work.user_id = user.user_id AND art_id = '$art_id'";
                    $result_category = mysqli_query($conn,$query_category);

                    while($row=mysqli_fetch_array($result_category)){
                        echo '<p class="item-title" >'.$row['art_title'].'</p>';
                        $price = $row['art_price'];
                        if($row['art_category'] == 'Sculpture'){
                          $art_stock = $_POST['items'];
                          $_SESSION['items'] = $art_stock;
                          if($row['art_stock'] < $art_stock ){
                            echo "<script type=\"text/javascript\">window.alert('The number of items you ordered is greater than the available artwork!!');window.location.href = 'info_art.php?id=$art_id';</script>";

                          }
                          else{
                          $total_price = $price * $art_stock;
                          $_SESSION['total_price'] = $total_price;
                           echo ' <p class="qty">Quantity - '.$art_stock.' </p>';
                         }
                        }
                        else{
                          echo ' <p class="qty">Quantity - 1 </p>';
                          $total_price = $price;
                           $_SESSION['total_price'] = $total_price;
                        }
                    }
         ?>



         <p class="delivery">
          <?php
            $today = getdate();
            $day = $today['weekday'];
            $month = $today['mon'];
            $day1 = $today['mday'];
            $year =$today['year'];
            $month1 = $today['month'];
            echo 'Delivery Date:  ';
            echo  $month.'-'.$day1.'-'.$year;
            $aa = $year.'-'.$month.'-'.$day1;
            $_SESSION['ordered_date'] = $aa;
            ?>  --- <?php
             $today="$day1";
             $today1 = getdate();
            $day = $today1['weekday'];
            $month = $today1['mon'];
            $day1 = $today1['mday'];
            $year =$today1['year'];
            if($area == 'luzon'){
             $day1=$day1+3;
             if($day1 > 31){
              $month++;
              $dayyy =$day1-31 ;
              $day1 = $dayyy;
            }
           }
           else if($area == 'visayas'){
            $day1=$day1+7;
            if($day1 > 31){
              $month++;
              $dayyy =$day1-31 ;
              $day1 = $dayyy;
            }
           }
           else if($area =='mindanao'){
            $month++;
           }
             echo $month.'-'.$day1.'-'.$year;
              $bb= $year.'-'.$month.'-'.$day1;
             $_SESSION['shipping_date'] = $bb;
            ?></p>

           <p class="price">Php <?php echo $price;?>.00 <br><br><br><br><br></p><br>

           <p class="special">Subtotal Php<?php echo $total_price;?>.00<br>
           <p class="special2">Shipping Fee: Free<br><br></p>

           <br><br><br><br><br><br><br><br><br><br><br><hr class="hr" style="border-bottom: 2px solid #2d70d5;">

           <p class="total">Total(Tax included) Rs. <?php echo $total_price;?>.00</p>



              <input class = "inputbar" type="submit" name="submit" value="Buy  &#10095;&#10095;">


  </form>
    </div>
</body>
</html>