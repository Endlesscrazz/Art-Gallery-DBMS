<?php session_start();
include("includes/connection.php");
include("functions.php");



$user_id = $_SESSION['USER_ID'];
$query_category1="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,buy_transaction.transaction_id,buy_transaction.delivery_date,buy_transaction.ordered_no,buy_transaction.ordered_date,buy_transaction.total_price,buy_transaction.shipping_status,user.user_email,buy_transaction.courier_name
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND
                            buy_transaction.user_id = '$user_id'";
        $result_category1 = mysqli_query($conn,$query_category1);
         while($row1=mysqli_fetch_array($result_category1)){
            $today = date("Y-m-d");
            $del = $today;
            $email = $row1['user_email'];
    $art_imagepath = $row1['art_imagepath'];
    $art_title = $row1['art_title'];
    $transaction_id = $row1['transaction_id'];
    $ordered_date = $row1['ordered_date'];
    $courier_name = $row1['courier_name'];
    $shipping_date = $row1['delivery_date'];
            if($row1['delivery_date'] == $del){
                $sqll= "UPDATE buy_transaction SET shipping_status = 'Delivered' WHERE user_id = '$user_id'";
             $result = mysqli_query($conn, $sqll);
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
            Your Order # '.$transaction_id.' has been Delivered. Date of delivery: '.$shipping_date.'
            <br><br>

            Note:<br><br>
            If you have any concern regarding the Artwork that you order, Please Contact the owner of the artwork by visiting <a href="artist.php"> The Artist page </a> Thank you and Have a good day!.
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
else{
                redirect_to("orders.php");
}
}
?>