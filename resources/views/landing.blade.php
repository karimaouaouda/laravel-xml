<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>EduBridge</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="{{ asset('css/pfe/bootstrap-icons.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('css/pfe/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pfe/carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/pfe/lightbox.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/pfe/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/pfe/styles.css') }}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid header position-relative overflow-hidden p-0">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.html" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary m-0">EDU.BRIDGE</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#" class="nav-item nav-link active">&nbsp;</a>
                        <a href="#" class="nav-item nav-link">&nbsp;</a>
                        <a href="#" class="nav-item nav-link">&nbsp;</a>

                        <a href="#" class="nav-item nav-link">&nbsp;</a>
                    </div>
                    <a href="{{ route('route-user', ['action' => 'register']) }}" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">S'inscrire</a>
                    <a href="{{ route('route-user', ['action' => 'login']) }}" class="btn btn-primary rounded-pill text-white py-2 px-4">Se connecter</a>
                </div>
            </nav>


            <!-- Hero Header Start -->
            <div class="hero-header overflow-hidden px-5">
                <div class="rotate-img">
                    <img src="https://www.gouanour.com/pfe/img/sty-1.png" class="img-fluid w-100" alt="">
                    <div class="rotate-sty-2"></div>
                </div>
                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">Online Platform to share exercises and deposit solutions</h1>
                        <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">for Automate the learning and teaching process</p>
                        <a href="{{ route('route-user', ['action' => 'login']) }}" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Se connecter</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                        <img src="{{ asset('images/illustrator.png') }}" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
            </div>
            <!-- Hero Header End -->
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://www.gouanour.com/pfe/jquery.min.js"></script>
    <script src="https://www.gouanour.com/pfe/bootstrap.bundle.min.js"></script>
    <script src="https://www.gouanour.com/pfe/lib/wow/wow.min.js"></script>
    <script src="https://www.gouanour.com/pfe/lib/easing/easing.min.js"></script>
    <script src="https://www.gouanour.com/pfe/lib/waypoints/waypoints.min.js"></script>
    <script src="https://www.gouanour.com/pfe/lib/counterup/counterup.min.js"></script>
    <script src="https://www.gouanour.com/pfe/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://www.gouanour.com/pfe/lib/lightbox/js/lightbox.min.js"></script>


    <!-- Template Javascript -->
    <script src="https://www.gouanour.com/pfe/js/main.js"></script>
    </body>

</html>
