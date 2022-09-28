@extends('temp/template')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <select name="tahun" id="tahuns" onchange="pkm()">
        @foreach($tahun as $key=>$value)
            <option value="{{$value->tahun_mulai}}">{{$value->tahun_mulai}}</option>
        @endforeach
    </select>
    <h1 id='tahun'>Tahun</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3 mb-5">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <a href="#" class="stretched-link" onclick="Tbl('ttl')"></a>
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h5>
                                Jumlah PKM Total
                            </h6>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-md-3 mb-5">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <a href="#" class="stretched-link" onclick="Tbl('fak')"></a>   
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <h5>
                                Berdasarkan Fakultas
                            </h5>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3 mb-5">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <a href="#" class="stretched-link" onclick="Tbl('prod')"></a>   
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <h5>
                                Berdasarkan Prodi
                            </h5>
                        </div>
                        <!-- <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-md-3 mb-5">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <a href="#" class="stretched-link" onclick="Tbl('luar')"></a>   
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <h5>
                                Luaran
                            </h5>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
    </div>
    <div class="card-body">
        <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
        </div>
        <hr>
        Styling for the area chart can be found in the
        <code>/js/demo/chart-area-demo.js</code> file.
    </div>
</div>

<div class="row" id="data">
    
    
</div>
<div class="row" id="luaran" hidden>
    <!-- Pie Chart -->
    <div class="col-xl-8 col-xl-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <!-- <h5 class="m-0 font-weight-bold text-primary">PKM Total  = {{$count['ttl']['ttl']}}</h5> -->
            </div>
            <!-- Card Body -->
                <div class="card-body">
                    <!-- <div class="chart-pie">
                        <canvas id="myPieChart"></canvas>
                        <canvas id="myAreaChart"></canvas>
                    </div> -->
                    <h5>Luaran</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>jumlah</th>
                                <th>persen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($luaran as $key=>$value)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$value}}</td>
                                    <td>
                                        @if($luaran['ttl']!=0)
                                            {{$value * 100 / $luaran['ttl']}}%
                                        @else
                                            0%
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
</div>

<!-- Content Row -->

</div>
@stop
@push('script')
<script>
    
    var luaran = document.getElementById("luaran")

    function Luar(array){
        pieChart(array);
        luaran.hidden = false
        prod.hidden = true
        ttl.hidden = true
        fak.hidden = true
    }
    function Faks(array){
        pieChart(array);
        fak.hidden = false
        prod.hidden = true
        ttl.hidden = true
        luaran.hidden = true
    }
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
        var ctx = document.getElementById("myAreaChart");
        var myPieChart = new Chart(ctx, {
            type: 'line',
            data: {
                    labels: [],
                    datasets: [{
                        label: "",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [],
                    }],
                },
                options: {
                            maintainAspectRatio: false,
                            layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                            },
                            scales: {
                            xAxes: [{
                                time: {
                                unit: 'date'
                                },
                                gridLines: {
                                display: false,
                                drawBorder: false
                                },
                                ticks: {
                                maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                                },
                                gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                                }
                            }],
                            },
                            legend: {
                            display: false
                            },
                            tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10,
                            callbacks: {
                                label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel  + number_format(tooltipItem.yLabel);
                                }
                            }
                            }
                        }
        });
    function aray(array){
        pieChart(array);
    }
    function pieChart(array){
        var data = array;
        var keys = Object.keys(data);
        var values = [];
        var color = [];
        var percent = [];
        var dat = []
        myPieChart.data.labels.forEach((labels)=>{
            myPieChart.data.labels.forEach((labels)=>{
                myPieChart.data.labels.pop();
            });
            myPieChart.data.labels.forEach((labels)=>{
                myPieChart.data.labels.pop();
            });
            myPieChart.data.labels.pop();
        });

        for(var i = 0 ; i<= keys.length - 1 ;i ++){
            values[i] = data[keys[i]];
            // color[i] = '#'+Math.floor(Math.random()*16777215).toString(16);
            // percent[i] = (values[i]*100)/{{$count['ttl']['ttl']}}
            // dat[i] = values[i] + ' : ' + percent[i]
            myPieChart.data.labels.push(keys[i]);
        }
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';
        const randomColor = Math.floor(Math.random()*16777215).toString(16);
        // Pie Chart Example
        
        myPieChart.data.datasets.pop();
        myPieChart.data.datasets.push({
            data : values,
        //     backgroundColor: color,
        })
        myPieChart.update();
    }
    pieChart()
</script>

<script>
    function Tbl(tab){
        tbl = tab
        pkm()
    }
    var thn = document.getElementById('tahuns').value;
    var tbl = 'fak';   
    var sumber = "";
    var skala ="";
    var roadmap ="";
    var ttl = 0;
    var mhs = 0;
    var trg = "";
    var gap = 0;
    function pkm(){
        function dana (arr){
            sumber = "";
            
            $.each(arr.dana,function(key,value){
                var ttl = 0;
                if(arr.ttl == 0){
                    ttl = 0;
                } else if(arr.ttl !=0){
                    ttl = value * 100 / arr.ttl;
                }
                sumber +=  `<tr>
                                <td>
                                    <ul>
                                        <li>
                                            ${key}
                                        </li>
                                    </ul>
                                </td>
                                <td>${value}</td>
                                <td>${ttl}%</td>
                            </tr>`
            })
        }
        function rdm (arr){
            roadmap = "";
            $.each(arr.roadmap,function(key,value){
                var ttl = 0;
                if(arr.ttl == 0){
                    ttl = 0;
                } else if(arr.ttl !=0){
                    ttl = value * 100 / arr.ttl;
                }
                roadmap +=  `<tr>
                                <td>
                                    <ul>
                                        <li>
                                            ${key}
                                        </li>
                                    </ul>
                                </td>
                                <td>${value}</td>
                                <td>${ttl}%</td>
                            </tr>`
            })
        }
        function skl (arr){
            skala = "";
            
                $.each(arr.skala,function(key,value){
                    var ttl = 0;
                    if(arr.ttl == 0){
                        ttl = 0;
                    } else if(arr.ttl !=0){
                        ttl = value * 100 / arr.ttl;
                    }
                    skala +=  `<tr>
                                    <td>
                                        <ul>
                                            <li>
                                                ${key}
                                            </li>
                                        </ul>
                                    </td>
                                    <td>${value}</td>
                                    <td>${ttl}%</td>
                                </tr>`
                })
        }
        function total (arr){
            ttl = ""
            if(arr.ttl != 0){
                ttl = ` <td>${arr.ttl}</td>
                        <td> 100% </td>`
            } else {
                ttl = ` <td>${arr.ttl}</td>
                        <td> 0% </td>`
            }
            
        }
        function mahasiswa(arr){
            mhs = ""
            if(arr.mhs != 0){
                mhs = ` <td>${arr.mhs}</td>
                        <td>${arr.mhs*100/arr.ttl}</td>`
            } else {
                mhs = ` <td>${arr.mhs}</td>
                        <td>0%</td>`
            }
        }
        function Target(arr){
            trg = ""
            gap = Math.abs(arr.target - arr.ttl)
            if(arr.target){
                trg += `<td>${arr.target}</td>`
            } else{
                trg += `<td>0</td>`
            }
            trg += `<td>${gap}</td>`
        }
        thn = document.getElementById('tahuns').value
        $.get('/tahun', {tahun_awal:thn, group:tbl}, function (data, textStatus, jqXHR) {      
            pieChart(data)
            document.getElementById('data').innerHTML =""
            if(tbl=='ttl'){
                dana(data) 
                skl(data)
                rdm(data)
                total(data)
                mahasiswa(data)
                Target(data)
                document.getElementById('data').innerHTML=
                `<div class="col-xl-8 col-xl-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        </div>
                        <!-- Card Body -->
                            <div class="card-body">
                                <h5>Total</h5>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>jumlah</th>
                                            <th>persen</th>
                                            <th>target</th>
                                            <th>selisih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>total</td>
                                            ${ttl}
                                            ${trg}
                                        </tr>
                                        <tr>
                                            <td>
                                                PKM Yang Melibatakan Mahasiswa
                                            </td>
                                            ${mhs}
                                        </tr>
                                        <tr>
                                            <td>Sumber Danaa</td>
                                        </tr>
                                                ${sumber}
                                        <tr>
                                            <td>Skala Kegiatan</td>
                                        </tr>
                                                ${skala}
                                        <tr>
                                            <td>Kesesuaian Dengan Roadmap</td>
                                        </tr>
                                                ${roadmap}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>`
            }
            else if(tbl=='luar'){
                var luaran = "";
                $.each(data, function(key,value){
                        luaran += ` <tr>
                                        <td>${key}</td>
                                        <td>${value}</td>
                                    </tr>`
                })
                document.getElementById('data').innerHTML+=
                        `<div class="col-xl-8 col-xl-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                </div>
                                <!-- Card Body -->
                                    <div class="card-body">
                                        <h5>Luaran</h5>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            ${luaran}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>`
            }
            else{
                var arr=[];
                $.each(data, function(key,value){
                    arr[key]=value.ttl
                    pieChart(arr)
                    dana(value) 
                    skl(value)
                    rdm(value)
                    total(value)
                    mahasiswa(value)
                    Target(value)
                    document.getElementById('data').innerHTML+=
                    `<div class="col-xl-8 col-xl-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            </div>
                            <!-- Card Body -->
                                <div class="card-body">
                                    <h5>${key}</h5>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>jumlah</th>
                                                <th>persen</th>
                                                <th>target</th>
                                                <th>selisih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>total</td>
                                                ${ttl}
                                                ${trg}
                                            </tr>
                                            <tr>
                                                <td>
                                                    PKM Yang Melibatakan Mahasiswa
                                                </td>
                                                ${mhs}
                                            </tr>
                                            <tr>
                                                <td>Sumber Danaa</td>
                                            </tr>
                                                    ${sumber}
                                            <tr>
                                                <td>Skala Kegiatan</td>
                                            </tr>
                                                    ${skala}
                                            <tr>
                                                <td>Kesesuaian Dengan Roadmap</td>
                                            </tr>
                                                    ${roadmap}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>`
                })
            }
           
        });
    }
    pkm()
</script>
@endpush