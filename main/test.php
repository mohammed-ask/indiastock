<?php
include 'main/session.php';
// echo $obj->getrequesttoken();
// echo $obj->getaccesstoken();
// echo $obj->getcandledata();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = $host;
$mail->SMTPAuth = $smtpauth;
$mail->Username = "$sendmailfrom";
$mail->Password = "$sendemailpassword";
if ($issmtp) {
    $mail->SMTPSecure = 'ssl';
}
$mail->Port = $port;
$mail->setFrom("$sendmailfrom");
$mail->addAddress('mohammedmaheswer12@gmail.com');
$mail->isHTML(true);
$mail->Subject = 'yoyoyo';
// $attachfile = $obj->selectextrawhere('maildocuments', "mailid=$mailid");
// while ($rowfile = $obj->fetch_assoc($attachfile)) {
//     $path = $obj->selectfieldwhere('uploadfile', "path", "id=" . $rowfile['path'] . "");
//     $orgname = $obj->selectfieldwhere('uploadfile', "orgname", "id=" . $rowfile['path'] . "");
//     $mail->addAttachment($path, $orgname);
// }
$mail->Body = 'this is bboady';
$mail->send();

echo 'runnpage';
