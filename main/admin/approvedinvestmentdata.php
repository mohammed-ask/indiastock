<?php
include '../session.php';
/* @var $obj db */
$limit = $_GET['length'];
$start = $_GET['start'];
$i = 1;
$return['recordsTotal'] = 0;
$return['recordsFiltered'] = 0;
$return['draw'] = $_GET['draw'];
$return['data'] = array();
$orderdirection = "";
if (isset($_GET['order'][0]['dir'])) {
    $orderdirection = $_GET['order'][0]['dir'];
}
$oary = array('users.id', 'users.name', 'users.email', 'users.mobile', 'users.panno', 'users.dob', 'users.address', 'users.bankname', 'users.accountno', 'users.ifsc', 'users.password', 'users.cost', 'users.investmentamount');
$ocoloum = "";
if (isset($_GET['order'][0]['column'])) {
    $ci = $_GET['order'][0]['column'];
    $ocoloum = $oary[$ci];
}
$order = "";
if (!empty($ocoloum)) {
    $order = " order by $ocoloum $orderdirection ";
}
$search = "";
if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
    $sv = $_GET['search']['value'];
    $search .= " and (users.name like '%$sv%' or users.email like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and users.name like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and users.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$join = "inner join users on users.id = withdrawalrequests.userid";
$return['recordsTotal'] = $obj->selectfieldwhere("withdrawalrequests $join ", "count(withdrawalrequests.id)", "withdrawalrequests.status in (1) ");
$return['recordsFiltered'] = $obj->selectfieldwhere("withdrawalrequests $join", "count(withdrawalrequests.id)", "withdrawalrequests.status in (1) $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "withdrawalrequests $join",
    "withdrawalrequests.id,name,userid,mobile,withdrawalrequests.added_on,remark,withdrawalrequests.status,amount",
    "withdrawalrequests.status in (1) $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = "<strong>" . $row['name'] . "</strong>";
    $n[] = $row['mobile'];
    $n[] =  $row['added_on'];
    $n[] =  "<strong>" . $row['amount'] . "</strong>";
    $n[] =  $row['remark'];
    $n[] =  'Google Pay';

    $n[] =    "<li style='background-color:#eb8a88 ; border-radius: 5px;' class='flex'>
        <a class='inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200' onclick='fun1(\"" . $row['id'] . " \", \"approveinvestment\", \"resultid\",\"Reject\")'>

            <button style='color: black;'>Disapprove</button>
        </a>
    </li>";

    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);