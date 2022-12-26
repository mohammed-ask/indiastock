<?php
include './session.php';
/* @var $obj db */
$id = $_GET['hakuna'];
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
$oary = array('userinvestmentlog.id', 'userinvestmentlog.userid', 'userinvestmentlog.remark', '');
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
    $search .= " and (userinvestmentlog.userid like '%$sv%' or userinvestmentlog.remark like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and userinvestmentlog.userid like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and userinvestmentlog.remark like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$return['recordsTotal'] = $obj->selectfieldwhere("userinvestmentlog  ", "count(userinvestmentlog.id)", "status=1 and userid = $id");
$return['recordsFiltered'] = $obj->selectfieldwhere("userinvestmentlog ", "count(userinvestmentlog.id)", "status=1 and userid = $id $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "userinvestmentlog ",
    "`userinvestmentlog`.`amount`,`userinvestmentlog`.`userid`, `userinvestmentlog`.`remark`,`userinvestmentlog`.`date`,`userinvestmentlog`.`id` ",
    "status=1 and userid = $id $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $obj->selectfieldwhere("users", "name", "id=" . $row['userid'] . "");
    $n[] = $row['amount'];
    $n[] = $row['remark'];
    $n[] = changedateformatespecito($row['date'], "Y-m-d", "d/m/Y");
    // $a = "";
    // if (in_array(83, $userinvestmentlog)) {
    //     $a = '<a class="px-4 py-2  text-sm  bg-blue  rounded-lg " href="editpermission?hakuna=' . $row['id'] . '" class="btn btn-blue">Edit</a>';
    // }
    // if (in_array(84, $userinvestmentlog)) {
    //     $a .= "<a style='cursor: pointer;' class='px-4 py-2 ml-1 text-sm font-medium leading-5 text-white  bg-red  rounded-lg '  onclick='del(\"" . $row['id'] . "\", \"deletepermission\", \"Delete Role \")' >Delete</a>";
    // }
    // $n[] = $a;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
