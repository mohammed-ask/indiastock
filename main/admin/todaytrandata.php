<?php
include '../session.php';
// $id = $employeeid;
// $todayopentradeid = $obj->selectfieldwhere(
//     "stocktransaction",
//     "group_concat(distinct(stockid))",
//     "status = 0 and tradestatus='Open' and date(added_on) = curdate()"
// );
// if (!empty($todayopentradeid)) {
//     $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1 and id in (" . $todayopentradeid . ")");
//     $rowfetch = mysqli_fetch_all($fetchshare, 1);
//     $stockdata = $obj->fivepaisaapi($rowfetch);
// }
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
$join = "left join closetradedetail on closetradedetail.tradeid = stocktransaction.id";
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status in (1,0) and date(stocktransaction.added_on) = curdate()");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status in (1,0) and date(stocktransaction.added_on) = curdate() $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction $join",
    "stocktransaction.id,stocktransaction.symbol,stocktransaction.qty,stocktransaction.price,closetradedetail.price as cprice,stocktransaction.totalamount,stocktransaction.trademethod,stocktransaction.added_on,stocktransaction.userid,stocktransaction.tradestatus",
    "stocktransaction.status in (1,0) and date(stocktransaction.added_on) = curdate() $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    // $symbol = $row['symbol'];
    // $excg = $row['exchange'];
    // $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg) {
    //     if ($data['Symbol'] === $symbol && $data['Exch'] === $excg) {
    //         return $data;
    //     }
    // });
    // $currentrate = $pricedata[0]['LastRate'];
    $n[] = $i;
    $n[] = $obj->selectfieldwhere("users", "name", "id=" . $row['userid'] . "");
    $n[] = $row['symbol'];
    // $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i");
    $row['cprice'] = $row['cprice'] === 0 ? '' : $row['cprice'];
    $n[] = $row['trademethod'] === 'Buy' ? $row['price'] : $row['cprice'];
    $n[] = $row['trademethod'] === 'Sell' ? $row['price'] : $row['cprice'];
    $n[] = $row['qty'];
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d/m/Y H:i A");
    $n[] = $row['tradestatus'];
    // $n[] = $row['trademethod'];
    // $n[] = round(($currentrate - $row['price']) * 100 / $row['price'], 2);
    // $n[] = round($currentrate - $row['price'], 2);
    $n[] = $row['tradestatus'] === 'Open' ? " <button class='flex items-center justify-between px-2 py-2  font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray' @click='openModal'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"editstockprice\", \"\", \"Edit Stock Price\")'>
    <svg class='w-5 h-5' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'>
        <path d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'>
        </path>
    </svg>
</button>" : null;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
