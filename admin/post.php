<?php
    include('authen.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>
<?php
if(isset($_GET['delete_post_id'])){
    $delete_id= $_GET['delete_post_id'];
    $delete_query= "DELETE FROM `post` WHERE post_id='$delete_id' ";
    $query_run= mysqli_query($con, $delete_query);
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
                                    <th>Category</th>                                    
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

                                    <?php
                                    $categoryId = $row['category_id'];
                                    $categoryQuery = "SELECT * FROM category WHERE category_id='$categoryId'";
                                    $runcategoryQuery = mysqli_query($con, $categoryQuery);
                                    if (mysqli_num_rows($runcategoryQuery) > 0) {
                                        $data = mysqli_fetch_assoc($runcategoryQuery);
                                        ?>
                                    <td><?php echo $data['category_name']; ?></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td colspan="7">Category Not Found</td>
                                        <?php
                                    }
                                    ?>
                                    
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['post_details']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>     
                                        <img src="images/<?php echo $row['tumb_img']; ?>" width="50px" height="50px" alt="Uploaded Image">
                                    </td>
                                    <td>
                                        <div class="d-flex " >
                                            <a href="#" class="m-1 ">
                                            <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i>
                                        </a>
                                        <a class="m-1 " href="post.php?delete_post_id=<?php echo $row['post_id']; ?>">
                                            <i class="fas fa-trash-alt fs-5 btn btn-danger btn-sm"></i>
                                        </a>
                                        </div>
                                        
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                else{
                                ?>
                                    <tr>
                                        <td colspan="7">No data Found</td>
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