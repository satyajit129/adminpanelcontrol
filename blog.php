<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog </title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container ">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                <div class="div">
                    <a class="navbar-brand " href="#">LOGO</a>
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
        </header>
    </div>
    <section class="bg-light ">
        <div class="container">
            <nav class="navbar  navbar-expand-lg navbar-light d-flex justify-content-between">
                <div class="div">
                    <a class="navbar-brand " href="#">LOGO</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="div ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item active ">
                                <a class="nav-link" href="#">/</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Blog </a>
                            </li>

                        </ul>
                    </div>
                </div>

            </nav>
        </div>
    </section>
    <div class="container py-4">
        <div class="row mt-4">
            <?php
                require_once "admin/config/dbcon.php";
                $query= "SELECT * FROM `post`";
                $query_run= mysqli_query($con,$query);
                $check_post= mysqli_num_rows($query_run)>0;
                if($check_post)
                {
                    while($row= mysqli_fetch_array($query_run)){
                        ?>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <img src="admin/images/<?php echo $row['tumb_img'] ?> "class="card-img-top"  height="600px" alt="Fcaulty Images">
                                    <h2 class="card-title"> <?php echo $row['title']; ?> </h2>
                                    <p class="card-text"> <?php echo $row['title']; ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                       
                    }
                }
                else
                {
                    echo "no post Found";
                }
            ?>
            
        </div>        
    </div>



    <!-- Bootstrap JS from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>