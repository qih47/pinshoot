<!DOCTYPE html>
<html lang="en">

<?php
require_once "system/lib/head.php";
?>

<body class="index-page">
  <?php
  require_once "system/nav/header.php";
  ?>
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2 style="color: blanchedalmond;">SELAMAT DATANG</h2>
          <!-- <p style="color: brown;">We are team of talented designers making websites with Bootstrap</p> -->
        </div><!-- End Welcome -->

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>PINSHOOT</h3>
              <p>
                KINI KAMI HADIR SEBAGAI CLUB MENEMBAK DARI PT PINDAD
              </p>
              <div class="text-center">
                <a href="#about" class="more-btn"><span>Mulai</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->


        </div><!-- End  Content-->

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox pulsating-play-btn"></a>   -->
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>About Us</h3>
            <p style="text-align: justify;">
              Pindad Shooting Club adalah klub menembak dari PT. Pindad yang di dirikan untuk mencari bakat-bakat penembak.
              Perkumpulan kami juga terbuka bagi semua orang yang ingin menyalurkan bakat, hobi dan skil-skil di bidang menembak.
              Perkumpulan kami juga memiliki : </p>
            <ul>
              <li>
                <i class="fa-solid fa-crosshairs"></i>
                <div>
                  <h5>Lapangan Tembak</h5>
                  <p>Kami memiliki lapangan tembak sendiri di area PT. Pindad</p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-gun"></i>
                <div>
                  <h5>Fasilitas Senjata</h5>
                  <p>Kami memiliki fasilitas produk senjata buatan PT. Pindad</p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-bomb"></i>
                <div>
                  <h5>Fasilitas Munisi</h5>
                  <p>Kami juga memiliki produk munisi buatan PT. Pindad</p>
                </div>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center">
            <i class="fa-solid fa-user-group"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
              <p>Membership</p>
            </div>
          </div><!-- End Stats Item -->


        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Departments Section -->
    <section id="menu" class="departments section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pilihan Menu</h2>
        <p>Pilihan Menu yang ada di Pindad Shooting Club</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1"><i class="bi bi-person"></i> Membership</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2"><i class="bi bi-person-x"></i> No Membership</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="departments-tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Membership</h3>
                    <p class="fst-italic">Jadilah bagian dari kami !!, Pindad Shooting Club adalah club menembak ekslusif</p>
                    <p>Kami menerima bagi siapa yang ingin bergabung menjadi bagian dari Pindad Shooting Club</p>
                    <p>Bagi yang ingin menjadi bagian dari Pindad Shooting Club akan menerima :</p>
                    <ul>
                      <li>
                        <div class="d-flex align-items-center">
                          <i class="fa-solid fa-check me-2"></i>
                          <p>Kartu Membership Eksekutif Pinshoot</p>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex align-items-center">
                          <i class="fa-solid fa-check me-2"></i>
                          <p>Jersey, topi dan tas Ekslusif Pinshoot</p>
                        </div>
                      </li>
                    </ul>
                    <p style="font-size: 20px; font-weight: bold;">Biaya Gabung: Rp. 1.000.000</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/logopinshoot.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Non Membership</h3>
                    <p class="fst-italic">Pindad Shooting Club juga terbuka bagi Non Membership</p>
                    <p>Kami menerima semua kalangan yang ingin melakukan kegiatan menembak di Pindad Shooting Club dengan fasilitas yang ada di Pinshot kami</p>
                    <p>Bagi yang ingin melakukan kegiatan menembak di Pinshoot akan mendapat fasilitas :</p>
                    <ul>
                      <li>
                        <div class="d-flex align-items-center">
                          <i class="fa-solid fa-check me-2"></i>
                          <p>Lapangan tembak gratis biaya sewa</p>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex align-items-center">
                          <i class="fa-solid fa-check me-2"></i>
                          <p>Pistol gratis biaya sewa</p>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex align-items-center">
                          <i class="fa-solid fa-check me-2"></i>
                          <p>Munisi 5 Butir</p>
                        </div>
                      </li>
                    </ul>
                    <p style="font-size: 20px; font-weight: bold;">Biaya: Rp. 100.000</p>
                    <p style="font-size: 20px; font-weight: bold;">Kegiatan di hari Sabtu mulai Pukul 08:00 WIB-17:00 WIB</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/Non-member.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Departments Section -->

    <!-- Doctors Section -->
    <section id="kepanitiaan" class="doctors section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kepanitiaan</h2>
        <!-- <p></p> -->
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/person.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Abraham Mose</h4>
                <span>Pelindung</span>
                <p>Sebagai pelindung organisasi pinshoot</p>
                <div class="social">
                  <!-- <a href=""><i class="bi bi-twitter-x"></i></a> -->
                  <!-- <a href=""><i class="bi bi-facebook"></i></a> -->
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <!-- <a href=""> <i class="bi bi-linkedin"></i> </a> -->
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/person.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Syaifuddin</h4>
                <span>Pelindung</span>
                <p>Sebagai pelindung organisasi pinshoot</p>
                <div class="social">
                  <!-- <a href=""><i class="bi bi-twitter-x"></i></a> -->
                  <!-- <a href=""><i class="bi bi-facebook"></i></a> -->
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <!-- <a href=""> <i class="bi bi-linkedin"></i> </a> -->
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/person.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>R. John Salale</h4>
                <span>Ketua</span>
                <p>Sebagai ketua organisasi pinshoot</p>
                <div class="social">
                  <!-- <a href=""><i class="bi bi-twitter-x"></i></a> -->
                  <!-- <a href=""><i class="bi bi-facebook"></i></a> -->
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <!-- <a href=""> <i class="bi bi-linkedin"></i> </a> -->
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/person.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Kamaludin</h4>
                <span>Wakil Ketua</span>
                <p>Sebagai wakil ketua organisasi pinshoot</p>
                <div class="social">
                  <!-- <a href=""><i class="bi bi-twitter-x"></i></a> -->
                  <!-- <a href=""><i class="bi bi-facebook"></i></a> -->
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <!-- <a href=""> <i class="bi bi-linkedin"></i> </a> -->
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Doctors Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Pertanyaan yang sering di tanyakan</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Berapa harga untuk sekali visit ke pinshoot?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa saja persyaratan untuk menjadi membership pinshoot?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Kegiatanya di lakukan di hari apa saja??</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Berapa harga yang harus di keluarkan untuk menjadi membership?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apakah yang tidak bisa menembak bisa mendaftar kegiatan ini?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apakah di sediakan peralatan tembaknya?</h3>
                <div class="faq-content">
                  <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Gallery Section -->
    <section id="galeri" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img1.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img2.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img3.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img4.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img5.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img6.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img7.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img8.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="assets/img/gallery/img8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="kontak" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
      </div><!-- End Section Title -->

    </section><!-- /Contact Section -->

  </main>

  <?php
  require_once "system/lib/footer.php";
  ?>

</body>

</html>