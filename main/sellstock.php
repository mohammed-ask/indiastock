<?php
include "main/session.php";
$rowfund = $obj->selectfieldwhere("users", "investmentamount", "id=" . $employeeid . " and status = 1");
$symbol = $_GET['hakuna'];
$exchange = $_GET['what'];
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "Exch='" . $exchange . "' and Symbol = '" . $symbol . "' and status = 1")->fetch_assoc();
// print_r(array($rowfetch));
// die;
$stockdata = $obj->fivepaisaapi(array($rowfetch));
$stockdata = $stockdata[0];
?>
<div class="modal-header" id="stockdetails">
    <div>
        <h6 class="modal-title m-0 mb-n1" id="SellStocksLabel"><?= $stockdata['Symbol'] ?></h6>
        <span class="font-10 d-block mb-1"><?php $exc = $stockdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                            echo  $exc  ?></span>
        <span class="border border-danger px-1 rounded text-danger">S</span>
    </div>
    <div>
        <h6 class="m-0 text-uppercase font-16 fw-bold">₹<?= $stockdata['LastRate'] ?><?php if ($stockdata['ChgPcnt'] > 0) { ?>
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
    <!-- <div class="form-check d-inline-block me-2">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="sell_Limit">
        <label class="form-check-label" for="sell_Limit">
            Holding
        </label>
    </div>
    <div class="form-check mb-2 d-inline-block">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="sell_SL" checked="">
        <label class="form-check-label" for="sell_SL">
            Trade
        </label>
    </div> -->
    <form class="row gy-2 gx-3 align-items-end" id="sellstock">
        <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
        <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
        <input type="hidden" name="totalamount" id="totalamount" value="<?= $usermargin > 0 ? $stockdata['LastRate'] / $usermargin : $stockdata['LastRate'] ?>">
        <div class="col-auto">
            <label class="form-label" for="Quantity">Quantity</label>
            <input type="text" onclick="this.select();" data-balidator='required' name="qty" value="1" class="form-control form-control-sm" id="qty">
        </div>
        <div class="col-auto">
            <label class="form-label" for="Price">Price</label>
            <input type="text" readonly name="price" value="<?= $stockdata['LastRate'] ?>" class="form-control form-control-sm" id="Price">
        </div>
        <!-- <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                <label class="form-check-label" for="autoSizingCheck">
                    Limit
                </label>
            </div>
        </div> -->
        <button class="btn btn-danger w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertsellstock', 'resultid', 'sellstock')">SELL</button>
        <div id="resultid"></div>
    </form>
    <!-- <div class="mt-3">
        <a class="" data-bs-toggle="collapse" href="user-index.htmlSL_Option" aria-expanded="false" aria-controls="collapseExample">
            Stop Loss <i class="fa-regular fa-circle-down"></i>
        </a>
        <div class="collapse" id="SL_Option">
            <form class="row gy-2 gx-3 align-items-center mt-1">
                <div class="col-auto">
                    <label class="form-label" for="Trigger_Price">Trigger Price</label>
                    <input type="text" class="form-control form-control-sm" id="Trigger_Price">
                </div>
                <div class="col-auto align-self-end">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="buy_SL">
                        <label class="form-check-label" for="buy_SL">
                            Stop Loss
                        </label>
                    </div>
                </div>
            </form>
        </div> 
    </div>  -->
    <div class="row">
        <div class="col">
            <small class="text-muted d-block">Require Fund</small>
            <small>₹00.00</small>
        </div><!--end col-->
        <div class="col-auto">
            <small class="text-muted d-block">Available Fund</small>
            <small>₹<?= $rowfund ?>.00</small>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end modal-body-->
<script>
    $("#modalfooterbtn").css('display', 'none')
    myinterval = setInterval(() => {
        console.log('counting buystock')
        $('#stockdetails').html()
        $.post("main/getlivemarketdatasingle.php", {
                symbol: '<?= $symbol ?>',
                exchange: '<?= $exchange ?>'
            },
            function(data) {
                $('#stockdetails').html(data)
                price = $("#closingprice").val();
                $("#price").val(price)
            },
        );
    }, 500000)
</script>