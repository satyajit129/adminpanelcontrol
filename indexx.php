<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog </title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylee.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />



</head>

<body>
    <header>
        <div class="container ">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                <div class="div">
                    <a class="navbar-brand" href="#">LOGO</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="div ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active m-3">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item m-3">
                                <a class="nav-link" href="#">About </a>
                            </li>
                            <li class="nav-item m-3">
                                <a class="nav-link" href="#">Services </a>
                            </li>
                            <li class="nav-item m-3">
                                <a class="nav-link" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item m-3 dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item m-3">
                                <a class="nav-link" href="#">Contact US</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </nav>

        </div>
    </header>
    <hr>
    <section id="slider-section">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="admin/images/1.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h2 class="animate__animated animate__fadeInDown">Caption for the first slide</h2>
                            <p class="animate__animated animate__fadeInUp">Description for the first slide</p>
                            <a href="#" class="btn btn-outline-success btn-sm animate__animated animate__fadeInUp">Read
                                More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="admin/images/1.jpg" alt="Second slide">
                        <div class="carousel-caption">
                            <h2 class="animate__animated animate__fadeInDown">Caption for the second slide</h2>
                            <p class="animate__animated animate__fadeInUp">Description for the second slide</p>
                            <a href="#" class="btn btn-outline-success btn-sm animate__animated animate__fadeInUp">Read
                                More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="admin/images/1.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h2 class="animate__animated animate__fadeInDown">Caption for the third slide</h2>
                            <p class="animate__animated animate__fadeInUp">Description for the third slide</p>
                            <a href="#" class="btn btn-outline-success btn-sm animate__animated animate__fadeInUp">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <hr>
    <section class="services">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="content " data-aos="fade-down" data-aos-delay="100000">
                    <i class="fa-solid fa-a"></i>
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, blanditiis.
                            Nostrum temporibus assumenda architecto nulla</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="content " data-aos="fade-down">
                        <i class="fa-solid fa-b"></i>
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, blanditiis.
                            Nostrum temporibus assumenda architecto nulla.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="content " data-aos="fade-down">
                    <i class="fa-solid fa-c"></i>
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, blanditiis.
                            Nostrum temporibus assumenda architecto nulla.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="content " data-aos="fade-down">
                    <i class="fa-solid fa-d"></i>
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, blanditiis.
                            Nostrum temporibus assumenda architecto nulla.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">

            <div class="section-title">
                <h2 class="mb-4 text-center">Features</h2>
                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam
                    voluptatibus, totam laborum obcaecati amet aperiam dolore corporis laboriosam facere inventore culpa
                    at eius, alias cumque excepturi ab voluptas minus tempora?</p>
            </div>

            <div class="row aos-init aos-animate mt-5" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="vendor/image/features-1.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4">
                    <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione modi error inventore iure
                        architecto voluptas!</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    </ul>
                </div>
            </div>

            <div class="row aos-init aos-animate mb-5" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="vendor/image/features-2.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">
                    <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione modi error inventore iure
                        architecto voluptas!</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

            <div class="row aos-init aos-animate mb-5" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="vendor/image/features-3.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5">
                    <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione modi error inventore iure
                        architecto voluptas!</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                    </ul>
                </div>
            </div>

            <div class="row aos-init mb-5" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="vendor/image/features-4.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">

                    <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione modi error inventore iure
                        architecto voluptas!</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                </div>

            </div>
    </section>
    <!-- Remove the container if you want to extend the Footer to full width. -->
        <!-- Footer -->
        <footer class="text-lg-start text-dark" style="background-color: #ECEFF1">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">
                <!-- Left -->
                <div class="me-5">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div class="footer-link">
                    <a href="" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Company name</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                Here you can use rows and columns to organize your footer
                                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-dark">MDBootstrap</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">MDWordPress</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">BrandFlow</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">Bootstrap Angular</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-dark">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p> New York, NY 10012, US</p>
                            <p> info@example.com</p>
                            <p> + 01 234 567 88</p>
                            <p> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="p-3 text-center" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2023 Copyright:
                <a class="text-dark " href="#">Satyajit Roy</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->



    <!-- Bootstrap JS from CDN -->
    <script src="ism/js/ism-2.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    var currentIndex = 0;
    var carouselItems = document.querySelectorAll('.carousel-item');
    var prevButton = document.querySelector('.carousel-control-prev');
    var nextButton = document.querySelector('.carousel-control-next');

    function showSlide(index) {
        carouselItems[currentIndex].classList.remove('active');
        carouselItems[index].classList.add('active');
        currentIndex = index;
    }

    prevButton.addEventListener('click', function(event) {
        event.preventDefault();
        var prevIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
        showSlide(prevIndex);
    });

    nextButton.addEventListener('click', function(event) {
        event.preventDefault();
        var nextIndex = (currentIndex + 1) % carouselItems.length;
        showSlide(nextIndex);
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>

</body>

</html>