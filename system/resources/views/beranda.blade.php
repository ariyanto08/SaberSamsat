<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SABER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('public')}}/assets/img/favicon.png" rel="icon">
  <link href="{{url('public')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('public')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('public')}}/assets/css/style.css" rel="stylesheet">

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
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
        <a href="index.html" class="scrollto"><img src="{{url('public')}}/assets/img/SABERfinal.png" height="150%" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#schedule">Penjadwalan</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets" href="#" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Pendaftaran</a>
      <a class="buy-tickets" href="http://saber.ketapangkab.go.id/mimin" >Login</a>



    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0"><strong  style="font-size: 178px;">SABER</strong><br><span>SAMSAT by REQUEST</span></h1>
      <p class="mb-4 pb-0">SAMSAT KETAPANG - KALIMANTAN BARAT</p>

      <a href="#about" class="about-btn scrollto">Tentang SABER</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8">
            <h2>Tentang SABER</h2>
            <p>SABER adalah Sistem yang akan memudahkan masyarakat dalam hal pelayanan pembayaran pajak kendaraan dengan cara langsung mendatangi wilayah wajib pajak.<br>bayar pajak kendaraan lebih cepat, efektif dan mudah..</p>
          </div>

          <div class="col-lg-4">
            <h3>Jumlah Layanan</h3>
            <p><span style="font-size: 55px; font-weight: 700;">2.345</span></p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <section id="buy-tickets" class="section-with-bg" style="margin-top: -50px;">


      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pendaftaran</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{url('/')}}" class="form-inlin">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control" name="daftar_nama" placeholder="Nama Anda">
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="daftar_nik" placeholder="NIK Anda">
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="daftar_wa" placeholder="Nomor WA">
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="daftar_alamat" placeholder="Alamat Anda">
                </div>

                <div class="form-group mt-3">

                  <select id="ticket-type" name="daftar_kecamatan" class="form-select">
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
                    <input type="text" class="form-control text-center" name="tengah" placeholder="XXXX" maxlength="4" >
                  </div>
                  <div class="col col-lg-2">
                    <input type="text" class="form-control text-center" name="belakang" placeholder="XX" maxlength="2">
                  </div>


                </div>



                <div class="text-center mt-3">
                  <button type="submit" class="btn">Daftar Sekarang</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </section><!-- End Buy Ticket Section -->
    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Penjadwalan</h2>
          <p>Silahkan cek jadwal sesuai domisili Kecamatan pada saat pendaftaran</p>
        </div>

        <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab">Delta Pawan</a>
          </li>
          <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">Simpang Hulu</a>
          </li>
          <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab">Simpang Dua</a>
          </li>

        </ul>

        <h3 class="sub-heading">Untuk sementara waktu hanya untuk Nopol wilayah Kalimantan Barat, <br>Pastikan anda membawa dokumen-dokumen terkait.</h3>

        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <div class="row schedule-item">
              <div class="col-md-2"><time>09:30 WIB</time></div>
              <div class="col-md-10">
                <h4>Senin, 24 Nopember 2023</h4>
                <p>Gedung SAMSAT KETAPANG</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:30 WIB</time></div>
              <div class="col-md-10">
                <h4>Senin, 24 Nopember 2023</h4>
                <p>Halaman Kantor Camat Delta Pawan</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:30 WIB</time></div>
              <div class="col-md-10">
                <h4>Selasa, 25 Nopember 2023</h4>
                <p>Halaman Gedung Pancasila Ketapang</p>
              </div>
            </div>



          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

            <div class="row schedule-item">
              <div class="col-md-2"><time>09:30 WIB</time></div>
              <div class="col-md-10">
                <h4>Selasa, 25 Nopember 2023</h4>
                <p>Kantor Camat Simpang Hulu</p>
              </div>
            </div>


          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:30 WIB</time></div>
              <div class="col-md-10">
                <h4>Kamis, 28 Nopember 2023</h4>
                <p>Kantor Camat Simpang Dua</p>
              </div>
            </div>



          </div>
          <!-- End Schdule Day 2 -->

        </div>

      </div>

    </section><!-- End Schedule Section -->


    <!-- =======  F.A.Q Section ======= -->
    <section id="faq">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-9">

            <ul class="faq-list">

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apa tujuan aplikasi ini? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Sistem / Aplikasi ini dibuat untuk mempermudah layanan pajak kendaraan. Wajib Pajak cukup menunggu pada wilayah terdekat, setelah sebelumnya melakukan proses
                    request. Petugas akan mendatangi wilayah anda sesuai dengan request.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Apakah saya dapat mendaftarkan yang bukan nopol milik saya? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                   Anda dapat mendaftarkan sejumlah nopol yang berbeda, dengan syarat utama nopol tersebut terdaftar sebagai nopol
                   wilayah Kalimantan Barat.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Saya sudah mendaftar, apalagi yang harus saya lakukan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                  Pada saat anda melakukan proses pendaftaran, sistem akan mencatat semua data-data yang diperlukan
                  pastikan anda mencatat ID Pendaftaran yang diberikan oleh sistem, petugas kami akan segera menghubungi anda melalui
                  no telepon whatsapp yang anda masukan apabila kuota wilayah yang anda request telah terpenuhi.


                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Apakah saya dapat melakukan request pada wilayah yang bukan domisili saya? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                  anda dengan bebas memilih wilayah terdekat dan atau yang sudah memenuhi kuota layanan.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Apakah saya dapat membayar langsung di tempat layanan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    petugas yang datang berkunjung adalah petugas resmi yang dilengkapi oleh atribut resmi<br>
                    petugas yang datang sesuai dengan jadwal yang tercantum pada sistem

                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Syarat-syarat apa saja yang harus saya siapkan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Syarat-syarat yang berlaku sesuai dengan syarat-syarat pada SAMSAT Ketapang.</p>
                </div>
              </li>

            </ul>

          </div>
        </div>

      </div>

    </section><!-- End  F.A.Q Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Hubungi kami</h2>
          <p>Anda dapat mengirimkan kami pesan untuk mendapatkan informasi lebih lanjut</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <address>Jl. Urip Sumoharjo, Delta Pawan, Ketapang</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>No. Telepon</h3>
              <p><a href="tel:+155895548855">+62534 333433</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">saber@samsatketapang.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Judul Pesan" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
            </div>

            <div class="text-center" style="margin-top: 30px;"><button type="submit">Kirim Pesan</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-9 col-md-6 footer-info">
            <img src="{{url('public')}}/assets/img/SABERfinal.png" >
            <p>SABER adalah Sistem yang akan memudahkan masyarakat dalam hal pelayanan pembayaran pajak kendaraan dengan cara langsung mendatangi wilayah wajib pajak.<br>
              Bayar pajak kendaraan lebih cepat, efektif dan mudah.<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Hubungi kami</h4>
            <p>
              Jl. Urip Sumoharjo<br>
              Delta Pawan, Ketapang, Kalimantan Barat<br>
              Indonesia<br>
              <strong>Phone:</strong> +62534 333433<br>
              <strong>Email:</strong> saber@samsatketapang.com<br>
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
        Designed by <a href="#">ACI</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('public')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{url('public')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('public')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{url('public')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{url('public')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{url('public')}}/assets/js/main.js"></script>

</body>

</html>
