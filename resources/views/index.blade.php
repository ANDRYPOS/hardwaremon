<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HardwareMon | Welcome</title>

    <!-- logo -->
    <link href="{{ asset('assets/img/icon/LOGO.png') }}" rel="icon">
    <!-- /logo -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="/">HardwareMon</a></h1>
            </div>

            <nav id="navbar" class="navbar d-flex justify-content-center">
                <ul>
                    <li><a class="nav-link scrollto active d-flex justify-content-center" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto d-flex justify-content-center" href="#about">About</a></li>
                    <li><a class="nav-link scrollto d-flex justify-content-center" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto d-flex justify-content-center" href="#products">Products</a></li>
                    <li><a class="nav-link scrollto d-flex justify-content-center" href="#team">Team</a></li>
                    <li><a class="getstarted scrollto d-flex justify-content-center" href="{{ url('login') }}">Sign
                            in</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Solusi kebutuhan hardware anda</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400"><strong>HardwareMon kini hadir ditengah anda, kami
                            bersedia melayani anda
                            dengan berbagai macam hardware tersedia untuk melengkapi kebutuhan anda.</strong>
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="200">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner" style=" height:400px">
                            @foreach ($carousels as $key => $hero)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/banner/') }}/{{ $hero->banner }}"
                                        class="d-block w-100 rounded" alt="Cinque Terre" style="height: 400px">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev" style="width:20px">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next" style="width:20px">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- ======= End Hero ======= -->

    <main id="main">
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/HP_logo_2012.svg/100px-HP_logo_2012.svg.png"
                            class="img-fluid" alt="" data-aos="zoom-in">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="https://www.freepnglogos.com/uploads/logo-asus-png/custom-asus-logo-images-png-5.png"
                            class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="https://www.freepnglogos.com/uploads/logo-asus-png/republic-of-gamers-asus-logo-png-21.png"
                            class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuSbCRGr9GwwD9eXsf1ahD9rT1M6pyqequRIoV8GJdVFrWP10&s"
                            class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa4XQnW564HkBxFUBSYV2XMtt64f8CKtYjZLTq9QWBgELfnuT1&s"
                            class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="400">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3U3siCaYqMc-n4wQbwDAXZtVySUHS19i-YMEeK7NAfrBav5k&s"
                            class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="500">
                    </div>
                </div>
            </div>
        </section><!-- End Clients Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>About Us</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                        <p>
                            HardwareMon berfokus pada penyediaan hardware.
                            Aneka ragam hardware tersedia disini.
                            Selain penjualan, kami juga menyediakan layanan instalasi hardware sesuai kebutuhan
                            pembelian.
                            Layanan instalasi ditangani oleh seorang profesional berpengalaman.
                            HardwareMon juga menyediakan layanan antar jemput yang akan bersedia melayani diwilayah
                            Parung
                            dan sekitarnya.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Layanan instalasi</li>
                            <li><i class="ri-check-double-line"></i> Garansi resmi selama 3th</li>
                            <li><i class="ri-check-double-line"></i> Gratis layanan antar jemput untuk wilayah parung
                                dan
                                sekitarnya.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <p>
                            HardwareMon mulai operasi pukul 07.45 s/d 20.00 setiap harinya.
                        </p>
                        <a href="#" class="btn-learn-more">Learn more</a>
                    </div>
                </div>

            </div>
        </section><!-- ======= End About Us Section ======= -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Services</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">Hardware</a></h4>
                            <p class="description">Penjualan dan instalasi hardware ditangani oleh tenaga profesional.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Maintenance</a></h4>
                            <p class="description">Maintenance hardware dalam bentuk penanganan kesulitan pengguna.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Consultation</a></h4>
                            <p class="description">Layanan konsultasi dalam mengatasi kebutuhan dan kesulitan anda.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Shuttle</a></h4>
                            <p class="description">Layanan antar jemput tersedia untuk mengatasi pengiriman.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- ======= End Services Section ======= -->

        <!-- ======= products Section ======= -->
        <section id="products" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Products</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            @if (!$products)
                            @else
                                <li data-filter="*" class="filter-active">All</li>
                                @foreach ($categori as $category)
                                    <li data-filter=".filter-{{ $category->categories->name }}">
                                        {{ $category->categories->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300" id="tampil">
                    @foreach ($products as $product)
                        @if ($product->status_id == 2)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $product->categories->name }}">
                                <div class="portfolio-wrap rounded" style="height:250px">
                                    <img src="{{ asset('storage/products_img/') }}/{{ $product->image }}"
                                        class="img-fluid" alt="" style="height:250px; width:100%">
                                    <div class="portfolio-info">
                                        <h4>{{ $product->name }}</h4>

                                        <p>Rp. {{ number_format($product->price) }}.-</p>
                                        <div class="portfolio-links">
                                            <a href="{{ asset('storage/products_img/') }}/{{ $product->image }}"
                                                data-gallery="portfolioGallery" class="portfolio-lightbox"
                                                title="{{ $product->description }}"><i class="bi bi-zoom-in"
                                                    style="font-size:20px"></i></a>
                                            <a href="{{ url('login') }}" title="Buy Now"><i
                                                    class="bi bi-cart-check" style="font-size:20px"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ======= products Section ======= -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Team</h2>
                </div>

                <div class="row d-md-flex justify-content-center">
                    <div class="col-lg-3 col-md-12 d-flex align-items-stretch">
                        <div class="member m-auto mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/me.jpg') }}" class="img-fluid"
                                    style="height: 17rem; width: 15rem" alt="andryapp2006@gmail.com">
                                <div class="social">
                                    <a href="https://bit.ly/45WEXER" target="_blank"><i class="bi bi-github"></i></a>
                                    <a href="https://bit.ly/3CU1yol" target="_blank"><i
                                            class="bi bi-chat-text"></i></a>
                                    <a href="https://bit.ly/3P5UFaG" target="_blank"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="https://bit.ly/43VO1YL" target="_blank"><i
                                            class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Andri Elistiawan</h4>
                                <span>Junior Web Developer</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member m-auto mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/Kumparan.jpg') }}" class="img-fluid"
                                    style="height: 17rem; width: 15rem" alt="adedwiputra16@gmail.com">
                                <div class="social">
                                    <a href="https://bit.ly/3Jd0WxE" target="_blank"><i class="bi bi-github"></i></a>
                                    <a href="https://bit.ly/3qOicD0" target="_blank"><i
                                            class="bi bi-chat-text"></i></a>
                                    <a href="https://bit.ly/43vsm9X" target="_blank"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="https://bit.ly/43Crkco" target="_blank"><i
                                            class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Ade Dwi Putra</h4>
                                <span>Junior Web Developer</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12 text-lg-left text-center">
                    <div class="copyright">
                        <strong><span>HardwareMon</span></strong>. By Andri Elistiawan
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</body>

</html>
