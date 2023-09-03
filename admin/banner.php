<?php
include('authen.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<?php 
// Check if the delete_banner_id parameter is set in the URL
if(isset($_GET['delete_banner_id'])) {
    // Retrieve the banner ID from the URL
    $deleteBannerID = $_GET['delete_banner_id'];

    // Perform the delete operation (you can use your database connection code here)
    // Replace the following lines with your database delete query
    $deleteQuery = "DELETE FROM banner WHERE id = '$deleteBannerID'";
    $deleteResult = mysqli_query($con, $deleteQuery);

    // Check if the delete operation was successful
    if($deleteResult) {
        $_SESSION['status'] = "Banner deleted successfully";
        $_SESSION['status_code']='success';
    } else {
        $_SESSION['status'] = "Error deleting banner: " . mysqli_error($con);
        $_SESSION['status_code']='error';
    }

    // Redirect back to the same page or another appropriate page
    echo '<script>window.location.href = "banner.php";</script>';
    exit();
}

// Rest of your banner.php page content here (e.g., displaying the table)
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

                        <a href="addbanner.php" class="btn btn-success btn-sm float-right">Add New Banner</a>
                    </div>
                    <div class="card-body">
                        <style>
                            table {
                                margin: 0 auto;
                            }

                            th,
                            td {
                                text-align: center;
                            }
                        </style>
                        <table id="datatable">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>carousel Heading</th>
                                    <th>carousel-Paragraph</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM banner";
                                $query_run = mysqli_query($con, $query);
                                $serialNumber = 1;

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $serialNumber; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['paragraph']; ?>
                                            </td>
                                            <td>
                                                <a href="banner-edit.php?banner_id=<?php echo $row['id']; ?>">
                                                    <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i></a>
                                                <a href="banner.php?delete_banner_id=<?php echo $row['id']; ?>">
                                                    <i class="fas fa-trash-alt fs-5 btn btn-danger btn-sm"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $serialNumber++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">No data Found</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>