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




$query_category1="SELECT user.user_email,art_work.art_imagepath,art_work.art_title,buy_transaction.transaction_id,buy_transaction.ordered_date,buy_transaction.courier_name,buy_transaction.delivery_date FROM user,art_work,buy_transaction
where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id  AND buy_transaction.user_id = $user_id AND buy_transaction.art_id = '$art_id'";

$result_category1 = mysqli_query($conn,$query_category1);
 while($row1 = mysqli_fetch_array($result_category1)){
    $email = $row1['user_email'];
    $art_imagepath = $row1['art_imagepath'];
    $art_title = $row1['art_title'];
    $transaction_id = $row1['transaction_id'];
    $ordered_date = $row1['ordered_date'];
    $courier_name = $row1['courier_name'];
    $shipping_date = $row1['delivery_date'];




// email send
require("PHPMailer-master/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "albayartworks@gmail.com";
$mail->Password = "albayp@55w0rd";
$mail->SetFrom($email);

$mail->Subject = "Order";
$message = '<html>
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
        <div class="whiteborder">
        <h3> Dear '.$courier_name.',</h3>
         <p>
            Your Order # '.$transaction_id.' has been placed on <!--Delivery_Date w/c includwa this format-->'.$ordered_date.' via Cash on Delivery. Please expect your order before '.$shipping_date.'
            <br><br>

            Note:<br><br>
            In the event that the information you provided is incomplete, a validation may be sent through phone call or SMS as part of Albay Artwork\'s order verification requirement.<br> Please be kind enough to respond if you receive either a call from (02)795 8900 or an SMS from sender Albay Artwork. If you do not receive any communication from us <br>your order will automatically be processed.<br><br>
            Order validations will be conducted between 8am and 9pm, from Monday to Sunday. Failure to respond to either the call or the SMS will result in order cancellation/s.<br><br>
            After your order is validated, we will send you another email confirming the shipping of your order.
        </p>
        </div>
</body>
</html>';
$mail->Body = $message;
$mail->AddAddress("$email");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
    redirect_to("orders.php");
 }

}


} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);


?>