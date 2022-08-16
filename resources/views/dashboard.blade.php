@extends('temp/template')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="/add_fasilitas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3 mb-5">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <a href="#" class="stretched-link" onclick="Ttl()"></a>
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
                    <a href="#" class="stretched-link" onclick="Fak()"></a>   
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
                    <a href="#" class="stretched-link" onclick="Prod()"></a>   
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
                    <a href="#" class="stretched-link" onclick="Luar()"></a>   
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

<div class="row" id="ttl" >
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
                    <h5>Kegiatan PKM</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>jumlah</th>
                                <th>persen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>total</td>
                                <td>{{$count['ttl']['ttl']}}</td>
                                <td>
                                    @if($count['ttl']['ttl']!=0)
                                        100%
                                    @else
                                        0%
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PKM Yang Melibatakan Mahasiswa
                                </td>
                                <td>
                                    {{$count['mhs']['ttl']}}
                                </td>
                                <td>@if($count['ttl']['ttl'] != 0)
                                        {{$count['mhs']['ttl'] * 100 / $count['ttl']['ttl']}}%
                                    @else
                                        0%
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Sumber Danaa</td>
                            </tr>
                            @foreach($count['smbr']['ttl'] as $item=>$value)
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            {{$item}}
                                        </li>
                                    </ul>
                                </td>
                                <td>{{$value}}</td>
                                <td>{{$value * 100 / $count['ttl']['ttl']}}%</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Skala Kegiatan</td>
                            </tr>
                            @foreach($count['skala']['ttl'] as $keys=>$value)
                                <tr>
                                   <td>
                                       <ul>
                                           <li>
                                               {{$keys}}
                                           </li>
                                       </ul>
                                   </td> 
                                   <td>{{$value}}</td>
                                   <td>{{$value * 100 / $count['ttl']['ttl']}}%</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Kesesuaian Dengan Roadmap</td>
                            </tr>
                            @foreach($count['roadmap']['ttl'] as $keys=>$value)
                                <tr>
                                    <td>
                                        <ul>
                                            <li>
                                                {{$keys}}
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        {{$value}}
                                    </td>
                                    <td>{{$value * 100 / $count['ttl']['ttl']}}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class="row" id="fak" hidden>
    <!-- Pie Chart -->
    @foreach($count['fak'] as $key=>$values)
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
                    <h5>{{$key}}</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>jumlah</th>
                                <th>persen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>total</td>
                                <td>{{$values}}</td>
                                <td>
                                    @if($count['ttl']['ttl']!=0)
                                        {{$values * 100 / $count['ttl']['ttl']}}%
                                    @else
                                        0%
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PKM Yang Melibatakan Mahasiswa
                                </td>
                                <td>
                                    {{$count['mhs'][$key]}}
                                </td>
                                <td>@if($values != 0)
                                        {{$count['mhs'][$key] * 100 / $values}}%
                                    @else
                                        0%
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Sumber Danaa</td>
                            </tr>
                            @foreach($count['smbr'][$key] as $item=>$value)
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            {{$item}}
                                        </li>
                                    </ul>
                                </td>
                                <td>{{$value}}</td>
                                <td>{{$value * 100 / $values}}%</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Skala Kegiatan</td>
                            </tr>
                            @foreach($count['skala'][$key] as $keys=>$value)
                                <tr>
                                   <td>
                                       <ul>
                                           <li>
                                               {{$keys}}
                                           </li>
                                       </ul>
                                   </td> 
                                   <td>{{$value}}</td>
                                   <td>{{$value * 100 / $values}}%</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Kesesuaian Dengan Roadmap</td>
                            </tr>
                            @foreach($count['roadmap'][$key] as $keys=>$value)
                                <tr>
                                    <td>
                                        <ul>
                                            <li>
                                                {{$keys}}
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        {{$value}}
                                    </td>
                                    <td>{{$value * 100 / $values}}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row" id="prod" hidden>
    <!-- Pie Chart -->
    @foreach($count['prod'] as $key=>$values)
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
                    <h5>{{$key}}</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>jumlah</th>
                                <th>persen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>total</td>
                                <td>{{$values}}</td>
                                <td>
                                    @if($count['ttl']['ttl']!=0)
                                        {{$values * 100 / $count['ttl']['ttl']}}%
                                    @else
                                        0%
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PKM Yang Melibatakan Mahasiswa
                                </td>
                                <td>
                                    {{$count['mhs'][$key]}}
                                </td>
                                <td>@if($values != 0)
                                        {{$count['mhs'][$key] * 100 / $values}}%
                                    @else
                                        0%
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Sumber Danaa</td>
                            </tr>
                            @foreach($count['smbr'][$key] as $item=>$value)
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            {{$item}}
                                        </li>
                                    </ul>
                                </td>
                                <td>{{$value}}</td>
                                <td>{{$value * 100 / $values}}%</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Skala Kegiatan</td>
                            </tr>
                            @foreach($count['skala'][$key] as $keys=>$value)
                                <tr>
                                   <td>
                                       <ul>
                                           <li>
                                               {{$keys}}
                                           </li>
                                       </ul>
                                   </td> 
                                   <td>{{$value}}</td>
                                   <td>{{$value * 100 / $values}}%</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Kesesuaian Dengan Roadmap</td>
                            </tr>
                            @foreach($count['roadmap'][$key] as $keys=>$value)
                                <tr>
                                    <td>
                                        <ul>
                                            <li>
                                                {{$keys}}
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        {{$value}}
                                    </td>
                                    <td>{{$value * 100 / $values}}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
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
    var fak = document.getElementById("fak")
    var prod = document.getElementById("prod")
    var ttl = document.getElementById("ttl")
    var luaran = document.getElementById("luaran")
    function Ttl(){
        ttl.hidden = false
        prod.hidden = true
        fak.hidden = true
        luaran.hidden = true
    }
    function Luar(){
        luaran.hidden = false
        prod.hidden = true
        ttl.hidden = true
        fak.hidden = true
    }
    function Fak(){
        fak.hidden = false
        prod.hidden = true
        ttl.hidden = true
        luaran.hidden = true
    }
    function Prod(){
        prod.hidden = false
        fak.hidden = true
        ttl.hidden = true
        luaran.hidden = true
    }
    var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            // data: {
            //     labels : keys,
            //     datasets: [{
            //         data: values,
            //         backgroundColor: color,
            //         hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            //         hoverBorderColor: "rgba(234, 236, 244, 1)",
            //     }],
            // },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: true,
                    caretPadding: 10,
                },
                legend: {
                    display: true
                },
                cutoutPercentage: 80,
            },
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
        myPieChart.data.labels.forEach((label)=>{
            labels.pop();
        });
        for(var i = 0 ; i<= keys.length - 1 ;i ++){
            values[i] = data[keys[i]];
            color[i] = '#'+Math.floor(Math.random()*16777215).toString(16);
            percent[i] = (values[i]*100)/{{$count['ttl']['ttl']}}
            dat[i] = values[i] + ' : ' + percent[i]
            myPieChart.data.labels.push(keys[i]);
        }
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';
        const randomColor = Math.floor(Math.random()*16777215).toString(16);
        // Pie Chart Example
        
        myPieChart.data.datasets.pop();
        myPieChart.data.datasets.push({
            data : values,
            backgroundColor: color,
        })
        myPieChart.update();
    }
    pieChart()
</script>
@endpush