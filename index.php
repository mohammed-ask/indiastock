<?php
// echo $_SERVER['REQUEST_URI']." ";
$head = "";
if (($_SERVER['HTTP_HOST'] == 'localhost')) {
    $head = "/indiastock";
}
$request = parse_url($_SERVER['REQUEST_URI']);
switch ($request['path']) {
    case "$head/admin/index":                                  // Admin Routes
        require __DIR__ . '/main/admin/index.php';
        break;
    case "$head/admin":
        require __DIR__ . '/main/admin/index.php';
        break;
    case "$head/admin/editstockprice":
        require __DIR__ . '/main/admin/editstockprice.php';
        break;
    case "$head/admin/updatestockprice":
        require __DIR__ . '/main/admin/updatestockprice.php';
        break;
    case "$head/admin/adminlogin":
        require __DIR__ . '/main/admin/adminlogin.php';
        break;
    case "$head/about";
        require __DIR__ . '/main/admin/about.php';
        break;
    case "$head/admin/checkadminlogin";
        require __DIR__ . '/main/admin/checkadminlogin.php';
        break;
    case "$head/admin/viewrole";
        require __DIR__ . '/main/admin/viewrole.php';
        break;
    case "$head/admin/insertuserdirect";
        require __DIR__ . '/main/admin/insertuserdirect.php';
        break;
    case "$head/admin/edituser";
        require __DIR__ . '/main/admin/edituser.php';
        break;
    case "$head/admin/updateuser";
        require __DIR__ . '/main/admin/updateuser.php';
        break;
    case "$head/admin/deleteuser";
        require __DIR__ . '/main/admin/deleteuser.php';
        break;
    case "$head/admin/dashboard";
        require __DIR__ . '/main/admin/dashboard.php';
        break;
    case "$head/admin/userlogindetails";
        require __DIR__ . '/main/admin/userlogindetails.php';
        break;
    case "$head/admin/addinvestmentamount";
        require __DIR__ . '/main/admin/addinvestmentamount.php';
        break;
    case "$head/admin/insertinvestmentamount";
        require __DIR__ . '/main/admin/insertinvestmentamount.php';
        break;
    case "$head/admin/viewfundhistory";
        require __DIR__ . '/main/admin/viewfundhistory.php';
        break;
    case "$head/admin/test";
        require __DIR__ . '/main/admin/test.php';
        break;
    case "$head/admin/editrole";
        require __DIR__ . '/main/admin/editrole.php';
        break;
    case "$head/admin/updaterole";
        require __DIR__ . '/main/admin/update_role.php';
        break;
    case "$head/admin/addrole";
        require __DIR__ . '/main/admin/addrole.php';
        break;
    case "$head/admin/insertrole";
        require __DIR__ . '/main/admin/insertrole.php';
        break;
    case "$head/admin/deleterole";
        require __DIR__ . '/main/admin/deleterole.php';
        break;
    case "$head/admin/permission";
        require __DIR__ . '/main/admin/permission.php';
        break;
    case "$head/admin/addpermission";
        require __DIR__ . '/main/admin/addpermission.php';
        break;
    case "$head/admin/insertpermission";
        require __DIR__ . '/main/admin/insertpermission.php';
        break;
    case "$head/admin/editpermission";
        require __DIR__ . '/main/admin/editpermission.php';
        break;
    case "$head/admin/updatepermission";
        require __DIR__ . '/main/admin/updatepermission.php';
        break;
    case "$head/admin/deletepermission";
        require __DIR__ . '/main/admin/deletepermission.php';
        break;
    case "$head/admin/transaction";
        require __DIR__ . '/main/admin/viewtransaction.php';
        break;
    case "$head/admin/todaytransaction";
        require __DIR__ . '/main/admin/viewtodaytransaction.php';
        break;
    case "$head/admin/users";
        require __DIR__ . '/main/admin/viewusers.php';
        break;
    case "$head/admin/register";
        require __DIR__ . '/main/admin/addusers.php';
        break;
    case "$head/admin/adduser";
        require __DIR__ . '/main/admin/adduser.php';
        break;
    case "$head/admin/pendingapproval";
        require __DIR__ . '/main/admin/pendingapproval.php';
        break;
    case "$head/admin/viewusermodal";
        require __DIR__ . '/main/admin/viewusermodal.php';
        break;
    case "$head/admin/approveuser";
        require __DIR__ . '/main/admin/approveuser.php';
        break;
    case "$head/admin/approvebank";
        require __DIR__ . '/main/admin/approvebank.php';
        break;
    case "$head/admin/closetrades";
        require __DIR__ . '/main/admin/closetrades.php';
        break;
    case "$head/admin/composemail";
        require __DIR__ . '/main/admin/composemail.php';
        break;
    case "$head/admin/insertmail";
        require __DIR__ . '/main/admin/insertmail.php';
        break;
    case "$head/admin/viewinbox";
        require __DIR__ . '/main/admin/viewinbox.php';
        break;
    case "$head/admin/viewmaildetail";
        require __DIR__ . '/main/admin/viewmaildetail.php';
        break;
    case "$head/admin/sentmails";
        require __DIR__ . '/main/admin/sentmails.php';
        break;
    case "$head/admin/insertmessage";
        require __DIR__ . '/main/admin/insertmessage.php';
        break;
    case "$head/admin/employeelist";
        require __DIR__ . '/main/admin/employeelist.php';
        break;
    case "$head/admin/addemployee";
        require __DIR__ . '/main/admin/addemployee.php';
        break;
    case "$head/admin/insertemployee";
        require __DIR__ . '/main/admin/insertemployee.php';
        break;
    case "$head/admin/editemployee";
        require __DIR__ . '/main/admin/editemployee.php';
        break;
    case "$head/admin/updatemployee";
        require __DIR__ . '/main/admin/updatemployee.php';
        break;
    case "$head/admin/employeeclient";
        require __DIR__ . '/main/admin/employeeclient.php';
        break;
    case "$head/admin/allinvestment";
        require __DIR__ . '/main/admin/allinvestment.php';
        break;
    case "$head/admin/pendinginvestment";
        require __DIR__ . '/main/admin/pendinginvestment.php';
        break;
    case "$head/admin/approvedinvestment";
        require __DIR__ . '/main/admin/approvedinvestment.php';
        break;
    case "$head/admin/disapprovedinvestment";
        require __DIR__ . '/main/admin/disapprovedinvestment.php';
        break;
    case "$head/admin/withdrawalrequest";
        require __DIR__ . '/main/admin/withdrawalrequest.php';
        break;
    case "$head/admin/todaytransactions";
        require __DIR__ . '/main/admin/todaytransactions.php';
        break;
    case "$head/admin/alltransactions";
        require __DIR__ . '/main/admin/alltransactions.php';
        break;
    case "$head/admin/approveinvestment";
        require __DIR__ . '/main/admin/approveinvestment.php';
        break;
    case "$head/admin/settings";
        require __DIR__ . '/main/admin/settings.php';
        break;
    case "$head/admin/insertpersonalaccount";
        require __DIR__ . '/main/admin/insertpersonalaccount.php';
        break;
    case "$head/admin/adminprofile";
        require __DIR__ . '/main/admin/adminprofile.php';
        break;
    case "$head/admin/stockdata";
        require __DIR__ . '/main/admin/stockdata.php';
        break;
    case "$head/admin/updateprofile";
        require __DIR__ . '/main/admin/updateprofile.php';    //admin Route close
        break;
    case "$head/admin/viewbankdetails";
        require __DIR__ . '/main/admin/viewbankdetails.php';
        break;
    case "$head/admin/approvewithdrawalreq";
        require __DIR__ . '/main/admin/approvewithdrawalreq.php';
        break;
    case "$head/admin/addstock";
        require __DIR__ . '/main/admin/addstock.php';
        break;
    case "$head/admin/insertaddstock";
        require __DIR__ . '/main/admin/insertaddstock.php';
        break;
    case "$head/admin/closebrockertrade";
        require __DIR__ . '/main/admin/closebrockertrade.php';
        break;
    case "$head/admin/insertclosebrockertrade";
        require __DIR__ . '/main/admin/insertclosebrockertrade.php';
        break;
    case "$head/admin/logout";
        require __DIR__ . '/main/logout.php';
        break;
    case "$head/logout";
        require __DIR__ . '/main/logout.php';
        break;
    case "$head/index":                                    //User Routes
        require __DIR__ . '/main/index.php';
        break;
    case "$head/":
        require __DIR__ . '/main/index.php';
        break;
    case "$head";
        require __DIR__ . '/main/index.php';
        break;
    case "$head/register";
        require __DIR__ . '/main/addusers.php';
        break;
    case "$head/dummyregister":                                    //User Routes
        require __DIR__ . '/main/dummyregister.php';
        break;
    case "$head/insertuser";
        require __DIR__ . '/main/insertuser.php';
        break;
    case "$head/login";
        require __DIR__ . '/main/login.php';
        break;
    case "$head/checklogin";
        require __DIR__ . '/main/checklogin.php';
        break;
    case "$head/dashboard";
        require __DIR__ . '/main/dashboard.php';
        break;
    case "$head/mail";
        require __DIR__ . '/main/mail.php';
        break;
    case "$head/insertmail";
        require __DIR__ . '/main/insertmail.php';
        break;
    case "$head/viewmaildetail";
        require __DIR__ . '/main/viewmaildetail.php';
        break;
    case "$head/profile";
        require __DIR__ . '/main/profile.php';
        break;
    case "$head/updateprofile";
        require __DIR__ . '/main/updateprofile.php';
        break;
    case "$head/bankaccountchange";
        require __DIR__ . '/main/bankaccountchange.php';
        break;
    case "$head/insertbank";
        require __DIR__ . '/main/insertbank.php';
        break;
    case "$head/fund";
        require __DIR__ . '/main/fund.php';
        break;
    case "$head/addfund";
        require __DIR__ . '/main/addfund.php';
        break;
    case "$head/insertfund";
        require __DIR__ . '/main/insertfund.php';
        break;
    case "$head/requestwithdrawalamount";
        require __DIR__ . '/main/requestwithdrawalamount.php';
        break;
        // case "$head/admin/requestwithdrawal";
        //     require __DIR__ . '/main/admin/requestwithdrawal.php';
        //     break;
    case "$head/admin/requestwithdrawalamount";
        require __DIR__ . '/main/admin/requestwithdrawalamount.php';
        break;
    case "$head/insertrequestwithdrawal";
        require __DIR__ . '/main/insertrequestwithdrawal.php';
        break;
    case "$head/searchstock";
        require __DIR__ . '/main/searchstock.php';
        break;
    case "$head/market";
        require __DIR__ . '/main/market.php';
        break;
    case "$head/buystock";
        require __DIR__ . '/main/buystock.php';
        break;
    case "$head/insertbuystock";
        require __DIR__ . '/main/insertbuystock.php';
        break;
    case "$head/sellstock";
        require __DIR__ . '/main/sellstock.php';
        break;
    case "$head/insertsellstock";
        require __DIR__ . '/main/insertsellstock.php';
        break;
    case "$head/closetrade";
        require __DIR__ . '/main/closetrade.php';
        break;
    case "$head/insertclosetrade";
        require __DIR__ . '/main/insertclosetrade.php';
        break;
    case "$head/portfolio";
        require __DIR__ . '/main/portfolio.php';
        break;
    case "$head/viewchart";
        require __DIR__ . '/main/viewchart.php';
        break;
    case "$head/test";
        require __DIR__ . '/main/test.php';
        break;
    case "$head/forgotpassword";
        require __DIR__ . '/main/forgotpassword.php';
        break;
    case "$head/checkforgetpassword";
        require __DIR__ . '/main/checkforgetpassword.php';
        break;
    case "$head/resetpassword";
        require __DIR__ . '/main/resetpassword.php';
        break;
    case "$head/insertresetpassword";
        require __DIR__ . '/main/insertresetpassword.php';
        break;
    case "$head/cron/settleamount";
        require __DIR__ . '/main/cron/tradesettlement.php';
        break;
    case "$head/cron/settletradethursday";
        require __DIR__ . '/main/cron/settletradethursday.php';
        break;
    case "$head/gitpull";
        require __DIR__ . '/main/guthubpull.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/404.html';
        # code...
        break;
}
