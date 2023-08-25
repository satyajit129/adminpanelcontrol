<?php
include('../admin/config/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog - Moderna Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Moderna
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light"><a href="index.php"><span>Moderna</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="" href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="team.php">Team</a></li>
                    <li><a class="active" href="blog.php">Blog</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>

                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <?php
                        $tag_id = isset($_GET['id']) ? $_GET['id'] : "";

                        // Validate and sanitize the input to prevent SQL injection
                        $tag_id = mysqli_real_escape_string($con, $tag_id);
                        
                        $tag_query = "SELECT * FROM post_tag WHERE tag_id = '$tag_id'";
                        $query_run_pagination = mysqli_query($con, $tag_query);
                        
                        // Fetch related posts outside the loop
                        $related_posts = array();
                        while ($row_pagination = mysqli_fetch_assoc($query_run_pagination)) {
                            $related_posts[] = $row_pagination['post_id'];
                        }
                        
                        $total_post = count($related_posts);
                        $limit = 3;
                        $page = ceil($total_post / $limit);
                        
                        if (!isset($_GET['page'])) {
                            $page_s = 1;
                        } else {
                            $page_s = $_GET['page'];
                        }
                        
                        $offset = ($page_s - 1) * $limit;
                        
                        $pagination_query = "SELECT * FROM post WHERE post_id IN (" . implode(',', $related_posts) . ") LIMIT $limit OFFSET $offset";
                        $query_run = mysqli_query($con, $pagination_query);
                        
                        while ($row = mysqli_fetch_assoc($query_run)) { ?>
                                    <article class="entry">
                                        <div class="entry-img m-5">
                                            <img src="../admin/images/<?php echo $row['tumb_img']; ?>" alt="" class="img-fluid">
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="blog-single.php">
                                                <?php echo $row['title']; ?>
                                            </a>
                                        </h2>
                                        <div class="entry-meta">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-single.php"><time datetime="2020-01-01">
                                                            <?php echo $row['created_at']; ?>
                                                        </time></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="entry-content">
                                            <p>
                                                <?php echo $row['post_details']; ?>
                                            </p>
                                            <div class="read-more">
                                                <a href="blog-single.php?post_id=<?php echo $row['post_id'];?>">Click to Read More</a>
                                            </div>
                                        </div>
                                    </article><!-- End blog entry -->
                                    <?php
                                }
                        ?>
                        <!-- pagination start -->
                        <ul class="pagination pt-2 pb-5">
                            <?php for ($i = 1; $i <= $page; $i++) { ?>
                                <li class="page-item <?= ($i == $page_s) ? "active" : "" ?>">
                                    <a href="tagshow.php?id=<?= $tag_id ?>&page=<?= $i ?>" class="page-link">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- pagination end here -->



                        <!-- showing post -->

                    </div><!-- End blog entries list -->
                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <ul class="list-group">
                                <h3 class="sidebar-title text-center text-white bg-primary p-2 rounded">Categories</h3>
                                <?php
                                $query = "SELECT * FROM category";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        $category_id = $row['category_id'];
                                        $subcategory_query = "SELECT * FROM subcategory WHERE category_id = '$category_id'";
                                        $subcategory_query_run = mysqli_query($con, $subcategory_query);
                                        $count_query = "SELECT * FROM post WHERE category_id = '$category_id'";
                                        $count_query = mysqli_query($con, $count_query);
                                        ?>
                                        <li
                                            class="list-group-item category-item d-flex justify-content-between align-items-center">
                                            <a href="categoryshow.php?id=<?= $row['category_id'] ?>"
                                                class="text-dark category-link">
                                                <?php echo $row['category_name']; ?>
                                            </a>
                                            <div class="subcategory-list list-group">
                                                <?php
                                                while ($subcategory_row = mysqli_fetch_assoc($subcategory_query_run)) { ?>
                                                    <a href="" class="m-2">
                                                        <?php echo $subcategory_row['subcategory_name'] . "<br>"; ?>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <span class="badge bg-primary rounded-pill">
                                                <?php echo mysqli_num_rows($count_query); ?>
                                            </span>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>

                            <style>
                                .list-group {
                                    list-style: none;
                                    padding: 0;
                                    width: 300px;
                                    /* Adjust the width as needed */
                                }

                                .category-item {
                                    padding: 10px;
                                    border: 1px solid #ccc;
                                    margin-bottom: 5px;
                                    position: relative;
                                    cursor: pointer;
                                }

                                .category-link {
                                    text-decoration: none;
                                    color: #333;
                                }

                                .subcategory-list {
                                    display: none;
                                    position: absolute;
                                    top: 100%;
                                    left: 20%;
                                    background-color: #fff;
                                    border: 1px solid #ccc;
                                    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
                                    padding: 10px;
                                    z-index: 1;
                                    width: 100%;
                                }

                                .category-item:hover .subcategory-list {
                                    display: block;
                                }

                                .subcategory-item {
                                    margin-bottom: 5px;
                                }
                            </style>
                            <!-- RECENT POST  -->
                            <ul class="list-group mt-5 mb-5">
                                <h3 class="sidebar-title text-center text-white bg-primary p-2 rounded">Recent Posts
                                </h3>
                                <?php
                                $recentpostquery = "SELECT * FROM `post` ORDER BY `post`.`created_at` DESC LIMIT 5";
                                ;
                                $recentpostquery_run = mysqli_query($con, $recentpostquery);
                                while ($recentpostrow = mysqli_fetch_assoc($recentpostquery_run)) {
                                    ?>

                                    <div class="sidebar-item recent-posts">
                                        <div class="post-item clearfix">
                                            <img src="../admin/images/<?php echo $recentpostrow['tumb_img']; ?>" alt="">
                                            <h4><a href="blog-single.php">
                                                    <?php echo $recentpostrow['title']; ?>
                                                </a></h4>
                                            <time datetime="2020-01-01">
                                                <?php echo $recentpostrow['created_at']; ?>
                                            </time>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </ul>
                            <!-- recent post -->


                            <!-- show all tag items -->
                            <ul class="list-group">
                                <h3 class="sidebar-title text-center text-white bg-primary p-2 rounded">Tags</h3>
                                <?php
                                $query = "SELECT * FROM tag";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <li
                                            class="list-group-item category-item d-flex justify-content-between align-items-center">
                                            <a href="tagshow.php?id=<?= $row['tag_id'] ?>" class="text-dark category-link">
                                                <?php echo $row['tag_name']; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <!-- show all tag items -->


                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>About Moderna</h3>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies
                            darta donna mare fermentum iaculis eu non diam phasellus.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>