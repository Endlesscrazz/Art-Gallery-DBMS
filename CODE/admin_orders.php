<?php include("includes/connection.php");
include("admin.php");
session_start();

?>



<!DOCTYPE html>
<html>
<head>
<style>
.head-my {
             font-size: 30px;
              font-family: "Yu Gothic UI Light";
              color: rgb( 45, 112, 213 );
              position: absolute;
              left: 68px;
              top: 100;
              z-index: 19;
        }

        .head-orders{
            font-size: 30px;
            font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:116px;
          top: 100;

          z-index: 19;
        }

        .hr{
            position: relative;
            border: 1px solid #2d70d5;
            top: 110px;
            width: 1130px;
            left: 0px;
        }
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    position: relative;
    top:-20px;
    left: 60px;
    width: 90%;
    height: 70px;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin: -52px 0px 0px 0px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
     position: relative;
     top:-21px;
    left: 60px;
    width: 1150px;
    height:285px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}

.align{
    position: relative;
    top: 150px;

}
.h1{
    font-size: 13px;
    font-family: "Yu Gothic UI Light";
    position: relative;
    display: block;
    float: left;
    overflow: auto;
    margin: -10px 300px 0px 0px ;
}

.h2{
    font-size: 13px;
    font-family: "Yu Gothic UI Light";
    position: relative;
    display: block;
    float: left;
    overflow: auto;
    margin: 0px 255px 0px 0px ;
}
.h3{
    font-size: 13px;
    font-family: "Yu Gothic UI Light";
    position: relative;
    top: -18px;
    display: block;
    float: left;
    overflow: auto;
    margin: -10px 0px 0px 725px ;
}
.h4{
    font-size: 13px;
    font-family: "Yu Gothic UI Light";
    position: relative;
    display: block;
    float: left;
    overflow: auto;
    margin: -60px 0px 0px 1010px ;
}
.picture{
    box-shadow: 1px 1.5px 8px 0px rgb(0, 0, 5);
    position: relative;
    top:30px;
    left: 30px;
    width: 200px;
    height: 228px;
}
.item{
    position: relative;
    top: -270px;
    left: 270px;
    font-family: "Yu Gothic UI Light";
    font-size: 45px;
    color: #2d70d5;
}
.qty{
     position: relative;
    top: -285px;
    left: 270px;
    font-family: "Yu Gothic UI Light";
    font-size: 14px;
    color: grey;
}
.delivery{
     position: relative;
    top: -310px;
    right: -830px;
    font-family: "Yu Gothic UI Light";
    font-size: 15px;
    font-weight: bold;
}
.cancel{
     position: relative;
    top: -290px;
    right: -1000px;
    font-family: "Yu Gothic UI Light";
    font-size: 15px;
    text-decoration: none;
    color: #2d70d5;
    padding: 10px;

}
.cancel:hover{
    background-color:  #ccc;


}
.seemore{
     position: relative;
    top: -310px;
    right: -900px;
    font-family: "Yu Gothic UI Light";
    font-size: 15px;
    text-decoration: none;
    color: #2d70d5;
    padding: 10px;
}
.seemore:hover{
    background-color:  #ccc;
</style>
</head>
<body>

<script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to cancel this order?'))
    {
        return true;
    }
    else
        return false;
};
</script>
 <p >
                <h2 class="head-my">My </h2>
                <h2 class="head-orders">Orders</h2><hr class="hr">
              </p>


<?php
// query displaying orders from a customer
$query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,buy_transaction.transaction_id,buy_transaction.delivery_date,buy_transaction.ordered_no,buy_transaction.ordered_date,buy_transaction.total_price,buy_transaction.shipping_status,user.user_email
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id";
        $result_category = mysqli_query($conn,$query_category);
        if(mysqli_num_rows($result_category) <=0)
        {
            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No orders </h1>';
        }
        else{
        while($row=mysqli_fetch_array($result_category)){



if($row['shipping_status'] == 'Processing'){

            echo '

    <div class="align">

        <button class="accordion">
                <li class="h1">Order # '.$row['transaction_id'].' </li>
                <li class="h1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</li>
                <li class="h1">Payment</li>

                <li class="h2">Placed on '.$row['ordered_date'].'</li>
                <li class="h2">Php '.$row['total_price'].'</li>
                <li class="h3">Cash On Delivery</li>

                <li class="h4"> '.$row['shipping_status'].'</li>
        </button>

        <div class="panel">
                <img class="picture" src="pictures/arts/'.$row['art_imagepath'].'"><br><br><br>
                <h1 class="item"> '.$row['art_title'].'</h1>
                <h2 class="qty">Qty. '.$row['ordered_no'].'</h2>

                <h3 class="delivery">Delivery between '.$row['ordered_date'].'-'.$row['delivery_date'].'</h3>

                <a class="cancel" href="cancel_order.php?id='.$row['transaction_id'].'&art_id=
                '.$row['art_id'].'&item_num='.$row['ordered_no'].'"onclick="return(YNconfirm());"> CANCEL ITEMS</a>
                 <br> <a class = "seemore" href="admin_editorder.php?id='.$row['transaction_id'].'"> MODIFY </a>



        </div>


    </div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>
';
}

else{
  echo '

    <div class="align">

        <button class="accordion">
                <li class="h1">Order # '.$row['transaction_id'].' </li>
                <li class="h1">Total</li>
                <li class="h1">Payment</li>

                <li class="h2">Placed on '.$row['ordered_date'].'</li>
                <li class="h2">Php '.$row['total_price'].'</li>
                <li class="h3">Cash On Delivery</li>

                <li class="h4"> '.$row['shipping_status'].'</li>
        </button>

        <div class="panel">
                <img class="picture" src="pictures/arts/'.$row['art_imagepath'].'"><br><br><br>
                <h1 class="item"> '.$row['art_title'].'</h1>
                <h2 class="qty">Qty. '.$row['ordered_no'].'</h2>

                <h3 class="delivery">THIS ITEM HAS BEEN DELIVERED <br>date:'.$row['delivery_date'].'</h3>


        </div>


    </div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>
';


}
}
}
?>
</body>
</html>
