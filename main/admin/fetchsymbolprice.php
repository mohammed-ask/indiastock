<?php
include "../session.php";
$symbol = $_POST['stockName'];
$exch = $_POST['exch'];
$exchtype = $_POST['exchtype'];
$rowfetch = array(
    array(
        "Exch" => $exch,
        "ExchType" => "C",
        "Symbol" => $symbol,
        "Expiry" => "",
        "StrikePrice" => 0,
        "OptionType" => ""
    )
);
$price = $obj->searchstockapiwithtoken($symbol, $exchtype, $exch);
$data = $price[0];
// print_r($price);
// echo $symbol, $exch;
?>
<div style="margin-bottom: 5px;">
    <label class="block text-sm" for="Quantity">
        <span class="text-gray-700 dark:text-gray-400">Lot Size</span>
        <input data-bvalidator='required' name="lot" type="number" id="lot" onclick="this.select();" value='<?= $data['MktLot']  ?>' class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
    </label>
</div>
<label class="block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Buying/Selling
        Price</span>
    <input name="price" value="<?= $data['LastTradedPrice'] ?>" id="shareprice" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buying/Selling Price" data-bvalidator='required' />
</label>