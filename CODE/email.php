<?php
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
$mail->SetFrom("austinzunigapogi@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello world";
$mail->AddAddress("austinzunigapogi@gmail.com");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 ?>