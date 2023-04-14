<?php
include "main/session.php";
$id = $_GET['hakuna'];
$rowtran = $obj->selectextrawhere("stocktransaction", "id=" . $id . "")->fetch_assoc();
// $qty = $obj->selectfieldwhere("stocktransaction", "qty", "id=" . $id . "");
// $symbol = $obj->selectfieldwhere("stocktransaction", "symbol", "id=" . $id . "");
// $exchange = $obj->selectfieldwhere("stocktransaction", "exchange", "id=" . $id . "");
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "Exch='" . $rowtran['exchange'] . "' and Symbol = '" . $rowtran['symbol'] . "'")->fetch_assoc();
$stockdata = $obj->fivepaisaapi(array($rowfetch));
$stockdata = $stockdata[0];
?>
<div class="modal-header" id="stockdetails">
    <div>
        <h6 class="modal-title m-0 mb-n1" id="BuyStocksLabel"><?= $stockdata['Symbol'] ?></h6>
        <span class="font-10 d-block mb-1"><?php $exc = $stockdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                            echo  $exc  ?></span>
        <span class="border border-success px-1 rounded text-success">B</span>
    </div>
    <div>
        <h6 class="m-0 text-uppercase font-16 fw-bold">₹<?= $stockdata['LastRate'] ?> <?php if ($stockdata['ChgPcnt'] > 0) { ?>
                <i class="fa-solid fa-arrow-trend-up text-success"></i>
            <?php } else { ?>
                <i class="fa-solid fa-arrow-trend-down text-danger"></i>
            <?php } ?>
        </h6>
        <div class="d-inline-block font-10"><span <?= $stockdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $stockdata['Chg'] ?></span> <span <?= $stockdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($stockdata['ChgPcnt'], 2) ?>%)</span></div>
        <div class="text-success">Live <span><i class="fa-regular fa-circle-dot"></i></span></div>
    </div>
    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
</div>
<div class="modal-body">
    <form class="row gy-2 gx-3 align-items-end" id="close">
        <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
        <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
        <input type="hidden" name="oldprice" value="<?= $rowtran['price'] ?>" id="">
        <input type="hidden" name="tradeid" value="<?= $rowtran['id'] ?>" id="">
        <input type="hidden" name="amountpaid" value="<?= $rowtran['totalamount'] ?>" id="">
        <input type="hidden" name="limit" value="<?= $rowtran['limit'] ?>" id="">
        <input type="hidden" name="type" value="<?= $rowtran['type'] ?>" id="">
        <input type="hidden" name="totalamount" id="totalamount" value="<?= $usermargin > 0 ? $stockdata['LastRate'] / $usermargin : $stockdata['LastRate'] ?>">
        <div class="col-auto">
            <label class="form-label" for="Quantity">Quantity</label>
            <input data-bvalidator='required' readonly name="qty" type="number" id="qty" onkeyup="sumfund()" onclick="this.select();" value="<?= $rowtran['qty'] ?>" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
            <label class="form-label" for="Price">Price</label>
            <input type="text" readonly name="price" value="<?= $stockdata['LastRate'] ?>" class="form-control form-control-sm" id="Price">
        </div>
        <?php
        if ($_GET['what'] === 'Sell') { ?>
            <button class="btn btn-success w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertclosetrade', 'resultid', 'close')">BUY</button>
        <?php } else if ($_GET['what'] === 'Buy') { ?>
            <button class="btn btn-danger w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertclosetrade', 'resultid', 'close')">SELL</button>
        <?php } ?>
        <div id="resultid"></div>
    </form>
    <div class="row">
        <div class="col">
            <small class="text-muted d-block">Profit/Loss</small>
            <small id="reqfund">₹<?= $stockdata['LastRate'] - $rowtran['price'] ?></small>
        </div>
        <div class="col-auto">
            <small class="text-muted d-block">Available Fund</small>
            <small>₹<?= $investmentamount ?></small>
        </div><!--end col-->
    </div><!--end row-->
</div>
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>