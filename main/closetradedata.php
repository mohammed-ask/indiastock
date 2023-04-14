<?php
include 'session.php';
/* @var $obj db */
$id = $employeeid;
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
$oary = array('stocktransaction.id', 'stocktransaction.userid', 'stocktransaction.exchange', 'stocktransaction.symbol', 'stocktransaction.qty', 'stocktransaction.price', 'stocktransaction.totalamount', 'stocktransaction.tradestatus');
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
    $search .= " and (stocktransaction.userid like '%$sv%' or stocktransaction.exchange like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and stocktransaction.userid like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and stocktransaction.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$join = "inner join closetradedetail on closetradedetail.tradeid =stocktransaction.id ";
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status = 1 and stocktransaction.userid = $id and tradestatus='Close'");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status = 1 and stocktransaction.userid = $id and tradestatus='Close' $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction $join",
    "stocktransaction.id,stocktransaction.symbol,stocktransaction.qty,stocktransaction.price,closetradedetail.price as cprice,stocktransaction.totalamount,stocktransaction.trademethod,stocktransaction.added_on",
    "stocktransaction.status = 1 and stocktransaction.userid = $id and tradestatus='Close' $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $row['symbol'];
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "dM,Y");
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i A");
    $n[] = $row['qty'];
    $n[] = $row['price'];
    $n[] = $row['qty'] * $row['price'];
    $n[] = $row['trademethod'];
    $n[] = round(($row['cprice'] - $row['price']) * 100 / $row['price'], 2);
    $n[] = round($row['cprice'] - $row['price'], 2);
    $n[] = '<strong class="text-warning">Closed<strong>';
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);