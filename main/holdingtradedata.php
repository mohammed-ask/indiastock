<?php
include 'session.php';
/* @var $obj db */
$id = $employeeid;
$holdingtradeid = $obj->selectfieldwhere(
    "stocktransaction",
    "group_concat(distinct(stockid))",
    "status = 0 and userid = $id and tradestatus='Open' and type='Holding'"
);
if (!empty($holdingtradeid)) {
    $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1 and id in (" . $holdingtradeid . ")");
    $rowfetch = mysqli_fetch_all($fetchshare, 1);
    $stockdata = $obj->fivepaisaapi($rowfetch);
}
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
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction", "count(stocktransaction.id)", "status = 0 and userid = $id and type='Holding'");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction", "count(stocktransaction.id)", "status = 0 and userid = $id and type='Holding' $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "status = 0 and userid = $id and tradestatus='Open' and type='Holding' $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $symbol = $row['symbol'];
    $excg = $row['exchange'];
    $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg) {
        if ($data['Symbol'] === $symbol && $data['Exch'] === $excg) {
            return $data;
        }
    });
    $keys = array_keys($pricedata)[0];
    $currentrate = $pricedata[$keys]['LastRate'];
    $n[] = $row['symbol'];
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "dM,Y");
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i A");
    $n[] = $row['qty'];
    $n[] = $row['price'];
    $n[] = round($row['qty'] * $row['price'], 2);
    $n[] = round($row['totalamount'], 2);
    $n[] = $row['trademethod'];
    $n[] = round(($currentrate - $row['price']) * 100 / $row['price'], 2);
    $n[] = round($currentrate - $row['price'], 2);
    if ($row['trademethod'] === 'Buy') {
        $n[] =  "<button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closetrade\", \"Buy\", \"Close Trade\")'>S</button>";
    } else if ($row['trademethod'] === 'Sell') {
        $n[] =  "<button class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closetrade\", \"Sell\", \"Close Trade\")'>B</button>";
    }
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
