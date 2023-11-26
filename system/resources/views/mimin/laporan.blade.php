@extends('mimin.base')
@section('content')

<style>
    /* Ganti nilai width dan height sesuai kebutuhan */
    progress {
        width: 255px;
        height: 20px;
        
    }
</style>

    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20 font-w600">Profil Pendapatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-sm-6">
										<progress value="{{ number_format(floatval($total_rd2)), 2 }}" max="100"></progress>
                                        <div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
                                            <span class="fs-14 font-w500">Kendaraan Roda 2</span>
                                            <span class="fs-16"><span class="text-black pe-2"></span>{{ number_format(floatval($total_rd2)), 2 }} %</span>
                                        </div>
										<progress value="{{ number_format(floatval($total_rd4)), 2 }}" max="100"></progress>
                                        <div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
                                            <span class="fs-14 font-w500">Kendaraan Roda 4</span>
                                            <span class="fs-16"><span
                                                    class="text-black pe-2"></span>{{ number_format(floatval($total_rd4)), 2 }} %</span>
                                        </div>


                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div id="pieChart3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 flex-wrap pb-0">
                                <h4 class="fs-20 font-w600">Request Pelayanan </h4>
                                <div>
                                    <span>
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 13 13">
                                            <rect width="13" height="13" fill="#f73a0b" />
                                        </svg>
                                        Permohonan
                                    </span>
									{{-- <span class="ms-4 fs-16 font-w600">{{ $permohonan_count }}</span> --}}
                                    {{-- <div class="mt-2">
                                    <span>
                                        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                          <rect  width="13" height="13" fill="#black"/>
                                        </svg>
                                        Realisasi
                                    </span>
                                    <span class="ms-4 fs-16 font-w600">824</span>
                                </div> --}}
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-3">
                                <div id="chartBar" class="chartBar"></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    var pieChart3 = function() {
        var options = {
            series: [{{ number_format(floatval($total_rd2)), 2 }}, {{ number_format($total_rd4, 2) }}],
            chart: {
                type: 'donut',
                height: 230
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0,
            },
            colors: ['#F6AD2E', 'var(--primary)', '#412EFF'],
            legend: {
                position: 'bottom',
                show: false
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        height: 200
                    },
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pieChart3"), options);
        chart.render();

    }
</script>

<!-- kecamatan/index.blade.php -->
<script> var kecamatan = @json($kecamatan->pluck('kecamatan_nama')->toArray()); </script>
<script>
    // Gunakan kecamatan di sini
    console.log(kecamatan);
</script>

<script>
    var chartBar = function() {

        var options = {
            series: [{
                    name: 'Pelayanan',
                    data: [3, 12, 5, 6, 2, 1, 9],
                    //radius: 12,
                },
                {
                    name: 'Permohonan',
                    data: Object.values(permohonan_json),
                },

            ],
            chart: {
                type: 'bar',
                height: 230,

                toolbar: {
                    show: false,
                },

            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%',
                    endingShape: 'rounded'
                },
            },
            colors: ['#01111C', 'var(--primary)'],
            dataLabels: {
                enabled: false,
            },
            markers: {
                shape: "circle",
            },


            legend: {
                show: false,
                fontSize: '12px',
                labels: {
                    colors: '#000000',

                },
                markers: {
                    width: 18,
                    height: 18,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 12,
                }
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['transparent']
            },
            grid: {
                borderColor: '#eee',
            },
            xaxis: {

                categories: kecamatan,
                labels: {
                    style: {
                        colors: '#787878',
                        fontSize: '13px',
                        fontFamily: 'poppins',
                        fontWeight: 100,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
                crosshairs: {
                    show: false,
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#787878',
                        fontSize: '13px',
                        fontFamily: 'poppins',
                        fontWeight: 100,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
        chartBar1.render();
    }
</script>