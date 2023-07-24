<?php
    include('authen.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>
<?php
if (isset($_GET['delete_category_id'])) {
    $delete_id = $_GET['delete_category_id'];
    
    // search for $delete_id to execute SQL operation
    
    $delete_query   = "DELETE FROM category WHERE category_id= '$delete_id'";
    $query          = mysqli_query($con, $delete_query);
    
    if ($query === TRUE) {
        $_SESSION['auth_status'] = "Category deleted successfully";
        // header('location: register.php');
    } else {
        $_SESSION['auth_status'] = "Category deletion failed";
    }
}
?>

<div class="content-wrapper">

    <!-- category add modal -->

    <!-- category add modal end -->
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
                        <li class="breadcrumb-item active">Category</li>
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
                        Category
                        <!-- <a href="#" class="btn btn-success btn-sm float-right"> -->

                        <form action="code.php" method="POST" class="float-right">
                            <label for="addcategory">Add Category:</label>
                            <input type="text" id="addcategory" name="addcategory" required>
                            <button type="submit" class="btn btn-success rounded-circle">
                                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            </button>
                        </form>
                        <!-- </a> -->

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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query= "SELECT * FROM category";
                                $query_run= mysqli_query($con,$query);
                                $serialNumber = 1;
                                if(mysqli_num_rows($query_run) >0){
                                    while ($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $serialNumber++; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a href="editcategory.php?category_id=<?php echo $row['category_id'];?>">
                                            <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i>
                                        </a>
                                        <a href="category.php?delete_category_id=<?php echo $row['category_id'];?>">
                                        <i class="fas fa-trash-alt fs-5 btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                else{
                                    ?>
                                <tr>
                                    <td>No data Found</td>
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