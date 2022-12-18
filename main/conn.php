<?php

date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');
$platform = "Production";
$host = "localhost";
$database_Username = "root";
$database_Password = "";
$database_Name = "indiastock";
$siteurl = "http://localhost/indiastock/";
$port = 3306;
$platform = "test";
if (($_SERVER['HTTP_HOST'] == 'localhost')) {
    if (!defined("BASE_URL")) {
        define("BASE_URL", "http://" . $_SERVER['HTTP_HOST'] . "/indiastock/");
    }
    $host = "localhost";
    $database_Username = "root";
    $database_Password = "";
    $database_Name = "indiastock";
    $siteurl = "http://localhost/indiastock/";
    $port = 3306;
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $platform = "test";
}
//  elseif ($_SERVER['HTTP_HOST'] == 'esavaritest.alldept.com' || $_SERVER['HTTP_HOST'] == 'demo.alldept.com') {
//     if (!defined("BASE_URL")) {
//         define("BASE_URL", "https://" . $_SERVER['HTTP_HOST'] . "/");
//     }
//     $host = "localhost";
//     $database_Username = "opgtgqmy_esavari";
//     $database_Password = "IQ[^_Kj%hKlQ";
//     $database_Name = "opgtgqmy_esavaritest";
//     $siteurl = "https://" . $_SERVER['HTTP_HOST'] . "/";
//     $port = 3306;
//     $platform = "test";
// } else if ($_SERVER['HTTP_HOST'] == 'esavari.alldept.com') {

//     if (!defined("BASE_URL")) {
//         define("BASE_URL", "https://esavari.alldept.com/");
//     }
//     $host = "localhost";
//     $database_Username = "opgtgqmy_esavari";
//     $database_Password = "IQ[^_Kj%hKlQ";
//     $database_Name = "opgtgqmy_esavari";
//     $siteurl = "https://esavari.alldept.com/";
//     $port = 3306;
//     ini_set('display_errors', 1);
//     error_reporting(E_ALL);

//     $platform = "Production";
// }

date_default_timezone_set('Asia/Kolkata');
/* object for db class in function.php $obj */
$obj = new db($host, $database_Username, $database_Password, $database_Name, $port);
$sendmailfrom = "";
$sendemailpassword = "";

$defaultpagetitle = "Indiastock";
$defaultemail = $sendmailfrom;
$defaultemailpassword = $sendemailpassword;

$compdata = $obj->selectextrawhere("personal_detail", "status=11")->fetch_assoc();
$companyname = $compdata["company_name"];
$bankname = $compdata["bank_name"];
$bankbranch = $compdata["company_name"];
$bankaccountno = $compdata["account_number"];
$bankaccountname = $compdata["account_name"];
// $bankactype = $obj->selectfield("bank_account_type", "name", "id", $compdata["account_type_id"]);
$bankifsccode = $compdata["ifsc_code"];
$bankmicr = $compdata["micr_no"];
$companylocation = $compdata["city"];
$companypanno = $compdata["pan_no"];
$companysaccode = $compdata["sac_code"];
$companysmeno = $compdata["sme_no"];
$companycinno = $compdata["cin_no"];
$companygstno = $compdata["gst_no"];
$topadd = $compdata["address_1"] . " " . $compdata["city"] . " Pincode-" . $compdata["pincode"];

$state = ($compdata["state"] == "") ? $obj->selectfield("state_list", "state", "id", $compdata["indian_state"]) : $state;
$country = $obj->selectfield("country", "country_name", "id", $compdata["country_id"]);

$companyaddress = $compdata["address_1"] . ", " . $compdata["city"] . "-" . $compdata["pincode"] . " (" . $state . ") " . $country;
$companyaddress1 = $compdata["address_1"] . ", <br>" . $compdata["city"] . "-" . $compdata["pincode"] . " (" . $state . ") " . $country;
$companyphone = $compdata["phone"];
$companyemailid = $compdata["email"];
$companywebsite = $compdata["website"];
$companyhsn = $compdata["hsn_code"];
$contactperson = $compdata["person_name"];
$companylogo = $obj->fetchattachment($compdata["uploadfile_id"]);
$companyfavicon = $obj->fetchattachment($compdata["faviconicon"]);
$nooflicence = $compdata['licence'];

?>
