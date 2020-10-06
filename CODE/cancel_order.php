<?php session_start();
include("includes/connection.php");
include("functions.php");

$user_id = $_SESSION['USER_ID'];
 $sql = "SELECT user_type  FROM user WHERE user_id ='$user_id' ";
            $result_set = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result_set)){

if($row['user_type'] == "Customer" || $row['user_type'] == 'Artist') {

$transaction_id = $_GET['id'];
 $sql1 ="SELECT art_work.art_stock FROM buy_transaction,art_work WHERE buy_transaction.art_id = art_work.art_id AND transaction_id = '$transaction_id' ";
 $result1 = mysqli_query($conn,$sql1);
 while($row1=mysqli_fetch_array($result1)){
    $art_stock = $row1['art_stock'];
 }


    $delete ="DELETE FROM buy_transaction WHERE transaction_id = '$transaction_id' ";
if (mysqli_query($conn, $delete)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


$art_id = $_GET['art_id'];
$ordered_no = $_GET['item_num'];

$ordered_no =$ordered_no +$art_stock;
$sql = "UPDATE art_work SET art_status ='Available',art_stock = '$ordered_no' WHERE art_id = '$art_id'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    redirect_to("orders(planb).php");

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}


else{

    $transaction_id = $_GET['id'];
 $sql1 ="SELECT art_work.art_stock FROM buy_transaction,art_work WHERE buy_transaction.art_id = art_work.art_id AND transaction_id = '$transaction_id' ";
 $result1 = mysqli_query($conn,$sql1);
 while($row1=mysqli_fetch_array($result1)){
    $art_stock = $row1['art_stock'];
 }


    $delete ="DELETE FROM buy_transaction WHERE transaction_id = '$transaction_id' ";
if (mysqli_query($conn, $delete)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


$art_id = $_GET['art_id'];
$ordered_no = $_GET['item_num'];

$ordered_no =$ordered_no +$art_stock;
$sql = "UPDATE art_work SET art_status ='Available',art_stock = '$ordered_no' WHERE art_id = '$art_id'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    redirect_to("admin_orders.php");

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);


}
}
?>