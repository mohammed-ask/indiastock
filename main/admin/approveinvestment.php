<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'main/PHPMailer/src/Exception.php';
require 'main/PHPMailer/src/PHPMailer.php';
require 'main/PHPMailer/src/SMTP.php';

include "main/session.php";
$obj->saveactivity("Fund Request Request Approved/Disapprove", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Fund Request Request Approved/Disapprove");
$id = $_GET['hakuna'];
$rowfund = $obj->selectextrawhere("fundrequest", "id=" . $id . "")->fetch_assoc();
$email = $obj->selectfieldwhere("users", "email", "id=" . $rowfund['userid'] . "");
$investmentamount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $rowfund['userid'] . "");
if ($_GET['what'] === 'Approve' && $rowfund['status'] == 0) {
    $xx['status'] = 1;
    $xx["approvedon"] = date('Y-m-d H:i:s');
    $xx['approvedby'] = $employeeid;
    $obj->update("fundrequest", $xx, $id);
    $kk['investmentamount'] = $investmentamount + $rowfund['amount'];
    $obj->update("users", $kk, $rowfund['userid']);
} elseif ($_GET['what'] === 'Reject' && $rowfund['status'] == 0) {
    $yy['status'] = 91;
    $yy["approvedon"] = date('Y-m-d H:i:s');
    $yy['approvedby'] = $employeeid;
    $obj->update("fundrequest", $yy, $id);
} elseif ($rowfund['status'] != 0) {
    $obj->saveactivity("Already Approved/Disapprove but run again", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Already Approved/Disapprove but run again");
    die;
}
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = $host;
$mail->SMTPAuth = true;
$mail->Username = "$sendmailfrom";
$mail->Password = "$sendemailpassword";
$mail->isSendmail();
$mail->SMTPSecure = 'ssl';
$mail->Port = $port;
$mail->setFrom("$sendmailfrom", 'PMS Equity Team');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->addReplyTo("$sendmailfrom", 'PMS Equity Team');
$mail->Subject = 'PMS Equity Fund Request';
ob_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Email Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
        @media screen {
            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 400;
                src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
            }

            @font-face {
                font-family: 'Poppins', sans-serif;
                font-style: normal;
                font-weight: 700;
                src: local('Poppins Bold'), local('Poppins-Bold'), url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z11lFQ.woff2) format('woff2');
            }
        }

        /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
        body,
        table,
        td,
        a {
            -ms-text-size-adjust: 100%;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
        }

        /**
   * Remove extra space added to tables and cells in Outlook.
   */


        /**
   * Better fluid images in Internet Explorer.
   */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /**
   * Remove blue links for iOS devices.
   */
        a[x-apple-data-detectors] {
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: none !important;
        }

        /**
   * Fix centering issues in Android 4.4.
   */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        body {
            width: 100% !important;
            height: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /**
   * Collapse table borders to avoid space between cells.
   */
        table {
            border-collapse: collapse !important;
        }

        a {
            color: #ff6100;
            font-weight: 600;
        }

        img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 14px !important;
        }
    </style>

</head>

<body style="background-color: #e9ecef;">

    <!-- start body -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 5%; margin-bottom: 5%;">


        <!-- start hero -->
        <tr>
            <td align="center" bgcolor="#e9ecef">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">

                            <h2 style="margin: 0; font-size: 20px; font-weight: 700; letter-spacing: -1px; word-spacing: 2px;">
                                Your Transaction of ₹ <?= $rowfund['amount'] ?> in PMS Equity Wallet is <?= $_GET['what'] === 'Approve' ? "Successful" : 'Failed' ?>. </h2>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end hero -->

        <!-- start copy block -->
        <tr>
            <td align="center" bgcolor="#e9ecef">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                    <!-- start copy -->
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px 24px 5px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;">

                            <p style="text-decoration: underline;">Your Transaction Details Given Below<br>
                            <div style="margin-bottom:5px;"><span style="font-weight: 600; margin-right: 105px;"> Amount
                                </span> <span>
                                    ₹ <?= $rowfund['amount'] ?>
                                </span></div>
                            <div style="margin-bottom:5px;"><span style="font-weight: 600; margin-right: 62px;">
                                    Transaction ID</span> <span>
                                    <?= $rowfund['transactionid'] ?>
                                </span></div>
                            <div style="margin-bottom:5px;"><span style="font-weight: 600; margin-right: 47px;"> Payment
                                    Method</span> <span>
                                    <?= $rowfund['paymentmethod'] ?>
                                </span></div>
                            <div style="margin-bottom:5px;"><span style="font-weight: 600; margin-right: 45px;">
                                    Transaction Time</span> <span>
                                    <?= changedateformatespecito($rowfund['added_on'], "Y-m-d H:i:s", "d M, Y H:i") ?>
                                </span></div>
                            <div style="margin-bottom:5px;"><span style="font-weight: 600; margin-right: 35px;">
                                    Transaction Status</span>
                                <?php if ($_GET['what'] === 'Approve') { ?><span style="font-weight:bold; color: green;">
                                        Successful
                                    </span><?php } else { ?> <span style="font-weight:bold; color: rgb(207, 32, 8);">
                                        Failed
                                    </span><?php } ?> </div>

                            </p>
                        </td>
                    </tr>
                    <!-- end copy -->



                    <!-- start copy -->
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Poppins', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <p style="margin: 0;">If you have any questions or need assistance, our support team is available 24/7 to help at <a href="mailto:info@pmsequity.com">info@pmsequity.com</a>


                            </p>
                            <p>
                                Thank you for choosing PMS Equity. We look forward to helping you achieve your
                                investment goals.
                            </p>
                        </td>
                    </tr>
                    <!-- end copy -->

                    <!-- start copy -->
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                            <p style="margin: 0;">Best regards,<br>PMS Equity Team</p><img width="145px" style=" margin-top: 20px;" src="https://pms-equity.com/main/images/pmslogo.png">
                        </td>
                    </tr>
                    <!-- end copy -->

                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end copy block -->

</body>

</html>
<?php
$templatedata = ob_get_contents();
ob_end_clean();
$mail->Body = $templatedata;
$mail->send();
