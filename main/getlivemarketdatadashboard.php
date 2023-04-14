<?php
include "./session.php";


$fetchshare = $obj->selectextrawhereupdate('userstocks inner join watchliststock on watchliststock.userstockid = userstocks.id', "Exch,ExchType,userstocks.Symbol,Expiry,StrikePrice,OptionType", "userstocks.userid='" . $employeeid . "' and userstocks.status = 1 and watchliststock.status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);

$stockdata = $obj->fivepaisaapi($rowfetch);
$marketdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'NIFTY' || $data['Symbol'] === 'SENSEX') {
        return $data;
    }
});
$wstocks = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] !== 'NIFTY' && $data['Symbol'] !== 'SENSEX') {
        return $data;
    }
});
/* @var $obj db */
?>
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
<div id="sidebarcolumn" style="display: none;">
    <?php
    $i = 0;
    foreach ($wstocks as $wdata) { ?>
        <div class="accordion-item border-top-0">
            <div class="accordion-header" id="heading<?= $i ?>">
                <a class="accordion-button d-block py-2 px-3 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <h6 class="m-0 text-uppercase font-11">
                                <?= $wdata['Symbol'] ?></h6>
                            <p class="text-uppercase font-10 mb-0">
                                <?php $exc = $wdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                echo  $exc  ?></p>
                        </div>
                        <div>
                            <h6 class="m-0 text-uppercase font-11">
                                ₹<?= $wdata['LastRate'] ?><?php if ($wdata['ChgPcnt'] > 0) { ?>
                                <i class="fa-solid fa-arrow-trend-up text-success"></i>
                            <?php } else { ?>
                                <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                            <?php } ?>
                            </h6>
                            <div class="d-inline-block font-10">
                                <span <?= $wdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $wdata['Chg'] ?></span>
                                <span <?= $wdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($wdata['ChgPcnt'], 2) ?>%)</span>
                            </div>
                        </div>
                    </div><!-- end /div -->
                </a>
            </div>
            <div id="collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i ?>" data-bs-parent="#watchlist_2">
                <div class="accordion-body">
                    <div class="d-flex justify-content-between">
                        <div class="action-icons">
                            <ul class="list-inline">
                                <li class="list-inline-item align-self-center mx-0 bg-success">
                                    <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $wdata["Symbol"] ?>", "buystock","<?= $wdata["Exch"] ?>", "Buy Stock")'><i class="fa-solid fa-b text-white email-action-icons-item"></i></a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0 bg-danger">
                                    <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $wdata["Symbol"] ?>", "sellstock","<?= $wdata["Exch"] ?>", "Sell Stock")'><i class="fa-solid fa-s text-white email-action-icons-item"></i></a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0">
                                    <a href="details.html"><i class="fa-solid fa-sliders email-action-icons-item"></i></a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0">
                                    <a onclick="removewatchlist('<?= $wdata['Symbol'] ?>','<?= $wdata['Exch']  ?>')"><i class="fa-regular fa-trash-can email-action-icons-item"></i></a>
                                </li><!--end /li-->
                            </ul><!--end /ul-->
                        </div> <!--end action-icons-->
                        <!-- <div>
                                                                    <p class="mb-0 text-muted">Avg.
                                                                        Traded Price : <span class="fw-semibold text-dark">₹148.00</span>
                                                                    </p>
                                                                </div> -->
                    </div>

                </div><!--end accordion-body-->
            </div>
        </div>
    <?php $i++;
    } ?>
</div>