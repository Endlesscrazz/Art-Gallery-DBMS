<?php
session_start();
include("includes/connection.php");
include("functions.php");
if(isset($_POST['submit'])){
  $shipping_stat = $_POST['shipping_status'];
  $shipping_dat = $_POST['delivery_date'];
  $transaction_id = $_SESSION['aaaa'];
  if(mysqli_query($conn,"UPDATE buy_transaction SET shipping_status = '$shipping_stat', delivery_date = '$shipping_dat' WHERE transaction_id = '$transaction_id' ")){
    redirect_to("admin_editorder.php?id=$transaction_id");
  }

}
?>