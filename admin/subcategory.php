<?php
    include('authen.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
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
                        <li class="breadcrumb-item active">SubCategory</li>
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
                <?php
                    if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-success mt-3" role="alert">' . $_SESSION['status'] . '</div>';
                        unset($_SESSION['status']);
                    }
                ?>
                    <div class="card-header">
                        Sub Category
                        <a href="addsubcategory.php" class="btn btn-success btn-sm float-right">Add New SubCategory</a>
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
                                $query= "SELECT * FROM subcategory";
                                $query_run= mysqli_query($con,$query);
                                $serialNumber = 1;
                                if(mysqli_num_rows($query_run) >0){
                                    while ($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $serialNumber++; ?></td>
                                    <td><?php echo $row['subcategory_name']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i>
                                        </a>
                                        <a href="subcategory.php?delete_user_id=<?php echo $row['category_id'];?>"
                                            onclick="return confirm('Are you sure you want to delete this category?')"><i
                                                class="fas fa-trash-alt fs-5 btn btn-danger btn-sm"></i></a>
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