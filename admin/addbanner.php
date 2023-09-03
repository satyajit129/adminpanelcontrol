<?php
include('authen.php');
// session_start();

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<?php
// Check if the form is submitted
// Check if the form is submitted
if(isset($_POST['bannercreate'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];

    // Validate data (you can add more validation as needed)
    if(empty($title) || empty($paragraph)) {
        $_SESSION['status'] = "Please fill out all fields";
    } else {
        // Insert data into the "banner" table (you can use your database connection code here)
        // Replace the following lines with your database insert query
        $insertQuery = "INSERT INTO banner (title, paragraph) VALUES ('$title', '$paragraph')";

        // Execute the insert query (you should use your database connection)
        $run_query = mysqli_query($con, $insertQuery);

        // Check if the insertion was successful and handle any errors
        if($run_query) {
            $_SESSION['status'] = "Banner added successfully";
            $_SESSION['status_code']='success';
        } else {
            $_SESSION['status'] = "Banner Tag not added: " . mysqli_error($con);
            $_SESSION['status_code']='error';
        }
    }

    // Redirect using JavaScript (alternative to header)
    echo '<script>window.location.href = "banner.php";</script>';
    exit();
}
?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        ADD Banner
                        <a href="banner.php" class="btn btn-success float-right btn-sm"><i class="fa fa-backward m-1"
                                aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="addbanner.php" method="POST">
                                    <div class="form-group">
                                        <label>Banner Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Paragraph </label>
                                        <textarea name="paragraph" id="" class="form-control" rows="4"
                                            required></textarea>
                                    </div>
                                    <button type="submit" name="bannercreate" class="btn btn-success mt-2 w-100">Add Banner</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
include('includes/footer.php');
?>