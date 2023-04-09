<?php
include "session.php";
$exch = $_POST['exch'];
$type = $_POST['type'];
$scriptcode = $_POST['scriptcode'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$interval = $_POST['interval'];

$chartdata = $obj->getcandledata($scriptcode, $exch, $type, $interval, $startdate, $enddate);
$data = $chartdata['candles'];

$chart_data = array();

foreach ($data as $row) {
    $timestamp = strtotime($row[0]) * 1000; // convert to milliseconds
    $chart_data[] = array($timestamp, $row[1], $row[2], $row[3], $row[4], $row[5]);
}
?>
<?php
echo "Highcharts.chart('container', {
        title: {
            text: 'Stock Prices'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                hour: '%H:%M',
                day: '%e. %b',
                week: '%e. %b',
                month: '%b \'%y',
                year: '%Y'
            }
        },
        yAxis: {
            title: {
                text: 'Price'
            }
        },
        series: [{
            name: 'Open',
            data: " . json_encode($chart_data) . ",
            type: 'line',
            tooltip: {
                valueDecimals: 2
            }
        }]
    });
      ";
