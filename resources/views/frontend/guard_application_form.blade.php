<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SafetyFirst - Security Guard Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="{{asset('front_assets/img/favicon.ico')}}" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{ asset('front_assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet"
        media="all">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}"
        rel="stylesheet" media="all">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet" media="all">

</head>

<body class="bg-white">
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left">
                <div class="d-inline-flex align-items-center">
                    <p class="mr-2 mb-2 mb-lg-0 text-white">Opening Hours:</p>
                    <span class="mb-2 mb-lg-0 text-white">8.00AM - 9.00PM</span>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <p class="m-0 mr-1 text-white">Follow Us:</p>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">

                    <img src="{{ asset('front_assets/img/logo.jpg') }}">

                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right pt-4">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Our Office</h6>
                        <p class="m-0">123 Street, NY, USA</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email Us</h6>
                        <p class="m-0">info@example.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Call Us</h6>
                        <p class="m-0">+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-5">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-0">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span
                        class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav m-auto py-4">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="guard.html" class="nav-item nav-link">Guards</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link active">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container pt-5">
        <div class="d-flex flex-column text-center mb-5 text-center">

            <h2 class="m-0">Apply Online</h1>
                </br>


                <p>
                    At Constant, we always welcome professional people able to enrich our team with personality,
                    respectfulness and positively proactive in your dealings with the wider community.


                </p>

                <p>
                    If you are interested in applying for a job with Constant, please complete the below form and ensure
                    you upload your resume at the bottom of the page by clicking “Choose File” and once your file is
                    loaded click on “Send Application”.

                </p>


                <p>
                    Once we have received your application, we will be in touch within 2 – 3 business days.

                </p>

                <p>
                    We acknowledge the Traditional Custodians of the land on which we work and live and recognise their
                    continuing connection to land, water and community. We pay Constant respect to Elders past, present
                    and emerging.

                </p>

        </div>
        <form action="{{ route('frontend.guard_application_form_process') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="text" class="form-control" name="f_name" value="" id="f_name" placeholder="First Name *"
                             data-validation-required-message="Please enter your name" />
                            @error('f_name')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="text" class="form-control" name="l_name"  value="" id="" placeholder="Last Name"
                             data-validation-required-message="Please enter your name" />
                            @error('l_name')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="email" class="form-control" name="email" id="" value=""
                            placeholder="Email Address" 
                            data-validation-required-message="Please enter your email" />
                            @error('email')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="tel" name="mobile" class="form-control" id="mobile" value=""
                            placeholder="Phone Number" 
                            data-validation-required-message="Please enter your mobile" />
                            @error('mobile')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="text" name="address" class="form-control" id="address" value="" placeholder="Address"
                             data-validation-required-message="Please enter your email" />
                            @error('address')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="text" name="city" class="form-control" id="city" value="" placeholder="SUBURB / CITY"
                             data-validation-required-message="Please enter your city" />
                            @error('city')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="text" name="pincode" class="form-control" id="pincode" value="" placeholder="Post Code"
                             data-validation-required-message="Please enter your post code" />
                            @error('pincode')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="control-group form-group">
                        <input type="text" name="state" class="form-control" id="state" value="" placeholder="State"
                             data-validation-required-message="Please enter your state" />
                            @error('state')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="control-group form-group">


                        <textarea name="additional_information" cols="40" rows="10" class="form-control"
                            aria-required="true"  value="" aria-invalid="false" placeholder="ADDITIONAL INFORMATION*"></textarea>
                            @error('additional_information')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <b>WHICH TYPE OF LICENCE YOU HAVE</b><br>
                    <span class="wpcf7-form-control-wrap job-position">
                        <span class="wpcf7-form-control wpcf7-checkbox" style="display: grid;">
                            <span class="wpcf7-list-item first"><label>
                                <input type="radio" name="licence_type"
                                        value="Security Officer">
                                        <span class="wpcf7-list-item-label">Security
                                        Officer</span></label></span>
                            <span class="wpcf7-list-item"><label>
                                <input type="radio" name="licence_type"
                                        value="Corporate Security">
                                        <span class="wpcf7-list-item-label">Corporate
                                        Security</span>
                                    </label></span>
                            <span class="wpcf7-list-item"><label>
                                <input type="radio" name="licence_type"
                                        value="Concierge"><span
                                        class="wpcf7-list-item-label">Concierge</span></label></span>
                            <span class="wpcf7-list-item"><label><input type="radio" name="licence_type"
                                        value="Risk-safety consultant">
                                        <span class="wpcf7-list-item-label">Risk/safety
                                        consultant</span></label></span>
                            <span class="wpcf7-list-item"><label>
                                <input type="radio" name="licence_type"
                                        value="Event Personnel"><span class="wpcf7-list-item-label">Event
                                        Personnel</span></label></span>
                            <span class="wpcf7-list-item"><label>
                                <input type="radio" name="licence_type"
                                        value="Training"><span
                                        class="wpcf7-list-item-label">Training</span></label></span>
                            <span class="wpcf7-list-item last"><label>
                                <input type="radio" name="licence_type"
                                        value="Other"><span
                                        class="wpcf7-list-item-label">Other</span></label></span></span></span>
                </div>


                <div class="col-12">
                 <label>Upload Resume </label><br>
                    <span class="wpcf7-form-control-wrap upload-file">
                        <input type="file" name="resume" size="40" class="wpcf7-form-control wpcf7-file"
                                accept=".jpg,.jpeg,.pdf,.doc,.docx"
                                aria-invalid="false">
                                @error('resume')
                                <span class="text-success" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            </span>
                </div>

            </div>
            <p>
                @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
            </p>
            <div>
                <button class="btn btn-primary" type="submit" id="sendMessageButton">Apply</button>
            </div>
        </form>



    </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="display-5 text-primary">Gymnast</h1>
                <p class="m-0">Ipsum amet sed vero et lorem stet eos ut, labore sed sed stet sea est ipsum ut. Volup
                    amet ea sanct ipsum, dolore vero lorem no duo eirmod. Eirmod amet ipsum no ipsum lorem clita ut. Ut
                    sed sit lorem ea lorem sed, amet stet sit sea ea diam tempor kasd kasd. Diam nonumy etsit tempor ut
                    sed diam sed et ea</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Team</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Team</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                                style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                                style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                                style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                                style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved.
                    Designed by
                    <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary border back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front_assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('front_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('front_assets/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('front_assets/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front_assets/js/main.js')}}"></script>

    <style>
        span.wpcf7-list-item-label {
            padding-left: 8px;
        }

    </style>


</body>

</html>
