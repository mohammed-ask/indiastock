<?php
include 'main/session.php';
$obj->saveactivity("Cron Run", "", 0, 0, "User", "Cron Run");

// Carry forward Share
$xx['type'] = 'Holding';
$result = $obj->selectfieldwhere(
    "stocktransaction inner join users on users.id = stocktransaction.userid",
    "group_concat(stocktransaction.id)",
    "stocktransaction.status = 0 and tradestatus='Open' and stocktransaction.type = 'Intraday' and date(stocktransaction.added_on) = curdate() and users.carryforward='Yes'"
);
if (!empty($result)) {
    $cf = $obj->updatewhere("stocktransaction", $xx, "id in (" . $result . ")");
}

// Close Trade
$todayopentradeid = $obj->selectfieldwhere(
    "stocktransaction inner join users on users.id = stocktransaction.userid",
    "group_concat(distinct(stockid))",
    "stocktransaction.status = 0 and tradestatus='Open' and stocktransaction.type = 'Intraday' and date(stocktransaction.added_on) = curdate() and users.carryforward='No'"
);
if (!empty($todayopentradeid)) {
    $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1 and id in (" . $todayopentradeid . ")");
    $rowfetch = mysqli_fetch_all($fetchshare, 1);
    $stockdata = $obj->fivepaisaapi($rowfetch);
}
$result = $obj->selectextrawhereupdate(
    "stocktransaction inner join users on users.id = stocktransaction.userid",
    "stockid,symbol,exchange,qty,price,userid,stocktransaction.id,stocktransaction.type,stocktransaction.limit,totalamount,users.investmentamount,borrowedamt,borrowedprcnt",
    "stocktransaction.status = 0 and  tradestatus='Open' and stocktransaction.type = 'Intraday' and date(stocktransaction.added_on) = curdate() and users.carryforward='No'"
);
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $symbol = $row['symbol'];
    $excg = $row['exchange'];
    $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg) {
        if ($data['Symbol'] === $symbol && $data['Exch'] === $excg) {
            return $data;
        }
    });
    $currentrate = $pricedata[0]['LastRate'];
    $xc['added_on'] = date("Y-m-d H:i:s");
    $xc['updated_on'] = date("Y-m-d H:i:s");
    $xc['status'] = 1;
    // $xc['symbol'] = $symbol;
    // $xc['exchange'] = $excg;
    $xc['qty'] = $row['qty'];
    $xc['price'] = $currentrate;
    if ($row['borrowedamt'] > 0) {
        $profitAndLoss = $row['qty'] * ($currentrate - $row['price']);
        if ($row['trademethod'] === 'Sell') {
            if ($profitAndLoss <= 0) {
                $profitAndLoss = abs($profitAndLoss);
            } else {
                $profitAndLoss = -$profitAndLoss;
            }
        }
        if ($profitAndLoss >= 0) {
            $custshare = 100 - $borrowedprcnt;
            $xc['profitamount'] = round($profitAndLoss * $custshare / 100, 2);
        } else {
            $xc['profitamount'] = $profitAndLoss;
        }
    } else {
        $xc['profitamount'] = $row['qty'] * ($currentrate - $row['price']);
        if ($row['trademethod'] === 'Sell') {
            if ($xc['profitamount'] <= 0) {
                $xc['profitamount'] = abs($xc['profitamount']);
            } else {
                $xc['profitamount'] = -$xc['profitamount'];
            }
        }
    }
    // $xc['totalamount'] = ($currentrate / $row['limit']) * $row['qty'];
    // $xc['profitamount'] = $row['qty'] * ($currentrate - $row['price']);
    $xc['userid'] = $row['userid'];
    $xc['tradeid'] = $row['id'];
    $xc['profitsettled'] = $xc['profitamount'] < 0 ? 1 : 0;
    // $xc['type'] = $row['type'];
    // $xc['limit'] = $row['limit'];
    // $xc['tradestatus'] = '';
    $close = $obj->insertnew("closetradedetail", $xc);
    if ($close > 0) {
        $yy["tradestatus"] = 'Close';
        $yy['status'] = 1;
        $trade = $obj->update("stocktransaction", $yy, $xc['tradeid']);
        if ($trade > 0) {
            if ($xc['profitamount'] >= 0) {
                $useramt = $row['totalamount'] - $row['borrowedamt'];
            } else {
                $useramt = $row['totalamount'] - $borrowedamt - $xc['profitamount'];
            }
            $useramount = $useramt + $xc['profitamount'];
            $kk['investmentamount'] = $row['investmentamount'] + $useramount;
            $user = $obj->update("users", $kk, $row['userid']);
            if ($user > 0) {
                echo "Redirect : Trade Closed Succesfully  URLportfolio";
            } else {
                echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
    }
}
