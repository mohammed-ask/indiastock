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
        <h6 class="modal-title m-0 mb-n1" id="BuyStocksLabel"><?= $stockdata['Symbol'] ?></h6>
        <span class="font-10 d-block mb-1"><?php $exc = $stockdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                            echo  $exc  ?></span>
        <span class="border border-success px-1 rounded text-success">B</span>
    </div>
    <div>
        <h6 class="m-0 text-uppercase font-16 fw-bold">₹<?= $stockdata['LastRate'] ?> <i class="fa-solid fa-arrow-trend-down text-danger"></i></h6>
        <div class="d-inline-block font-10"><span class="text-danger"><?= $stockdata['Chg'] ?></span> <span class="text-danger">(<?= round($stockdata['ChgPcnt'], 2) ?>%)</span></div>
        <div class="text-success">Live <span><i class="fa-regular fa-circle-dot"></i></span></div>
    </div>
    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
</div>

<div class="modal-body">
    <form class="row gy-2 gx-3 align-items-end" id="buystock">
        <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
        <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
        <div class="col-auto">
            <label class="form-label" for="Quantity">Quantity</label>
            <input data-bvalidator='required' name="qty" type="number" id="qty" onkeyup="sumfund()" onclick="this.select();" value="1" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
            <label class="form-label" for="Price">Price</label>
            <input type="text" readonly name="price" value="<?= $stockdata['LastRate'] ?>" class="form-control form-control-sm" id="Price">
        </div>
        <!-- <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="buy_limit">
                <label class="form-check-label" for="buy_limit">
                    Limit
                </label>
            </div>
        </div> -->
        <button class="btn btn-success w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertbuystock', 'resultid', 'buystock')">BUY</button>
        <div id="resultid"></div>
    </form>
    <div class="mt-3">
        <!-- <a class="" data-bs-toggle="collapse" href="user-index.htmlSL_Option" aria-expanded="false" aria-controls="collapseExample">
            Stop Loss <i class="fa-regular fa-circle-down"></i>
        </a> -->
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
        </div> <!--end collapse-->
    </div> <!--end /div-->

    <div class="row">
        <div class="col">
            <small class="text-muted d-block">Require Fund</small>
            <small id="reqfund">₹<?= $usermargin > 0 ? $stockdata['LastRate'] / $usermargin : $stockdata['LastRate'] ?></small>
            <small style="color:green">Margin Available : <?= $usermargin ?>x</small>
        </div><!--end col-->
        <div class="col-auto">
            <small class="text-muted d-block">Available Fund</small>
            <small>₹<?= $rowfund ?></small>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end modal-body-->
<script>
    $("#modalfooterbtn").css('display', 'none')
    setInterval(() => {
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
    }, 1000000)

    function sumfund() {
        var qty = $("#qty").val();
        var price = $("#Price").val()
        limit = <?= $usermargin; ?>;
        if (limit > 0) {
            require = parseInt(qty) * parseFloat(price) / limit
        } else {
            require = parseInt(qty) * parseFloat(price)
        }
        $("#reqfund").html("₹" + require)
    }
</script>