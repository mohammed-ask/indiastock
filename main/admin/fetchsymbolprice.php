<?php
include "../session.php";
$symbol = $_POST['stockName'];
$exch = $_POST['exch'];
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
$price = $obj->fivepaisaapi($rowfetch);
// print_r($price);
// echo $symbol, $exch;
?>
<label class="block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Buying/Selling
        Price</span>
    <input name="price" value="<?= $price[0]['LastRate'] ?>" id="shareprice" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buying/Selling Price" data-bvalidator='required' />
</label>