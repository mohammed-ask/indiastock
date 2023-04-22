<?php
include 'main/session.php';
// echo $obj->getrequesttoken();
// echo $obj->getaccesstoken();
// echo $obj->getcandledata();
$rowfetch = array(
    array(
        "Exch" => "N",
        "ExchType" => "D",
        "Symbol" => "BANKNIFTY 11 May 2023 PE 37000.00",
        "Expiry" => "20230511",
        "StrikePrice" => "37000",
        "OptionType" => "PE"
    )
);
$data = $obj->fivepaisaapi($rowfetch);
print_r($data);

echo 'runnpage';
