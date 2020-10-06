<?php
    include("account.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .margn{
            margin: 100px -500px 50px 100px;
        }
        .whiteborder{
            border-radius: 8px;
            background-color: #f2f2f2;
            box-shadow: 1px 1px 5px 0px #fff;
            padding: 50px;
            position: relative;
            top:50px;
            width: 900px;
            height: 300px;
        }
    </style>
</head>
<body class="margn">


       <?php
       $tran_id = $_GET['id'];
$query_category="SELECT buy_transaction.transaction_id,buy_transaction.delivery_date,buy_transaction.ordered_no,buy_transaction.ordered_date,buy_transaction.total_price,buy_transaction.shipping_status,user.user_email,buy_transaction.courier_name
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND
                            buy_transaction.transaction_id = '$tran_id'";
        $result_category = mysqli_query($conn,$query_category);

        while($row=mysqli_fetch_array($result_category)){
                        $id = $row['transaction_id'];
                        $ordered_date = $row['ordered_date'];
                        $shipping_date = $row['delivery_date'];
                        $courier_name = $row['courier_name'];
                        $shipping_status = $row['shipping_status'];
                        if($shipping_status == 'Processing'){


      echo '
      <a href = "orders(planb).php"> Go Back </a>
      <div class="whiteborder">
        <h3> Dear '.$courier_name.',</h3>

         <p>
            Your Order # '.$id.' has been placed on '.$ordered_date.' via Cash on Delivery.
            <br><br>

            Note:<br><br>
            In the event that the information you provided is incomplete, a validation may be sent through phone call or SMS as part of Terna Artworks\'s order verification requirement.<br> Please be kind enough to respond if you receive either a call from (02)795 8900 or an SMS from sender Terna Artworks. If you do not receive any communication from us <br>your order will automatically be processed.<br><br>
            Order validations will be conducted between 8am and 9pm, from Monday to Sunday. Failure to respond to either the call or the SMS will result in order cancellation/s.<br><br>
            After your order is validated, we will send you another email confirming the shipping of your order.
        </p>
        </div>
        ';
    }
    else{

         echo '
      <a href = "orders(planb).php"> Go Back </a>
      <div class="whiteborder">
        <h3> Dear '.$courier_name.',</h3>

         <p>
            Your Order # '.$id.' has been Delivered on '.$shipping_date.'.
            <br><br>

           <br><br>
            If you have any complaints regarding the item you bought, Please contact the owner of this item by visiting <a href="artist.php"> Artist page </a>. Thank you and have a good day!
        </p>
        </div>
        ';




    }
         }
       ?>
</body>
</html>