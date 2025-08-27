@extends('layouts.app')


@section('content')


    <nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light py-2">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="{{asset('/images/logo.png')}}" alt="" width="96px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header01" aria-controls="header01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="header01">
                <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                    <li class="nav-item me-4"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="#">Company</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Testimonials</a></li>
                </ul>
                <div><a class="btn mt-3 bg-gradient-primary" href="{{url('/userLogin')}}">Start Sale</a></div>
            </div>
        </div>
    </nav>


        <section class="pb-5">
            <div class="container pt-2">
                <div class="row align-items-center mb-5">
                    <div class="col-12 col-md-10 col-lg-5 mb-5 mb-lg-0">
                        <h2 class=" fw-bold mb-3">Elevate Your Sales Game with Our Powerful POS Application! </h2>
                        <p class="lead text-muted mb-4">Discover streamlined transactions, real-time inventory management, and actionable insights in one intuitive POS app.</p>
                        <div class="d-flex flex-wrap"><a class="btn bg-gradient-primary me-2 mb-2 mb-sm-0" href="{{url('/userLogin')}}">Start Sale</a>
                            <a class="btn bg-gradient-primary mb-2 mb-sm-0" href="{{url('/userLogin')}}">Login</a></div>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1">
                        <img class="img-fluid" src="{{asset('/images/hero.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </section>


        <section class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto text-center">
                        <span class="text-muted">Happy Clients</span>
                        <p class="lead text-muted">Spotlight on Our Exceptional Client Success</p>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 p-3">
                        <div class="card px-0 text-center">
                            <img class=" card-img-top mb-3 w-100" src="{{asset('/images/tom.webp')}}" alt="">
                            <h5>TOM</h5>
                            <p class="text-muted mb-4">CEO &amp; Founder</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-3">
                        <div class="card px-0 text-center">
                            <img class=" card-img-top mb-3 w-100" src="{{asset('/images/jerry.jpg')}}" alt="">
                            <h5>DOREMON</h5>
                            <p class="text-muted mb-4">CEO &amp; Founder</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-3">
                        <div class="card px-0 text-center">
                            <img class=" card-img-top mb-3 w-100" src="{{asset('/images/doraemon.jpg')}}" alt="">
                            <h5>Jerry</h5>
                            <p class="text-muted mb-4">CEO &amp; Founder</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-3">
                        <div class="card px-0 text-center">
                            <img class=" card-img-top mb-3 w-100" src="{{asset('/images/oggy.jpg')}}" alt="">
                            <h5></h5>
                            <p class="text-muted mb-4">CEO &amp; Founder</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br/>

        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 mb-5 mb-lg-0">
                        <h2 class="fw-bold mb-5">Reach Out to Us: Let's Connect and Explore Opportunities Together</h2>
                        <h4 class="fw-bold">Address</h4>
                        <p class="text-muted mb-5">Bonosree-Dhaka</p>
                        <h4 class="fw-bold">Contact Us</h4>
                        <p class="text-muted mb-1">mahmud.hasan.apu23@gmail.com</p>
                        <p class="text-muted mb-0">01731825098</p>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1">
                        <form action="#">
                            <input class="form-control mb-3" type="text" placeholder="Name">
                            <input class="form-control mb-3" type="email" placeholder="E-mail">
                            <textarea class="form-control mb-3" name="message" cols="30" rows="10" placeholder="Your Message..."></textarea>
                            <button class="btn bg-gradient-primary w-100">Action</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-5 bg-light">
            <div class="container text-center pb-5 border-bottom">
                <a class="d-inline-block mx-auto mb-4" href="#">
                    <img class="img-fluid"src="{{asset('/images/logo.png')}}" alt="" width="96px">
                </a>
                <ul class="d-flex flex-wrap justify-content-center align-items-center list-unstyled mb-4">
                    <li><a class="link-secondary me-4" href="#">About</a></li>
                    <li><a class="link-secondary me-4" href="#">Company</a></li>
                    <li><a class="link-secondary me-4" href="#">Services</a></li>
                    <li><a class="link-secondary" href="#">Testimonials</a></li>
                </ul>
                <div>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/facebook.svg')}}">
                    </a>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/twitter.svg')}}">
                    </a>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/github.svg')}}">
                    </a>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/instagram.svg')}}">
                    </a>
                    <a class="d-inline-block" href="#">
                        <img src="{{asset('/images/linkedin.svg')}}">
                    </a>
                </div>
            </div>
            <div class="mb-5"></div>
            <div class="container">
                <p class="text-center">Thank You</p>
            </div>
        </footer>


@endsection

<style>
    body {
        background: #f9f9fb;
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
    }

    .navbar .nav-link {
        color: white !important;
        font-weight: 500;
        transition: 0.3s;
    }

    .navbar .nav-link:hover {
        color: #ffe600 !important;
    }

    .btn {
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn.bg-gradient-primary {
        background: linear-gradient(45deg, #6a11cb, #2575fc);
        color: white;
    }

    .btn.bg-gradient-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 12px 25px rgba(0,0,0,0.2);
    }

    h2, h5 {
        color: #2c3e50;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #ddd;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #2575fc;
        box-shadow: 0 0 8px rgba(37,117,252,0.5);
    }

    footer {
        background: linear-gradient(90deg, #2c3e50, #4ca1af);
        color: white;
    }

    footer a {
        color: #f1f1f1;
        transition: 0.3s;
    }

    footer a:hover {
        color: #ffe600;
    }
</style>
