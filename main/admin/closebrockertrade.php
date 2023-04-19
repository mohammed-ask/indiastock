<?php
include "main/session.php";
$id = $_GET['hakuna'];
$method = $_GET['what'];
$rowtran = $obj->selectextrawhere("stocktransaction", "id=" . $id . "")->fetch_assoc();
// print_r($rowtran);
$rowfetch = array(
    array(
        "Exch" => $rowtran['exchange'],
        "ExchType" => "C",
        "Symbol" => $rowtran['symbol'],
        "Expiry" => "",
        "StrikePrice" => 0,
        "OptionType" => ""
    )
);
$stockdata = $obj->fivepaisaapi($rowfetch);
$stockdata = $stockdata[0];
// print_r($stockdata);

?>
<form id="stock" onsubmit="event.preventDefault();sendForm('id', '<?= $id ?>', 'insertclosebrockertrade', 'resultid', 'stock');return 0;">
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">User Name</span>
        <div class="form-control"><?= $obj->selectfieldwhere('users', 'name', 'id=' . $rowtran['userid'] . '') ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Exchange</span>
        <div class="form-control"><?= $rowtran['exchange'] ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Symbol</span>
        <div class="form-control"><?= $rowtran['symbol'] ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Quantity</span>
        <div class="form-control"><?= $rowtran['qty'] ?></div>
    </label>
    <label class="block text-sm mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Current Rate</span>
        <input name="qty" class="hidden" value="<?= $rowtran['qty'] ?>" />
        <input name="userid" class="hidden" value="<?= $rowtran['userid'] ?>" />
        <input name="cprice" data-bvalidator="required" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $stockdata['LastRate'] ?>" />
    </label>
    <br>
    <div>
        <input type="hidden" name="oldprice" value="<?= $rowtran['price'] ?>" id="">
        <input type="hidden" name="amountpaid" value="<?= $rowtran['totalamount'] ?>" id="">

        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
            Sell Stock
        </button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $("#modalfooterbtn").css('background-color', 'red')
    $("#modalfooterbtn").html('Sell Stock')
</script>