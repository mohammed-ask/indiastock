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
} elseif ($_SERVER['HTTP_HOST'] == 'stocktradeindia.000webhostapp.com') {
    if (!defined("BASE_URL")) {
        define("BASE_URL", "https://" . $_SERVER['HTTP_HOST'] . "/");
    }
    $host = "localhost";
    $database_Username = "id20083609_root";
    $database_Password = "^yv3Z(G([N7{qrxW";
    $database_Name = "id20083609_indiastock";
    $siteurl = "https://" . $_SERVER['HTTP_HOST'] . "/";
    $port = 3306;
    $platform = "test";
} elseif ($_SERVER['HTTP_HOST'] == 'pmsequity.com') {
    if (!defined("BASE_URL")) {
        define("BASE_URL", "https://pmsequity.com/");
    }
    $host = "localhost";
    $database_Username = "hc020wtvnu2k";
    $database_Password = "PMSEquity@1998";
    $database_Name = "pmsequity";
    $siteurl = "https://pmsequity.com/";
    $port = 3306;
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $platform = "Production";
}

date_default_timezone_set('Asia/Kolkata');
/* object for db class in function.php $obj */
$obj = new db($host, $database_Username, $database_Password, $database_Name, $port);

// Main Settings
$sendmailfrom = $platform === 'test'  ? "mohammedhusain559@gmail.com" : 'noreply.pmsequity@gmail.com';
$sendemailpassword = $platform === 'test' ? "svcbitzquirlpwxk" : 'curwhokpyytrubll';
$supportmail = 'support@pmsequity.com';
$port = $platform === 'test' ? 465 : 25;
$host = $platform === 'test' ? 'smtp.gmail.com' : 'localhost';
$smtpauth = $platform === 'test' ? true : false;
$issmtp = $platform === 'test' ? true : false;

$defaultemailpassword = $sendemailpassword;

$compdata = $obj->selectextrawhere("personal_detail", "status=11")->fetch_assoc();
$companyname = $compdata["company_name"];
$bankname = $compdata["bank_name"];
$bankbranch = $compdata["company_name"];
$bankaccountno = $compdata["account_number"];
$bankaccountname = $compdata["account_name"];
// $bankactype = $obj->selectfield("bank_account_type", "name", "id", $compdata["account_type_id"]);
$bankifsccode = $compdata["ifsc_code"];
$companylocation = $compdata["city"];
$topadd = $compdata["address_1"] . " " . $compdata["city"] . " Pincode-" . $compdata["pincode"];

$state = ($compdata["state"] == "") ? $obj->selectfield("state_list", "state", "id", $compdata["indian_state"]) : $state;
$country = $obj->selectfield("country", "country_name", "id", $compdata["country_id"]);

$companyaddress = $compdata["address_1"] . ", " . $compdata["city"] . "-" . $compdata["pincode"] . " (" . $state . ") " . $country;
$companyaddress1 = $compdata["address_1"] . ", <br>" . $compdata["city"] . "-" . $compdata["pincode"] . " (" . $state . ") " . $country;
$companyphone = $compdata["phone"];
$companyemailid = $compdata["email"];
$companywebsite = $compdata["website"];
$contactperson = $compdata["person_name"];
$companylogo = $obj->fetchattachment($compdata["uploadfile_id"]);
$companyfavicon = $obj->fetchattachment($compdata["faviconicon"]);
$qrimage = $obj->fetchattachment($compdata['paymentqr']);
$upiid = $compdata['upiid'];
$requesttoken = '';
$redirecturl = ($platform == "test") ?  "http://localhost/indiastock" : "https://pmsequity.com";
if (isset($_GET['RequestToken'])) {
    $requesttoken = $_GET['RequestToken'];
}
// get current date and time
$now = new DateTime();
$dayOfWeek = $now->format('N');
$hour = $now->format('G');

define("REQUEST_TOKEN", $requesttoken); //right
define("APP_NAME", "5P51842644"); //right
define("CLIENT_CODE", "51842644"); //right
define("APP_VERSION", "1.0"); //right
define("KEY", "GN26BJxQ3LnyNJ5vCi8cJobynsIdMgSp"); //right
define("OS_NAME", "WEB"); //right
define("USER_ID", "E1k4ZqoZzfz"); //right
define("PASSWORD", "BYcnrCZnKPV"); //right