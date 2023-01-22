<?php
include "main/session.php";


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
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center mb-2">
                    <div class="col">
                        <p class="text-dark mb-0 fw-semibold">Fund Available</p>
                        <h3 class="my-1 font-20 fw-bold">₹<?= $investmentamount ?>.00</h3>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <img src="main/dist/userimages/money.png" class="thumb-lg" alt="...">
                    </div><!--end col-->
                </div><!--end row-->
                <button type="button" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "addfund","", "")' class="btn btn-sm btn-de-primary">Add Funds</button>
            </div><!--end card-body-->
        </div><!--end card-->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Live Market </h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <!-- <span class="stocks-list-badge bg-soft-primary ms-1">3</span> -->
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <!-- <div class="card-body"> -->
            <iframe id="moneywiz_widget" name="moneywiz_widget" src="//money.rediff.com/widget/moneywizwidget" scrolling="no" frameborder="0" marginHeight="0" marginWidth="0" style="width:auto; height:150px"></iframe>
            <!-- <div id="IPO_Carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <div class="text-center">
                                <img src="main/dist/userimages/ipo/ipo-3.png" class="thumb-lg" alt="...">
                                <h3 class="my-1 font-20 fw-bold">Life's Good</h3>
                                <p class="mb-0 fw-semibold">Sep 14, 2021 to Sep 18, 2021</p>
                                <p class="mb-2">Allotment : <span class="text-muted">Sep 22,
                                        2021</span></p>
                                <a href="user-index.html" class="btn btn-sm btn-de-primary">Apply</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center">
                                <img src="main/dist/userimages/ipo/ipo-1.png" class="thumb-lg" alt="...">
                                <h3 class="my-1 font-20 fw-bold">Starbucks</h3>
                                <p class="mb-0 fw-semibold">Sep 02, 2021 to Sep 05, 2021</p>
                                <p class="mb-2">Allotment : <span class="text-muted">Sep 08,
                                        2021</span></p>
                                <a href="user-index.html" class="btn btn-sm btn-de-primary">Apply</a>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <div class="text-center">
                                <img src="main/dist/userimages/ipo/ipo-2.png" class="thumb-lg" alt="...">
                                <h3 class="my-1 font-20 fw-bold">McDonald's</h3>
                                <p class="mb-0 fw-semibold">Sep 06, 2021 to Sep 10, 2021</p>
                                <p class="mb-2">Allotment : <span class="text-muted">Sep 14,
                                        2021</span></p>
                                <a href="user-index.html" class="btn btn-sm btn-de-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="nifty-50 d-inline-block me-3">
                            <div class="font-11 fw-semibold">Nifty 50</div>
                            <div class="d-inline-block font-15 fw-bold">16,538.45 <span class="text-danger font-11 fw-semibold">-78.00</span> <span class="text-danger font-11 fw-semibold">(0.49%)</span></div>
                        </div>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="toolbar">
                            <button class="btn btn-sm btn-outline-light" id="one_month">1M</button>
                            <button class="btn btn-sm btn-outline-light" id="six_months">6M</button>
                            <button class="btn btn-sm btn-outline-light active" id="one_year">1Y</button>
                            <button class="btn btn-sm btn-outline-light" id="ytd">YTD</button>
                            <button class="btn btn-sm btn-outline-light" id="all">ALL</button>
                        </div>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <iframe height="480" width="650" src="https://ssltvc.investing.com/?pair_ID=8985&height=480&width=650&interval=300&plotStyle=area&domain_ID=56&lang_ID=56&timezone_ID=20"></iframe>
                <!-- <div class="chart-demo" style="position: relative;">
                    <div id="apex_area2" class="apex-charts" style="min-height: 317px;">
                        <div id="apexcharts4zvettio" class="apexcharts-canvas apexcharts4zvettio apexcharts-theme-light" style="width: 700px; height: 302px;"><svg id="SvgjsSvg1001" width="700" height="302" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG1003" class="apexcharts-inner apexcharts-graphical" transform="translate(55.03125, 30)">
                                    <defs id="SvgjsDefs1002">
                                        <clippath id="gridRectMask4zvettio">
                                            <rect id="SvgjsRect1024" width="640.96875" height="242.2" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clippath>
                                        <clippath id="forecastMask4zvettio"></clippath>
                                        <clippath id="nonForecastMask4zvettio"></clippath>
                                        <clippath id="gridRectMarkerMask4zvettio">
                                            <rect id="SvgjsRect1025" width="638.96875" height="244.2" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clippath>
                                        <lineargradient id="SvgjsLinearGradient1030" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1031" stop-opacity="0.7" stop-color="rgba(34,183,131,0.7)" offset="0">
                                            </stop>
                                            <stop id="SvgjsStop1032" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1">
                                            </stop>
                                            <stop id="SvgjsStop1033" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1">
                                            </stop>
                                        </lineargradient>
                                    </defs>
                                    <line id="SvgjsLine1009" x1="6.821098993288591" y1="0" x2="6.821098993288591" y2="240.2" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="6.821098993288591" y="0" width="1" height="240.2" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG1036" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1037" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1039" font-family="Helvetica, Arial, sans-serif" x="1.7483221476510067" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1040">Mar '12</tspan>
                                                <title>Mar '12</title>
                                            </text><text id="SvgjsText1042" font-family="Helvetica, Arial, sans-serif" x="55.946308724832214" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1043">Apr '12</tspan>
                                                <title>Apr '12</title>
                                            </text><text id="SvgjsText1045" font-family="Helvetica, Arial, sans-serif" x="162.59395973154363" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1046">Jun '12</tspan>
                                                <title>Jun '12</title>
                                            </text><text id="SvgjsText1048" font-family="Helvetica, Arial, sans-serif" x="215.04362416107384" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1049">Jul '12</tspan>
                                                <title>Jul '12</title>
                                            </text><text id="SvgjsText1051" font-family="Helvetica, Arial, sans-serif" x="269.241610738255" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1052">Aug '12</tspan>
                                                <title>Aug '12</title>
                                            </text><text id="SvgjsText1054" font-family="Helvetica, Arial, sans-serif" x="375.88926174496646" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1055">Oct '12</tspan>
                                                <title>Oct '12</title>
                                            </text><text id="SvgjsText1057" font-family="Helvetica, Arial, sans-serif" x="430.0872483221477" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1058">Nov '12</tspan>
                                                <title>Nov '12</title>
                                            </text><text id="SvgjsText1060" font-family="Helvetica, Arial, sans-serif" x="536.734899328859" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1061">2013</tspan>
                                                <title>2013</title>
                                            </text><text id="SvgjsText1063" font-family="Helvetica, Arial, sans-serif" x="590.9328859060402" y="269.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1064">Feb '13</tspan>
                                                <title>Feb '13</title>
                                            </text></g>
                                        <line id="SvgjsLine1065" x1="0" y1="241.2" x2="634.96875" y2="241.2" stroke="#bec7e0" stroke-dasharray="0" stroke-width="1"></line>
                                    </g>
                                    <g id="SvgjsG1080" class="apexcharts-grid">
                                        <g id="SvgjsG1081" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1092" x1="0" y1="0" x2="634.96875" y2="0" stroke="#e0e0e0" stroke-dasharray="2.5" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1093" x1="0" y1="48.04" x2="634.96875" y2="48.04" stroke="#e0e0e0" stroke-dasharray="2.5" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1094" x1="0" y1="96.08" x2="634.96875" y2="96.08" stroke="#e0e0e0" stroke-dasharray="2.5" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1095" x1="0" y1="144.12" x2="634.96875" y2="144.12" stroke="#e0e0e0" stroke-dasharray="2.5" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1096" x1="0" y1="192.16" x2="634.96875" y2="192.16" stroke="#e0e0e0" stroke-dasharray="2.5" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1097" x1="0" y1="240.2" x2="634.96875" y2="240.2" stroke="#e0e0e0" stroke-dasharray="2.5" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1082" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1083" x1="1.7483221476510067" y1="241.2" x2="1.7483221476510067" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1084" x1="55.946308724832214" y1="241.2" x2="55.946308724832214" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1085" x1="162.59395973154363" y1="241.2" x2="162.59395973154363" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1086" x1="215.04362416107384" y1="241.2" x2="215.04362416107384" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1087" x1="269.241610738255" y1="241.2" x2="269.241610738255" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1088" x1="375.88926174496646" y1="241.2" x2="375.88926174496646" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1089" x1="430.0872483221477" y1="241.2" x2="430.0872483221477" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1090" x1="536.734899328859" y1="241.2" x2="536.734899328859" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1091" x1="590.9328859060402" y1="241.2" x2="590.9328859060402" y2="247.2" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <rect id="SvgjsRect1098" width="634.96875" height="48.04" x="0" y="0" rx="0" ry="0" opacity="0.2" stroke-width="0" stroke="none" stroke-dasharray="0" fill="transparent" clip-path="url(#gridRectMask4zvettio)" class="apexcharts-grid-row"></rect>
                                        <rect id="SvgjsRect1099" width="634.96875" height="48.04" x="0" y="48.04" rx="0" ry="0" opacity="0.2" stroke-width="0" stroke="none" stroke-dasharray="0" fill="transparent" clip-path="url(#gridRectMask4zvettio)" class="apexcharts-grid-row"></rect>
                                        <rect id="SvgjsRect1100" width="634.96875" height="48.04" x="0" y="96.08" rx="0" ry="0" opacity="0.2" stroke-width="0" stroke="none" stroke-dasharray="0" fill="transparent" clip-path="url(#gridRectMask4zvettio)" class="apexcharts-grid-row"></rect>
                                        <rect id="SvgjsRect1101" width="634.96875" height="48.04" x="0" y="144.12" rx="0" ry="0" opacity="0.2" stroke-width="0" stroke="none" stroke-dasharray="0" fill="transparent" clip-path="url(#gridRectMask4zvettio)" class="apexcharts-grid-row"></rect>
                                        <rect id="SvgjsRect1102" width="634.96875" height="48.04" x="0" y="192.16" rx="0" ry="0" opacity="0.2" stroke-width="0" stroke="none" stroke-dasharray="0" fill="transparent" clip-path="url(#gridRectMask4zvettio)" class="apexcharts-grid-row"></rect>
                                        <line id="SvgjsLine1104" x1="0" y1="240.2" x2="634.96875" y2="240.2" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1103" x1="0" y1="1" x2="0" y2="240.2" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>

                                    <line id="SvgjsLine1105" x1="0" y1="0" x2="634.96875" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1106" x1="0" y1="0" x2="634.96875" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1107" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1108" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1109" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1111" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1112" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                </g>
                                <rect id="SvgjsRect1008" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                <g id="SvgjsG1066" class="apexcharts-yaxis" rel="0" transform="translate(25.03125, 0)">
                                    <g id="SvgjsG1067" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1068" font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1069">42.00</tspan>
                                            <title>42.00</title>
                                        </text><text id="SvgjsText1070" font-family="Helvetica, Arial, sans-serif" x="20" y="79.53999999999999" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1071">39.00</tspan>
                                            <title>39.00</title>
                                        </text><text id="SvgjsText1072" font-family="Helvetica, Arial, sans-serif" x="20" y="127.57999999999998" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1073">36.00</tspan>
                                            <title>36.00</title>
                                        </text><text id="SvgjsText1074" font-family="Helvetica, Arial, sans-serif" x="20" y="175.61999999999998" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1075">33.00</tspan>
                                            <title>33.00</title>
                                        </text><text id="SvgjsText1076" font-family="Helvetica, Arial, sans-serif" x="20" y="223.65999999999997" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1077">30.00</tspan>
                                            <title>30.00</title>
                                        </text><text id="SvgjsText1078" font-family="Helvetica, Arial, sans-serif" x="20" y="271.7" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1079">27.00</tspan>
                                            <title>27.00</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1004" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 151px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 73.3523px; top: 143.597px;">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                    04 Mar 2012</div>
                                <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(34, 183, 131);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">series-1:
                                            </span><span class="apexcharts-tooltip-text-y-value">33.22</span>
                                        </div>
                                        <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span>
                                        </div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 14.282px; top: 272.2px;">
                                <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 74.0938px;">
                                    04 Mar 2012</div>
                            </div>
                            <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 701px; height: 303px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div> -->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

</div><!--end row-->
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Dashboard";
$contentheader = "";
$pageheader = "";
$watchliststocks = $wstocks;
include "main/templete.php"; ?>
<script>
    setInterval(() => {
        console.log('counting market')
        $('.national-data').html()
        $.post("main/getlivemarketdatadashboard.php",
            function(data) {
                $('.national-data').html(data)
                let sidedata = $('#sidebarcolumn').html()
                $("#watchlist_2").html(sidedata)
            },
        );
    }, 5000)
</script>