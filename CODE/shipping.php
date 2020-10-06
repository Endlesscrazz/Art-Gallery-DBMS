<?php session_start();

    include("functions.php");
    if(!isset($_SESSION['USER_ID'])){
      redirect_to("login_form.php");
    }
    $user_id = $_SESSION['USER_ID'];
    $art_id = $_SESSION['art_id'];
include("includes/head.php");
include("includes/connection.php");
$query_category11="SELECT art_work.user_id
                         FROM art_work,user
                        where art_work.user_id = user.user_id AND
                            art_id = '$art_id'";
        $result_category11 = mysqli_query($conn,$query_category11);

        while($row11=mysqli_fetch_array($result_category11)){
          if($user_id == $row11['user_id']){
            echo "<script type=\"text/javascript\">window.alert('You cant buy your own ArtWork');window.location.href = 'info_art.php?id=$art_id';</script>";
          }
          else{

          }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shipping</title>

    <style type="text/css">

 #content{
            margin: 70px 0px 0px 50px;
        }

         .head-shipping {
          font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 70px;
          top: 100;
          width: 215px;
          height: 35px;
          z-index: 19;

          }
        .head-address{
          font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:195px;
          top: 100;
          width: 215px;
          height: 35px;
          z-index: 19;
        }
        .hr{
            position: relative;
            border: 1px solid #2d70d5;
            top: -57px;
            width: 1050px;
            left: -64px;
        }

        .fsize-title{
              margin: 10px 50px 10px 350px;
             font-size: 16px;
            font-weight: bold;
        }

        .fsize{
            position: relative;
            top: -50px;
            left: 330px;
            font-size: 17px;
        }

         .textbox{
             border-radius: 5px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 1px solid steelblue;
          background-color: white;
          position: relative;
          left: 50px;
          top: 0px;
          width: 250px;
          height: 30px;
        }

         .fsize-special{
            margin: 10px 30px 10px 375px;
            font-size: 15px;
        }

        .inputbar{
            cursor: pointer;
          border-radius: 10px;
           font-family: "Yu Gothic UI";
           color: white;
           font-size: 20px;
           margin-top: -50px;
           margin-bottom: 0px;
           border: 1px solid;
           background-color: #43b353;
           position: relative;
           top:-50px;
           left: 850px;
           width: 200px;
           height: 45px;
        }
        input[type=text],

textarea,
fieldset {
/* required to properly style form
   elements on WebKit based browsers */
  -webkit-appearance: none;



  font-family: inherit;
  font-size: 90%;

  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

input:invalid {
  box-shadow: 0 0 5px 1px red;
}

input:focus:invalid {
  outline: none;
}

    </style>
</head>
<body>


     <div id="content">


        <form  action = "order-summary.php" method="POST" ><br><br><br><br>
              <p >
                     <h2 class="head-shipping">Shipping </h2>
                 <h2 class="head-address">Address</h2><br> <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
              </p>
    <!--Values from Database -->


          <p class="fsize">Full Name:    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id ="" required name="name"> <br></p>

          <p class="fsize" >House number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="house_num"> <br></p>

           <p class="fsize" >Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" required name="street"> <br></p>

           <p class="fsize" >landmark:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" required name="lmark"> <br></p>

            <p class="fsize" >City/Municipality: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input class="textbox" type="text" id="" required name="municipal"> <br></p>

             <p class="fsize" >Province: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input class="textbox" type="text" id="" required name="province"> <br></p>

              <p class="fsize" >Zip Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" name="zipcode"> <br></p>

             <p class="fsize" >Area:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" name="area">
             
            <p class="fsize" >Mobile Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="contact"> <br><br></p>

            <?php
            if($_SESSION['cat'] == 'Sculpture'){
            echo '<p class="fsize" >Quantity: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="items"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Max Amount:  '.$_SESSION['art_stock'].' <br><br><br>  </p>';
            }

            ?>
          <input class = "inputbar"type="submit" name="next" value="Next  &#10097;&#10097;">

  </form>
    </div>
</body>
</html>