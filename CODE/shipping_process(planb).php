<?php session_start();
include("includes/connection.php");
include("functions.php");


 $art_id = $_SESSION['art_id'];
 $user_id = $_SESSION['USER_ID'];
$name =$_SESSION['name'];
$province =$_SESSION['province'];
$municipal =$_SESSION['municipal'];
$brgy =$_SESSION['brgy'];
$street =$_SESSION['street'];
$zipcode =$_SESSION['zipcode'];
$contact = $_SESSION['contact'];
$house_num = $_SESSION['house_num'];
$area = $_SESSION['area'];
$shipping_date = $_SESSION['shipping_date'];
$art_stock = $_SESSION['art_stock'];
$ordered_date = $_SESSION['ordered_date'];
$total_price = $_SESSION['total_price'];

if($_SESSION['cat'] == 'Sculpture'){
    $minus = $_SESSION['items'];
$art_stock = $art_stock - $minus;
}
else{
    $minus = 1;
    $art_stock = $art_stock - $minus;
}

if($art_stock == 0){
    $art_status = 'SOLD';
}
else{
    $art_status = 'AVAILABLE';
}


        $sql="INSERT INTO buy_transaction (art_id,user_id,courier_name,courier_contact,shipping_area,shipping_municipal,shipping_province,shipping_zipcode,shipping_brgy,shipping_street,shipping_house_num,delivery_date,ordered_no,ordered_date,total_price,shipping_status) VALUES('$art_id','$user_id','$name','$contact','$area','$municipal','$province','$zipcode','$brgy','$street','$house_num','$shipping_date','$minus','$ordered_date','$total_price','Processing')";

        $sql1 ="UPDATE art_work SET art_status = '$art_status', art_stock = '$art_stock' WHERE art_id = $art_id";

        if (mysqli_query($conn, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


if (mysqli_query($conn, $sql1)) {
    echo "Record updated successfully";
    redirect_to("orders(planb).php");

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);


?>