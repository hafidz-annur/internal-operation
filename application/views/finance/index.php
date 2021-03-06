<style>
@import url('https://fonts.googleapis.com/css?family=Lobster&display=swap');

.count-title {
    font-size: 40px;
    font-family: 'Lobster', cursive;
    color: #3f3b3b;
}
</style>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-home mt-1"></i>&nbsp;&nbsp; Home Page
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3" style="cursor:pointer" onclick="window.location='<?=base_url('finance/petty-cash');?>'">
        <div class="card mb-3 shadow">
            <div class="row no-gutters">
                <div class="col-md-4 text-center align-middle p-4">
                    <img src="<?=base_url('assets/img/petty-cash.png');?>" alt="petty cash" width="70%">
                </div>
                <div class="col-md-8 bg-info text-white shadow align-middle">
                    <div class="card-body">
                        <h5 class="text-right mb-0">Petty Cash</h5>
                        <div class="line" style="margin-top:8px; margin-bottom:7px;"></div>
                        <h5 class="card-title text-right mb-0">Rp.
                            <?=number_format($saldo['pettysaldo_balance']);?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 shadow" style="cursor:pointer"
            onclick="window.location='<?=base_url('finance/invoice/student/');?>'">
            <div class="row no-gutters">
                <div class="col-md-4 text-center my-auto">
                    <h3 class="count-title"><?=$inv;?></h3>
                </div>
                <div class="col-md-8 bg-secondary text-white shadow align-middle">
                    <div class="card-body pt-4 pb-3">
                        <h4 class="text-right mb-2">Total Invoice </h4>
                        <h6 class="text-right">Of B2C/Students</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3 shadow" style="cursor:pointer"
            onclick="window.location='<?=base_url('finance/invoice/school/');?>'">
            <div class="row no-gutters">
                <div class="col-md-4 text-center my-auto">
                    <h3 class="count-title"><?=$invsch;?></h3>
                </div>
                <div class="col-md-8 bg-primary text-white shadow align-middle">
                    <div class="card-body pt-4 pb-3">
                        <h4 class="text-right mb-2">Total Invoice </h4>
                        <h6 class="text-right">Of B2B/Schools</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mb-3 shadow" style="cursor:pointer"
            onclick="window.location='<?=base_url('finance/receipt/student/');?>'">
            <div class=" row no-gutters">
                <div class="col-md-4 text-center my-auto">
                    <h3 class="count-title"><?=$receipt;?></h3>
                </div>
                <div class="col-md-8 bg-warning text-white shadow align-middle">
                    <div class="card-body pt-4 pb-3">
                        <h4 class="text-right mb-2">Total Receipt </h4>
                        <h6 class="text-right">Of B2C/B2B</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h4>Invoice</h4>
                <hr>
                <canvas id="myChart1"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h4>Receipt</h4>
                <hr>
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h4>Revenue</h4>
                <hr>
                <canvas id="myChart3"></canvas>
            </div>
        </div>
    </div>
</div>
<?php
$month = ['', 'January','February','March','April','May','June','July','August','September','October','November','December'];
$mon = [];
$totrev = [];

foreach($revenue as $rev) :
$tot = $rev['amount']-$rev['refund'];
array_push($mon, $month[$rev['m']].' '.$rev['y']);
array_push($totrev,$tot/1000000);
endforeach; 
$arr1 = implode(",",$mon);
$arr2 = implode(",",$totrev);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


var ctx1 = $("#myChart1");
new Chart(ctx1, {
    data: {
        datasets: [{
            data: ["<?=$inv;?>", "<?=$invsch;?>"],
            backgroundColor: ["#6C757D", "#1F7EE4"],
            label: 'My dataset' // for legend
        }],
        labels: ["B2C/Students", "B2B/Schools"]
    },
    type: 'polarArea'
});

var ctx2 = $("#myChart2");
new Chart(ctx2, {
    data: {
        datasets: [{
            data: ["<?=$rec;?>", "<?=$recsch;?>"],
            backgroundColor: ["#ff8507", "#976ef1"],
            label: 'My dataset' // for legend
        }],
        labels: ["B2C/Students", "B2B/Schools"]
    },
    type: 'polarArea'
});

let rev1 = "<?=$arr1;?>";
let array1 = rev1.split(",");

let rev2 = "<?=$arr2;?>";
let array2 = rev2.split(",");

var ctx3 = $("#myChart3");
new Chart(ctx3, {
    type: 'line',
    data: {
        labels: array1,
        datasets: [{
            data: array2,
            borderColor: '#fc840c',
            backgroundColor: 'rgba(255, 0, 0, 0.0)',
            borderWidth: 3,
            label: 'Total Revenue'
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false,
                    callback: function(value, index, values) {
                        return 'Rp. ' + number_format(value) + ' M';
                    }
                }
            }],
            xAxes: [{
                ticks: {
                    display: true
                }
            }],
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ' ';
                    return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel, 2) + ' M';
                }
            }
        },
        legend: {
            display: false
        }
    }
});
</script>