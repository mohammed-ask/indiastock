<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include "session.php";


// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
$adminemail = $obj->selectfieldwhere('users', "email", "id=" . $employeeid . "");
$receivermail = $obj->selectfieldwhere('users', "email", "id=" . $_POST['userid'] . "");
$path = "main/mailfiles";
$vy['added_on'] = date('Y-m-d H:i:s');
$vy['added_by'] = $employeeid;
$vy['updated_on'] = date('Y-m-d H:i:s');
$vy['updated_by'] = $employeeid;
$vy['status'] = 1;
$vy['senderid'] = $employeeid;
$vy['receiverid'] = $_POST['userid'];
$vy['subject'] = $_POST['subject'];
$vy['message'] = $_POST['message'];
$mailid = $obj->insertnew('mail', $vy);
if (!empty($_FILES['files']['name'])) {
    foreach ($_FILES['files']["name"] as $key => $value) {
        $name = 'path' . $key;
        $document[$name]['name'] = $_FILES['files']['name'][$key];
        $document[$name]['type'] = $_FILES['files']['type'][$key];
        $document[$name]['tmp_name'] = $_FILES['files']['tmp_name'][$key];
        $document[$name]['size'] = $_FILES['files']['size'][$key];
        $document[$name]['error'] = $_FILES['files']['error'][$key];
        $y['path'] = $obj->uploadfilenew($path, $document, $name, array("png", "jpg", "jpeg", "pdf", "word", "webp"));
        $y['senderid'] = $employeeid;
        $y['receiverid'] = $_POST['userid'];
        $y['mailid'] = $mailid;
        $y['added_on'] = date('Y-m-d H:i:s');
        $y['added_by'] = $employeeid;
        $y['updated_on'] = date('Y-m-d H:i:s');
        $y['updated_by'] = $employeeid;
        $y['status'] = 1;
        $postdata = $y;
        $tb_name = "maildocuments";
        $pradin = $obj->insertnew($tb_name, $postdata);
    }
}
if ($adminemail == $sendmailfrom) {
    echo "inside";
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "$sendmailfrom";
    $mail->Password = "$sendemailpassword";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom("$sendmailfrom");
    $mail->addAddress($receivermail);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $attachfile = $obj->selectextrawhere('maildocuments', "mailid=$mailid");
    while ($rowfile = $obj->fetch_assoc($attachfile)) {
        $path = $obj->selectfieldwhere('uploadfile', "path", "id=" . $rowfile['path'] . "");
        $orgname = $obj->selectfieldwhere('uploadfile', "orgname", "id=" . $rowfile['path'] . "");
        $mail->addAttachment($path, $orgname);
    }
    $mail->Body = $_POST['message'];
    $mail->send();
}
