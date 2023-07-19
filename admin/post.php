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
                        <li class="breadcrumb-item active">Post</li>
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
                        POST
                        <a href="addpost.php" class="btn btn-success btn-sm float-right">Add NewPost</a>
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
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query= "SELECT * FROM post";
                                    $query_run= mysqli_query($con,$query);
                                    $serialNumber = 1;
                                    if(mysqli_num_rows($query_run) >0){
                                        while ($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $serialNumber++ ; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['details']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['tumb_img']; ?></td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i>
                                        </a>
                                        <a href="#">
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