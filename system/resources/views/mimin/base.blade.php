<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SABER" />
    <meta property="og:title" content="SABER" />
    <meta property="og:description" content="SABER" />
    <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>SABER</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ url('public') }}/mimin/images/favicon.png" />
    <link href="{{ url('public') }}/mimin/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="{{ url('public') }}/mimin/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ url('public') }}/mimin/css/style.css" rel="stylesheet">
    <script src="{{ url('public') }}/mimin/jquery-3.6.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    {{-- icon --}}
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/flaticon_1/_flaticon_1.scss">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/flaticon_1/flaticon_1.css">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/flaticon_1/flaticon_1.html">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/css/all.css">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/css/regular.css">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/css/solid.css">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/css/brands.css">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/scss/fontawesome.scss">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/scss/solid.scss">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/scss/brands.scss">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/scss/regular.scss">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/svgs/regular">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/svgs/solid">
    <link rel="stylesheet" href="{{ url('public') }}/mimin/icons/font-awesome/svgs/brands">

    @stack('style')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Header start
        ***********************************-->
        @include('mimin.layout.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('mimin.layout.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->



    <!--**********************************
            Footer start
        ***********************************-->
    @include('mimin.layout.footer')
    <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
           Support ticket button start
        ***********************************-->

    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('public') }}/mimin/vendor/global/global.min.js"></script>
    <script src="{{ url('public') }}/mimin/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ url('public') }}/mimin/js/dashboard/dashboard-1.js"></script>
    <script src="{{ url('public') }}/mimin/js/plugins-init/datatables.init.js"></script>

	<!-- Apex Chart -->
	<script src="{{url('public')}}/mimin/vendor/apexchart/apexchart.js"></script>
	<script src="{{url('public')}}/mimin/vendor/chart.js/Chart.bundle.min.js"></script>

	<!-- Chart piety plugin files -->
    <script src="{{url('public')}}/mimin/vendor/peity/jquery.peity.min.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{url('public')}}/mimin/js/dashboard/statistics-page.js"></script>

    <script src="{{ url('public') }}/mimin/js/custom.min.js"></script>
    <script src="{{ url('public') }}/mimin/js/dlabnav-init.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table-datatable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')

    {{-- <script>
        function JobickCarousel() {

            /*  testimonial one function by = owl.carousel.js */
            jQuery('.front-view-slider').owlCarousel({
                loop: false,
                margin: 30,
                nav: true,
                autoplaySpeed: 3000,
                navSpeed: 3000,
                autoWidth: true,
                paginationSpeed: 3000,
                slideSpeed: 3000,
                smartSpeed: 3000,
                autoplay: false,
                animateOut: 'fadeOut',
                dots: true,
                navText: ['', ''],
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1
                    },

                    767: {
                        items: 3
                    },
                    1750: {
                        items: 3
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                JobickCarousel();
            }, 1000);
        });

        DataSemua();

        function DataSemua() {
            var DataSemua = $("#load_DataSemua");
            DataSemua.html("");
            $.ajax({

                type: "GET",
                url: "http://sinman.ketapangkab.go.id/dash_pd/api_v1/DataIndexOPD.php",
                async: true,
                cache: true,
                dataType: 'json',
                success: function(result) {
                    var resObjDataSemua = (result);
                    $.each(resObjDataSemua, function(key, val) {

                        var absensi = val.absensi;
                        var kinerja = val.kinerja;
                        var jumpegawai = val.jumpegawai;
                        var jumpegawaihonorer = val.jumpegawaihonorer;
                        var jumpegawaip3k = val.jumpegawaip3k;
                        var jumabsensiterlambat = val.jumabsensiterlambat;
                        var jumabsensipulangcepat = val.jumabsensipulangcepat;
                        var jumabsensicuti = val.jumabsensicuti;
                        var jumabsensipenugasan = val.jumabsensipenugasan;
                        var jumabsensiperjalanandinas = val.jumabsensiperjalanandinas;
                        var pegawaigambar = val.pegawaigambar;

                        document.getElementById("absensi").innerHTML = absensi;
                        document.getElementById("kinerja").innerHTML = kinerja;
                        document.getElementById("jumpegawai").innerHTML = jumpegawai;
                        document.getElementById("jumpegawaihonorer").innerHTML = jumpegawaihonorer;
                        document.getElementById("jumpegawaip3k").innerHTML = jumpegawaip3k;
                        document.getElementById("jumabsensiterlambat").innerHTML = jumabsensiterlambat;
                        document.getElementById("jumabsensipulangcepat").innerHTML =
                            jumabsensipulangcepat;
                        document.getElementById("jumabsensicuti").innerHTML = jumabsensicuti;
                        document.getElementById("jumabsensipenugasan").innerHTML = jumabsensipenugasan;
                        document.getElementById("jumabsensiperjalanandinas").innerHTML =
                            jumabsensiperjalanandinas;
                        document.getElementById("pegawaigambar").innerHTML = "<img src=" +
                            pegawaigambar + " width='100%'>";
                        document.getElementById("pegawaigambarmenu").innerHTML = "<img src=" +
                            pegawaigambar + " width='100%'>";



                    });
                },
            });
        }
        setInterval("DataSemua()", 1000);
    </script> --}}

</body>

</html>
