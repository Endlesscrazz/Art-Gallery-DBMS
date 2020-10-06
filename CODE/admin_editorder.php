<?php
include("includes/connection.php");
include("admin.php");



  ?>
<!DOCTYPE html>

 <html>
 <head>
</head>
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
            font-size: 40px;
            font-family: "Yu Gothic UI Light";
            color: rgb( 00, 00, 00 );
            position: absolute;
            top: 80px;
            left: 210px;
            z-index: 19;
        }
        .hr{
            position: absolute;
            border: 1px solid #2d70d5;
            margin-top: 75px;
            margin-left: 40px;
            min-width: 1100px;

        }
    .success{
  position: absolute;
  top:100px
  left:40px;
  color: white;
  font-family: "Yu Gothic UI Light";
  font-size: 20px;
  text-align: center;
  z-index: 50;
    margin: -30px 50px 0 -100px;

}
.border-success{
    position: absolute;
    top: 100px;
    left:400px;
    border-radius: 8px;
    background-color: #429B47;
    box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
    padding: 50px 320px 30px 150px;
    margin: -20px 100px 100px 0px;
    opacity: .75;
      z-index: 50;
}

    #image{
        position: absolute;
        top: 250px;
        left: 30px;
        width: 50px;
        height: 50px;
    }

    .headspace{
        position: relative;
        top:-20px;
    }
    .font{
        font-variant: small-caps;
        color: rgb(0, 0, 3);
        font-family: "Yu Gothic UI Light";
        font-size: 30px;
    }

    .infospace{
        padding-left: 200px;
        padding-top: 120px;
    }

    .content{
        padding-left: 450px;

    }
    .special{
        position: relative;
        top: -80px;
    }

    .headt1 {
          font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 50px;
          top: 80px;
          z-index: 19;
          }

        .headt2{
          font-size: 30px;
         font-family: "Yu Gothic UI Light";
          position: absolute;
           left:165px;
          top: 80px;
          z-index: 19;
        }

        .hr{
            position: relative;
            border: 1px solid #2d70d5;
            top: -15px;
            width: 1000px;
            left: -32px;

        }
        .headspace2{
            position: relative;
            top: -100px;
            left:50px;
        }

          .headspace3{
            position: relative;
            top: -150px;
            left:50px;
        }
        .table{
            position: absolute;
            top: -25px;
            left: 1050px;
        }
        .fsize-title{
              margin: 0px 50px 10px 430px;
             font-size: 15px;
        }

        .fsize-img{
            margin: 0px 50px 20px 530px;
            font-size: 15px;
        }
        .fsize-text{
            margin: -10px 50px 00px 430px;
            font-size: 15px;
        }
         .fsize-special{
            margin: 10px 30px 10px 375px;
            font-size: 15px;
        }

        .img{
             box-shadow: 1px 1.732px 10px 0px rgb( 55, 52, 52 );
        }
        .inputbar{
           border-radius: 8px;
            box-shadow: 1px 1px 5px 0px rgb( 55, 52, 52 );
           border: none;
           cursor: pointer;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 22px;
           background-color: #43b353;
           position: absolute;
           top:110px;
           left: 980px;
           width: 170px;
           height: 45px;
        }
        .select1 {
            border-radius: 8px;
            padding: 5px;
           font-size: 16px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: absolute;
          left: 530px;
          top: 265px;
          width: 250px;
          height: 40px;
          z-index:

        }

         .border{
          border-radius: 8px;
        float: left;
        border: 1px solid none;
        background-color: white;
        padding: 50px 85px 30px 85px;
        margin-left: 295px;
        margin-top:-230px;
        font-family: "Yu Gothic UI Light";
        font-size:15px;
    }
     .textbox{
             border-radius: 8px;
             padding: 0px 10px;
             box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
             border: 2px solid steelblue;
            background-color: white;
            position: inherit;
            left: 200px;
            top: 10px;
            width: 210px;
            height: 35px;
        }
    .Gender {
           border-radius: 8px;
          padding: 0px 10px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: inherit;
          left: 200px;
          top: 10px;
          width: 210px;
          height: 35px;
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

.spacing{
  margin: -50px 0px 30px 430px;
}
.inputbardelete{
   border-radius: 8px;
            box-shadow: 1px 1px 5px 0px rgb( 55, 52, 52 );
           border: none;
           cursor: pointer;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 22px;
           text-align: center;
           background-color: #FF1127;
           position: absolute;
           top:1630px;
           left: 300px;
           width: 150px;
           height: 45px;
}
.fordelete{
  font-family: "Yu Gothic UI Light";
  font-weight: bold;
  font-size: 20px;
  position: absolute;
  top:1570px;
  left: 300px;
}
 </style>
 <body class="bodymargin" background="pictures/home.png">
 <p><h1 class="head-table" >ORDER'S</h1>
    <h1 class="head-user" >INFO</h1><br> <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
                         </p>;
 <form action="admin_editorderprocess.php" method="POST">
 <script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to delete your Account?  (WARNING ALL YOUR DATA IN THE WEBSITE WILL BE DELETED INCLUDING YOUR ORDERS)'))
    {
        return true;
    }
    else
        return false;
};
</script>
<?php
$transaction_id = $_GET['id'];
$_SESSION['aaaa'] = $transaction_id;
$query_category1="SELECT transaction_id,user_id,art_id,courier_name,courier_contact,delivery_date,shipping_status,ordered_date,ordered_no,total_price,shipping_area,shipping_municipal,shipping_province,shipping_zipcode,shipping_brgy,shipping_street,shipping_house_num FROM buy_transaction
where transaction_id = '$transaction_id'";

$result_category1 = mysqli_query($conn,$query_category1);
 while($row1 = mysqli_fetch_array($result_category1)){
    $id = $row1['transaction_id'];
    $user_id = $row1['user_id'];
    $art_id = $row1['art_id'];
    $courier_name = $row1['courier_name'];
    $courier_contact = $row1['courier_contact'];
    $ordered_date = $row1['ordered_date'];
    $delivery_date = $row1['delivery_date'];
    $ordered_no = $row1['ordered_no'];
    $total_price = $row1['total_price'];
      $shipping_area = $row1['shipping_area'];
      $shipping_municipal = $row1['shipping_municipal'];
      $shipping_province = $row1['shipping_province'];
      $shipping_zipcode = $row1['shipping_zipcode'];
      $shipping_brgy = $row1['shipping_brgy'];
      $shipping_street = $row1['shipping_street'];
      $shipping_house_num = $row1['shipping_house_num'];
      $shipping_status = $row1['shipping_status'];
 echo '
<br><br><br><br><br><br><br><br><br><br><br>
        <div class="border">

            <strong>Transaction ID:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$id.'<br><br>

            <strong>UserID:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$user_id.'<br><br>

            <strong>Art ID:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$art_id.'<br><br>

            <strong>Courier Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$courier_name.'<br><br>

            <strong>Courier Contact:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$courier_contact.'<br><br>

            <strong>Ordered Date:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$ordered_date.'<br><br>

            <strong>Total Price:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$total_price.'<br><br>

            <strong>Shipping address:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$shipping_house_num.','.$shipping_street.' '.$shipping_brgy.', '.$shipping_municipal.', '.$shipping_province.'. '.$shipping_area.',Philippines<br><br>

           <strong>Delivery Date:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="delivery_date" name="delivery_date" value="'.$delivery_date.'"><br><br>

           <strong>Shipping Status:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<><input class="textbox" type="text" id="zipcode" name="shipping_status" value="'.$shipping_status.'">


             </div>
        </div>
                <input class="inputbar" type="submit" name="submit" value="Save">


        </form>
    </p>



    ';
  }
    ?>
</form>
</body>
</html>