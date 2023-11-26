<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SABER</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('public') }}/assets/img/logofav.png" rel="icon">
    <link href="{{ url('public') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('public') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('public') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: TheEvent
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center header-inner">
        <div class="container-fluid container-xxl d-flex align-items-center">

            <div id="logo" class="me-auto">
                <!-- Uncomment below if you prefer to use a text logo -->
                <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
                <a href="{{ url('/') }}" class="scrollto"><img src="{{ url('public') }}/assets/img/SABERfinal.png"
                        height="150%" alt="" title=""></a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}">Beranda</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            {{-- <a class="buy-tickets" href="#" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Pendaftaran</a> --}}



        </div>
    </header><!-- End Header -->

    <main id="main" class="main-page">

        <section id="schedule" class="section-with-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>PENDAFTARAN BERHASIL !!!</h2>
                    <p>Kami akan segera menghubungi anda apabila kuota pendaftaran sesuai dengan kecamatan yang anda
                        pilih sudah terpenuhi</p>
                </div>

                <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item" style="margin-bottom: 10px;">
                        <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab">ID PENDAFTARAN
                            #{{ $daftar->daftar_id }}</a>
                    </li>

                </ul>

                <h3 class="sub-heading">Pastikan Data yang anda isikan sudah benar</h3>

                <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

                    <!-- Schdule Day 1 -->
                    <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

                        <div class="row schedule-item">
                            <div class="col-md-2"><time>Nama</time></div>
                            <div class="col-md-10">
                                <h4>{{ $daftar->daftar_nama }}</h4>

                            </div>
                        </div>
                        <div class="row schedule-item">
                            <div class="col-md-2"><time>NIK</time></div>
                            <div class="col-md-10">
                                <h4>{{ $daftar->daftar_nik }}</h4>

                            </div>
                        </div>
                        <div class="row schedule-item">
                            <div class="col-md-2"><time>No. Telp / WA</time></div>
                            <div class="col-md-10">
                                <h4>{{ $daftar->daftar_wa }}</h4>

                            </div>
                        </div>
                        <div class="row schedule-item">
                            <div class="col-md-2"><time>Alamat</time></div>
                            <div class="col-md-10">
                                <h4>{{ $daftar->daftar_alamat }}</h4>

                            </div>
                        </div>
                        <div class="row schedule-item">
                            <div class="col-md-2"><time>Kecamatan</time></div>
                            <div class="col-md-2">
                                <h4>{{ $daftar->kecamatan->kecamatan_nama }}</h4>
                            </div>
                            <div class="col-md-8">

                                <a class="nopols" href="#">ANDA TERMASUK NO. {{$urutan_daftar}} DARI KUOTA {{$daftar->kecamatan->kecamatan_target}} LAYANAN</a>

                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-2"><time>NOPOL</time></div>
                            @foreach ($list_nopol as $nopol)
                                <div class="col-md-2">
                                    <h4>KB {{ $nopol->nopol_tengah }} {{ $nopol->nopol_belakang }}</h4>
                                </div>
                            @endforeach
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-2"><time>CATATAN</time></div>
                            <div class="col-md-10">
                                <h4>PELAYANAN AKAN DILAKUKAN APABILA SUDAH MENCAPAI / MELEBIHI KUOTA LAYANAN SEBESAR {{$daftar->kecamatan->kecamatan_target}}
                                    LAYANAN</h4>

                            </div>
                        </div>

                    </div>
                    <!-- End Schdule Day 1 -->

                </div>

            </div>

        </section><!-- End Schedule Section -->

    </main><!-- End #main -->

    <section id="buy-tickets" class="section-with-bg" style="margin-top: -50px;">


        <!-- Modal Order Form -->
        {{-- <div id="buy-ticket-modal" class="modal fade">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pendaftaran</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="keranjang.html">
              <div class="form-group">
                <input type="text" class="form-control" name="your-name" placeholder="Nama Anda">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="your-nik" placeholder="NIK Anda">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="your-wa" placeholder="Nomor WA">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="your-alamat" placeholder="Alamat Anda">
              </div>

              <div class="form-group mt-3">

                <select id="ticket-type" name="ticket-type" class="form-select">
                  <option value="0" selected>-- Pilih Kecamatan Pendaftaran--</option>
                  <option value="1">Delta Pawan</option>
                  <option value="2">Benua Kayong</option>
                  <option value="3">Matan Hilir Selatan</option>
                  <option value="4">Matan Hilir Utara</option>
                  <option value="5">Muara Pawan</option>
                  <option value="6">Kendawangan</option>
                  <option value="7">Manis Mata</option>
                  <option value="8">Air Upas</option>
                  <option value="9">Marau</option>
                  <option value="10">Singkup</option>
                  <option value="11">Tumbang Titi</option>
                  <option value="12">Sungai Melayu Rayak</option>
                  <option value="13">Jelai Hulu</option>
                  <option value="14">Pemahan</option>
                  <option value="15">Sandai</option>
                  <option value="16">Tayap</option>
                  <option value="17">Hulu Sungai</option>
                  <option value="18">Sungai Laur</option>
                  <option value="19">Simpang Dua</option>
                  <option value="20">Simpang Hulu</option>
                </select>
              </div>
              <div class="form-group mt-3 mb-2 row">
                <div class="col col-lg-2">
                  <label for="exampleFormControlInput1" class="form-label mt-1">NOPOL:</label>
                </div>
                <div class="col col-lg-1">
                  <label for="exampleFormControlInput1" class="form-label mt-1">KB</label>
                </div>
                <div class="col col-lg-3">
                  <input type="text" class="form-control text-center" name="your-alamat" placeholder="XXXX" maxlength="4" >
                </div>
                <div class="col col-lg-2">
                  <input type="text" class="form-control text-center" name="your-alamat" placeholder="XX" maxlength="2">
                </div>


              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn">Daftar Sekarang</button>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> --}}

    </section><!-- End Buy Ticket Section -->
    <section id="nopol" class="section-with-bg" style="margin-top: -50px;">


        <!-- Modal Order Form -->
        <div id="nopol-modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah NOPOL</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="keranjang2.html">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="your-nopol"
                                    placeholder="NOPOL Anda">
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn">Tambah NOPOL</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </section><!-- End Buy Ticket Section -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-6 footer-info">
                        <img src="{{ url('public') }}/assets/img/SABERfinal.png">
                        <p>SABER adalah Sistem yang akan memudahkan masyarakat dalam hal pelayanan pembayaran pajak
                            kendaraan dengan cara langsung mendatangi wilayah wajib pajak.<br>
                            Bayar pajak kendaraan lebih cepat, efektif dan mudah.<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Hubungi kami</h4>
                        <p>
                            Jl. Urip Sumoharjo<br>
                            Delta Pawan, Ketapang, Kalimantan Barat<br>
                            Indonesia<br>
                            <strong>Phone:</strong> +62534 23334556<br>
                            <strong>Email:</strong> sabe@example.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ======= Buy Ticket Section ======= -->


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>SABER</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
                Designed by <a href="#">KetapangKite</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('public') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ url('public') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('public') }}/assets/js/main.js"></script>

</body>

</html>
