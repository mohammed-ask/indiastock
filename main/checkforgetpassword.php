<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './main/PHPMailer/src/Exception.php';
require './main/PHPMailer/src/PHPMailer.php';
require './main/PHPMailer/src/SMTP.php';

include './main/function.php';
include './main/conn.php';
$id = $obj->selectfieldwhere("users", "id", "email = '" . $_POST['email'] . "'");
if (empty($id)) {
    echo "<div  class='bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md' role='alert'>Email Not Registered!</div>";
    die;
}
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
$mail->addAddress($_POST['email']);
$mail->isHTML(true);
$mail->Subject = "Password Reset";
$mail->AddEmbeddedImage('main/images/indstock.png', 'logo', 'main/images/indstock.png ');
$mail->AddEmbeddedImage('main/images/envelope.png', 'envelope', 'main/images/envelope.png ');
$mail->Body = "<div style='text-align:center'><img alt='PHPMailer' style='height:80px;width:150px' src='cid:logo'> </div>
    <div style='border:1px solid darkblue;width:90%;margin:auto'></div><br>
    <div style='text-align:center;margin: auto;width:100%'>
        <img src='cid:envelope' style='height:130px;width:130px' alt='logo'>
        <h3>Hii! 'Mohammed' </h3>
        <div style='font-weight: 600;'>Click below to reset your password. </div>
        <div style='font-weight: 600;'><a href='$redirecturl/resetpassword?hakuna=$id'>Password Reset</a></div>
    </div>";
$mail->send();
