<?php
session_start();
include './function.php';
include './conn.php';
$username = $_POST['username'];
$email = $_POST['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$code = rand(1000, 9999);
$_SESSION['otp'] = $code;
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = $host;
$mail->SMTPAuth = $smtpauth;
$mail->Username = "$sendmailfrom";
$mail->Password = "$sendemailpassword";
$mail->isSendmail();
$mail->SMTPSecure = 'ssl';
$mail->Port = $port;
$mail->setFrom("$sendmailfrom");
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "Registration OTP";
$mail->AddEmbeddedImage('./images/indstock.png', 'logo', './images/indstock.png ');
$mail->Body = "<div style='text-align:center'><img alt='PHPMailer' style='height:80px;width:150px' src='cid:logo'> </div>
<div style='border:1px solid darkblue;width:90%;margin:auto'></div><br>
<div style='text-align:center;margin: auto;width:100%'>
    
    <h3>Hii! " . $username . " </h3>
    <div style='font-weight: 600;'>Your OTP is $code </div>
</div>";
$mail->send();
echo "Success";
