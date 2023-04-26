<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'main/phpmailer/src/Exception.php';
require 'main/phpmailer/src/PHPMailer.php';
require 'main/phpmailer/src/SMTP.php';

include "main/session.php";
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
    $x['name'] = ucwords($_POST['username']);
    $x['email'] = $_POST['email'];
    $x['mobile'] = $_POST['mobileno'];
    $x['address'] = $_POST['address'];
    $x['dob'] = changedateformate($_POST['dob']);
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
    $x['longholding'] = 'No';
    $x['startdatetime'] = changedateformatespecito($_POST['starttime'], "d/m/Y H:i:s", "Y-m-d H:i:s");
    $x['enddatetime'] = changedateformatespecito($_POST['endtime'], "d/m/Y H:i:s", "Y-m-d H:i:s");
    $x['investmentamount'] = $_POST['investmentamount'];
    $x['limit'] = $_POST['limit'];

    $userid = $obj->insertnew($tb_name, $x);
    $defaultstock = array(
        array(
            'Symbol' => 'NIFTY',
            'symboltoken' => '999920000',
        ),
        array(
            'Symbol' => 'SENSEX',
            'symboltoken' => '999901',
        ),
        array(
            'Symbol' => 'RELIANCE',
            'symboltoken' => '2885',
        ),
        array(
            'Symbol' => 'HINDALCO',
            'symboltoken' => '1363',
        ),
        array(
            'Symbol' => 'M&M',
            'symboltoken' => '2031',
        ),
        array(
            'Symbol' => 'INFY',
            'symboltoken' => '1594',
        )
    );
    foreach ($defaultstock as $ds) {
        $jk['Symbol'] = $ds['Symbol'];
        $jk['symboltoken'] = $ds['symboltoken'];
        $jk['ExchType'] = 'C';
        $jk['Expiry'] = '';
        $jk['OptionType'] = '';
        $jk['StrikePrice'] = '0';
        $jk['mktlot'] = '1';
        $jk['added_on'] = date("Y-m-d H:i:s");
        $jk['added_by'] = 0;
        $jk['updated_on'] = date("Y-m-d H:i:s");
        $jk['updated_by'] = 0;
        $jk['status'] = 1;
        $jk['userid'] = $userid;
        if ($jk['Symbol'] === 'SENSEX') {
            $jk['Exch'] = 'B';
        } else {
            $jk['Exch'] = 'N';
        }
        $obj->insertnew('userstocks', $jk);
    }
    $obj->saveactivity("Added Customer by Admin", "", $userid, $employeeid, "Admin", "Added Customer by Admin");
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
    $mail->Subject = "Registration Successfull";
    $mail->AddEmbeddedImage('main/images/indstock.png', 'logo', 'main/images/indstock.png ');
    $mail->AddEmbeddedImage('main/images/envelope.png', 'envelope', 'main/images/envelope.png ');
    $mail->Body = "<div style='text-align:center'><img alt='PHPMailer' style='height:80px;width:150px' src='cid:logo'> </div>
    <div style='border:1px solid darkblue;width:90%;margin:auto'></div><br>
    <div style='text-align:center;margin: auto;width:100%'>
        <img src='cid:envelope' style='height:130px;width:130px' alt='logo'>
        <h3>Hii! 'Mohammed' </h3>
        <div style='font-weight: 600;'>Thanks For Registering on India Stock. </div>
        <div style='font-weight: 600;'>We will notify you about your Approval status shortly.</div>
    </div>";
    $mail->send();

    echo "Redirect : User Added Successfully URLusers";
}
