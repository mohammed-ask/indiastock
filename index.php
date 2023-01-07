<?php
// echo $_SERVER['REQUEST_URI']." ";
$head = "";
if (($_SERVER['HTTP_HOST'] == 'localhost')) {
    $head = "/indiastock";
}
$request = parse_url($_SERVER['REQUEST_URI']);
switch ($request['path']) {
    case "$head/admin/index":
        require __DIR__ . '/main/admin/index.php';
        break;
    case "$head/admin":
        require __DIR__ . '/main/admin/index.php';
        break;
    case "$head/admin/adminlogin":
        require __DIR__ . '/main/admin/adminlogin.php';
        break;
    case "$head/index":
        require __DIR__ . '/main/index.php'; //User pages
        break;
    case "$head/":
        require __DIR__ . '/main/index.php';
        break;
    case "$head";
        require __DIR__ . '/main/index.php';
        break;
        // case "$head/administrator";
        //     require __DIR__ . '/main/admin/admin.php';
        //     break;
    case "$head/about";
        require __DIR__ . '/main/admin/about.php';
        break;
    case "$head/login";
        require __DIR__ . '/main/admin/login.php';
        break;
        // case "$head/adminlogin";
        //     require __DIR__ . '/main/admin/adminlogin.php';
        //     break;
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
    case "$head/admin/checklogin";
        require __DIR__ . '/main/admin/checklogin.php';
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
    case "$head/admin/insertuser";
        require __DIR__ . '/main/admin/insertuser.php';
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
    case "$head/admin/requestwithdrawal";
        require __DIR__ . '/main/admin/requestwithdrawal.php';
        break;
    case "$head/admin/requestwithdrawalamount";
        require __DIR__ . '/main/admin/requestwithdrawalamount.php';
        break;
    case "$head/admin/insertrequestwithdrawal";
        require __DIR__ . '/main/admin/insertrequestwithdrawal.php';
        break;
    case "$head/admin/approveinvestment";
        require __DIR__ . '/main/admin/approveinvestment.php';
        break;
    case "$head/admin/forgotpassword";
        require __DIR__ . '/main/admin/forgotpassword.php';
        break;
    case "$head/admin/checkforgetpassword";
        require __DIR__ . '/main/admin/checkforgetpassword.php';
        break;
    case "$head/admin/resetpassword";
        require __DIR__ . '/main/admin/resetpassword.php';
        break;
    case "$head/admin/insertresetpassword";
        require __DIR__ . '/main/admin/insertresetpassword.php';
        break;
    case "$head/admin/settings";
        require __DIR__ . '/main/admin/settings.php';
        break;
    case "$head/admin/insertpersonalaccount";
        require __DIR__ . '/main/admin/insertpersonalaccount.php';
        break;
    case "$head/admin/logout";
        require __DIR__ . '/main/admin/logout.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/main/admin/404.php';
        # code...
        break;
}
