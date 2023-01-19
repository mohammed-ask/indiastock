<?php
include "session.php";
$fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
// print_r($rowfetch);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);

$stockdata = $obj->fivepaisaapi($rowfetch);
$marketdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'NIFTY' || $data['Symbol'] === 'SENSEX') {
        return $data;
    }
});
$stockdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] !== 'NIFTY' && $data['Symbol'] !== 'SENSEX') {
        return $data;
    }
});
?>
<div class="national-data">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12 mt-2 mb-2">
                <div class="page-title-box d-inline-block d-md-flex justify-content-start justify-content-md-between align-items-center">
                    <div class="my-3 my-md-0 ps-2">
                        <?php foreach ($marketdata as $mdata) {  ?>
                            <div class="nifty-50 d-inline-block me-3">
                                <div class="font-11 fw-semibold"><?= $mdata['Symbol'] ?></div>
                                <div class="d-inline-block font-11"><?= $mdata['LastRate'] ?> <span class="text-danger"><?= $mdata['Chg'] ?> </span>
                                    <span class="text-danger">(<?= round($mdata['ChgPcnt'], 2) ?>%)</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="userstock">
    <?php
    foreach ($stockdata as $data) { ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="">
                        <div class="d-flex justify-content-between">
                            <div class="align-self-center">
                                <h6 class="m-0 text-uppercase font-13"><?= $data['Symbol'] ?></h6>
                                <p class="text-uppercase font-10 mb-0"><?php $exc = $data['Exch'] == 'B' ? ' BSE' : ' NSE';
                                                                        echo  $exc  ?></p>
                            </div>
                            <div>
                                <h6 class="m-0 text-uppercase font-11">₹<?= $data['LastRate'] ?>
                                    <?php if ($data['ChgPcnt'] > 0) { ?>
                                        <i class="fa-solid fa-arrow-trend-up text-success"></i>
                                    <?php } else { ?>
                                        <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                                    <?php } ?>
                                </h6>
                                <div class="d-inline-block font-10"><span <?= $data['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $data['Chg'] ?></span> <span <?= $data['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($data['ChgPcnt'], 2) ?>%)</span></div>
                            </div>
                            <div><i class="fa fa-times" aria-hidden="true" onclick="removestock('<?= $data['Symbol'] ?>','<?= $data['Exch']  ?>')"></i></div>
                        </div><!-- end /div -->
                    </a> <!--end-->
                    <hr class="hr-dashed">
                    <div class="row mt-3 text-center">
                        <!-- <div class="col-6 col-md-3 border-end">
                            <p class="mb-1 text-muted">Open</p>
                            <span>₹144.45</span>
                        </div> -->
                        <div class="col-6 col-md-4 border-end">
                            <p class="mb-1 text-muted">High</p>
                            <span>₹<?= $data['High'] ?></span>
                        </div>
                        <div class="col-6 col-md-4 border-end">
                            <p class="mb-1 text-muted">Low</p>
                            <span>₹<?= $data['Low'] ?></span>
                        </div>
                        <div class="col-6 col-md-4">
                            <p class="mb-1 text-muted">Close</p>
                            <span>₹<?= $data['PClose'] ?></span>
                        </div>
                    </div>

                    <hr class="hr-dashed">

                    <div class="d-flex justify-content-between">
                        <div class="action-icons">
                            <ul class="list-inline">
                                <li class="list-inline-item align-self-center mx-0 bg-success" style="padding: 3px 8px 3px 8px !important;
                                                    font-weight: 500 !important; margin-right: 10px !important;">
                                    <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Symbol"] ?>", "buystock","<?= $data["Exch"] ?>", "Buy Stock")'><i class=""></i> Buy</a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0 bg-danger" style="padding: 3px 8px 3px 8px !important;
                                                    font-weight: 500 !important; margin-right: 10px !important;">
                                    <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Symbol"] ?>", "sellstock","<?= $data["Exch"] ?>", "Sell Stock")'>Sell</a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0">
                                    <a href="#"><i class="fa-solid fa-plus email-action-icons-item"></i></a>
                                </li><!--end /li-->
                            </ul><!--end /ul-->

                        </div> <!--end action-icons-->

                        <div>
                            <a href="#">
                                <p class="mb-0 text-muted">View Chart <span><i class="fa-solid fa-arrow-right"></i></span></p>
                            </a>
                        </div>
                    </div>

                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    <?php } ?>
</div><!--end row-->
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Market";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
    let myinterval = null;
    setInterval(() => {
        console.log('counting market')
        $('#userstock').html()
        $.post("main/getlivemarketdata.php",
            function(data) {
                $('#userstock').html(data)
            },
        );
    }, 500000)
    $('#myModal').on('hidden.bs.modal', function() {
        // refresh current page
        clearInterval(myinterval)
    })

    function removestock(symbol, excg) {
        let text = "Are you sure you want to remove this stock";
        if (confirm(text) == true) {
            $.post("main/removestock.php", {
                    symbol: symbol,
                    exchange: excg
                },
                function(data) {
                    if (data === 'Success') {
                        window.location.reload()
                    } else {

                    }
                },
            );
        } else {
            text = "You canceled!";
        }
    }
</script>