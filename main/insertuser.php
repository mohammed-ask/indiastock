<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

include './function.php';
include './conn.php';
if ($_SESSION['otp'] != $_POST['otp']) {
    echo "Failed";
} else {
    $emailcount = $obj->selectfieldwhere('users', "count(id)", "email='" . $_POST['email'] . "' and status != 99");
    $empcode = $obj->selectfieldwhere('users', 'count(id)', 'usercode="' . trim($_POST['employeeref']) . '" and type = 1');
    if ($emailcount > 0) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! This Mail Already Exists </div>";
    } elseif ($empcode != 1 && !empty($_POST['employeeref'])) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! Employee ID Does Not Match With Our Existing Employees  </div>";
    } else {

        $x = array();
        $tb_name = 'users';
        $result4 = $obj->selectextrawhere('codegenerator', "`category` like 'usercode'");
        $num4 = $obj->total_rows($result4);
        $codegeneratorid = 0;
        $codenumber = 0;
        if ($num4) {
            $row4 = $obj->fetch_assoc($result4);
            $codegeneratorid = $row4['id'];
            $codenumber = $row4['number'] + 1;
            $generatedcode = sprintf('%04d', $codenumber);
            // $month = strtoupper(date("M", strtotime($date)));
            $uniqueid = str_replace(array("{prefix}", "{number}"), array($row4['prefix'], $generatedcode), $row4['pattern']);
        } else {
            $cg['prefix'] = "USER";
            $cg['number'] = 0;
            $cg['pattern'] = "{prefix}{number}";
            $cg['category'] = "usercode";
            // $fsed = getfirstandlastday($date);
            $cg['addedon'] = date("Y-m-d H:i:s");
            $cg['addedby'] = $employeeid;
            $cg['status'] = 1;
            $codegeneratorid = $obj->insertnew("codegenerator", $cg);
            $codenumber = 1;
            $generatedcode = sprintf('%04d', $codenumber);
            $uniqueid = str_replace(array("{prefix}", "{number}"), array($cg['prefix'], $generatedcode), $cg['pattern']);
        }
        $n['number'] = $codenumber;
        $obj->update("codegenerator", $n, $codegeneratorid);
        $x['usercode'] = $uniqueid;
        $x['added_on'] = date('Y-m-d H:i:s');
        // $x['added_by'] = $employeeid;
        $x['updated_on'] = date('Y-m-d H:i:s');
        // $x['updated_by'] = $employeeid;
        $x['status'] = 0;
        $x['name'] = $_POST['username'];
        $x['email'] = $_POST['email'];
        $x['mobile'] = $_POST['mobileno'];
        $x['address'] = $_POST['address'];
        $x['dob'] = $_POST['dob'];
        $x['adharno'] = $_POST['adharno'];
        $x['panno'] = $_POST['panno'];
        $x['bankname'] = $_POST['bankname'];
        $x['accountno'] = $_POST['accountno'];
        $x['ifsc'] = $_POST['ifsc'];
        $x['employeeref'] = $_POST['employeeref'];
        $x['password'] = $_POST['password'];
        // $x['policyread'] = $_POST['policyread'];
        $x['type'] = 2;
        $x['role'] = 2;
        $pradin = $obj->insertnew($tb_name, $x);
        $obj->saveactivity("Customer Registered", "", $pradin, $pradin, "User", "Customer Registered");
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "$sendmailfrom";
        $mail->Password = "$sendemailpassword";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom("$sendmailfrom");
        $mail->addAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = "Registration Successfull";
        $mail->AddEmbeddedImage('./images/indstock.png', 'logo', './images/indstock.png ');
        $mail->AddEmbeddedImage('./images/envelope.png', 'envelope', './images/envelope.png ');
        $mail->Body = "<div style='text-align:center'><img alt='PHPMailer' style='height:80px;width:150px' src='cid:logo'> </div>
    <div style='border:1px solid darkblue;width:90%;margin:auto'></div><br>
    <div style='text-align:center;margin: auto;width:100%'>
        <img src='cid:envelope' style='height:130px;width:130px' alt='logo'>
        <h3>Hii! " . $_POST['username'] . " </h3>
        <div style='font-weight: 600;'>Thanks For Registering on India Stock. </div>
        <div style='font-weight: 600;'>We will notify you about your Approval status shortly.</div>
    </div>";
        $mail->send();
        echo "Success";
    }
}
