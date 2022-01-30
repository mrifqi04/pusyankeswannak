@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>DASHBOARD</h4>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <p>
                <h5>STATISTIK DATA PELAMAR</h5>
                <hr>
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
                </br>

                <h5>RATA RATA NILAI TES TERTULIS</h5>
                <hr>
                <div class="container row row-cols-4 row-cols-md-4 g-6 mb-2">
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Keamanan Kantor</p>
                        <h3 class="average" data-id="12">{{$average_tkk }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Kebersihan Kantor</p>
                        <h3 class="average">{{$average_tkbk }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Kesehatan Satwa</p>
                        <h3 class="average">{{$average_pks }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Laboratorium</p>
                        <h3 class="average">{{$average_tl }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Teknis Perawat Satwa</p>
                        <h3 class="average">{{ $average_ttps }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas IPAL</p>
                        <h3 class="average">{{$average_ipal }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Keurmaster</p>
                        <h3 class="average">{{$average_pk }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Mekanik dan Listrik</p>
                        <h3 class="average">{{$average_tmdl }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Customer Relation</p>
                        <h3 class="average">{{ $average_pcr }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Informasi</p>
                        <h3 class="average">{{$average_pi }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Penerima Tamu</p>
                        <h3 class="average">{{$average_ppt }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Supir</p>
                        <h3 class="average">{{$average_ts }}</h3>
                    </div>
                </div>

                </br>

                <h5>LOG ACTIVITY ADMIN</h5>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="container" ;>
                            <table class="table table-striped table-bordered" id="sortTable">
                                <thead>
                                    <tr>
                                        <th>TIMESTAMP</th>
                                        <th>NAMA</th>
                                        <th>AKTIVITAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ date('d M Y : h:i a', strtotime($log->created_at)) }}</td>
                                        <td>{{ $log->name }}</td>
                                        <td>{{ $log->aktifitas }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <script>
                            $("#sortTable").DataTable();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ URL::asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ URL::asset('admin/js/demo/chart-pie-demo.js') }}"></script>

<script>
    $(document).ready(function() {                      
        get_chart()      
    })

    function get_chart(month) {        
        $.ajax({
            url: '/statistik-pelamar',
            type: 'POST',  
            dataType: 'json',                                     
            cache: false,
            success: function(res) {
                console.log(res)
                let pelamar = []
                let total = []
                let max = 0                
                $.each(res, function(index, value) {
                    pelamar.push(value.nama_pekerjaan)
                    total.push(value.total)
                    max += value.total /2
                })               
                console.log(max)

                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';

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

                // Bar Chart Example
                var ctx = document.getElementById("myBarChart");
                var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // labels: ["January", "February", "March", "April", "May", "June"],
                    labels: pelamar,
                    datasets: [{
                    label: "Total",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    // data: [4215, 5312, 6251, 7841, 9821, 14984],
                    data: total,
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
                        unit: 'month'
                        },
                        gridLines: {
                        display: false,
                        drawBorder: false
                        },
                        ticks: {
                        maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                        min: 0,
                        // max: 15000,
                        max: max,
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
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ' ' + number_format(tooltipItem.yLabel);
                        }
                    }
                    },
                }
                });

            }
        }) 
    }
</script>
@endsection