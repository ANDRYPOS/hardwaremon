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
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="200">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner" style=" height:400px">
                            @foreach ($carousels as $key => $hero)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    @if ($hero->is_active == 2)
                                        <img src="{{ asset('storage/banner/') }}/{{ $hero->banner }}"
                                            class="d-block w-100 rounded" alt="Cinque Terre" style="height: 400px">
                                    @endif
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
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($categori as $category)
                                <li data-filter=".filter-{{ $category->categories->name }}">
                                    {{ $category->categories->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- range --}}
                    {{-- <div class="col col-md-2 mb-2">
                        <form action="/action_page.php">
                            <label for="customRange" class="form-label">Filter price</label>
                            <input type="range" class="form-range" id="customRange" name="points">
                            <small>price min </small>-<small> price max</small>
                        </form>
                    </div> --}}

                    {{-- <div class="col col-md-3 mb-2">
                        <form action="{{ url('/') }}" method="post">
                            @csrf
                            <label for="amount">Price range:</label>
                            <input type="text" id="price" name="tampil"
                                style="border:0; color:#f6931f; font-weight:bold;">
                            <input type="hidden" id="price-min" name="priceMin"
                                style="border:0; color:#f6931f; font-weight:bold;">
                            <input type="hidden" id="price-max" name="priceMax"
                                style="border:0; color:#f6931f; font-weight:bold;">
                            <div id="slider-range"></div>
                            <div class="col col-md-1">
                                <input type="submit" role="button">
                            </div>
                        </form>
                    </div> --}}

                    {{-- range --}}

                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300" id="tampil">
                    @foreach ($products as $product)
                        @if ($product->status_id == 2)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $product->categories->name }}">
                                <div class="cari">
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
                        <div class="member m-auto" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/me.jpg') }}" class="img-fluid"
                                    style="height: 17rem; width: 15rem" alt="andryapp2006@gmail.com">
                                <div class="social">
                                    <a href="https://bit.ly/45WEXER"><i class="bi bi-github"></i></a>
                                    <a href="https://bit.ly/3CqM76u"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://bit.ly/3P5UFaG"><i class="bi bi-instagram"></i></a>
                                    <a href="https://bit.ly/43VO1YL"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Andri Elistiawan</h4>
                                <span>Junior Web Developer</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member m-auto" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/Kumparan.jpg') }}" class="img-fluid"
                                    style="height: 17rem; width: 15rem" alt="andryapp2006@gmail.com">
                                <div class="social">
                                    <a href="https://bit.ly/3Jd0WxE"><i class="bi bi-github"></i></a>
                                    <a href="https://bit.ly/3JfhCEt"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://bit.ly/43vsm9X"><i class="bi bi-instagram"></i></a>
                                    <a href="https://bit.ly/43Crkco"><i class="bi bi-linkedin"></i></a>
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
                        <strong><span>HardwareMon</span></strong>. All Reserved By Andri Elistiawan&copy;2023
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
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 30000000,
                values: [300000, 10000000],
                slide: function(event, ui) {
                    $("#price-min").val(ui.values[0]);
                    $("#price-max").val(ui.values[1]);
                    $("#price").val("Rp. " + ui.values[0] + " - Rp. " + ui.values[1]);
                }
            });
            $("#price-min").val($("#slider-range").slider("values", 0));
            $("#price-max").val($("#slider-range").slider("values", 1));

            $("#price").val("Rp. " + $("#slider-range").slider("values", 0) +
                " - Rp. " + $("#slider-range").slider("values", 1));

        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {

            $('#tampil').load("tampil.php");

            $("#Submit").click(function() {
                var data = $('#form').serialize();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/') }}",
                    data: data,

                    cache: false,
                    success: function(data) {
                        $('#tampil').load("tampil.php");
                    }
                });
            });
        });
    </script> --}}

    {{-- <script>
        function send() {
            var start = $('#amount_start').val();
            var end = $('#amount_end').val();

            $.ajax({
                method: "get",
                url: '/range',
                data: "start=" +
                    start + "& +end =" + end,
                beforeSend: function() {
                    $(#showPrice).show("fast");
                },

                complete: function() {
                    $(#showPrice).hide("fast");
                },

                success: function(html) {
                    $('#showDiv').show('slow');
                    $('#showDiv').html(html);
                },
            });
        }
    </script> --}}
    {{-- search --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#searchCard .cari").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> --}}
</body>

</html>
