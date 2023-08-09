<?php
    include('authen.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>
<!-- delete tag code start here  -->
<?php
if (isset($_GET['delete_user_id'])) {
    $delete_id = $_GET['delete_user_id'];
    
    // search for $delete_id to execute SQL operation
    
    $delete_query = "DELETE FROM tag WHERE tag_id = '$delete_id'";
    $query = mysqli_query($con, $delete_query);
    
    if ($query === TRUE) {
        $_SESSION['auth_status'] = "Tag deleted successfully";
        // header('location: register.php');
    } else {
        $_SESSION['auth_status'] = "Tag deletion failed";
    }
}
?>
<!-- delete tag code end here  -->
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
                        <li class="breadcrumb-item active">Tag</li>
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
                            <label for="addcategory">Add Tag:</label>
                            <input type="text" id="" name="addtag" required>
                            <button type="submit" class="btn btn-success rounded-circle">
                                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            </button>
                        </form>
                        <!-- </a> -->
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
                                    <th class="sl">Serial Number</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query= "SELECT * FROM tag";
                                $query_run= mysqli_query($con,$query);
                                $serialNumber = 1;
                                if(mysqli_num_rows($query_run) >0){
                                    while ($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $serialNumber++; ?></td>
                                    <td><?php echo $row['tag_name']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a href="tagedit.php?tag_id=<?php echo $row['tag_id'];?>">
                                            <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i>
                                        </a>
                                        <a href="tag.php?delete_user_id=<?php echo $row['tag_id'];?>" onclick="return confirm('Are you sure you want to delete this category?')"><i class="fas fa-trash-alt fs-5 btn btn-danger btn-sm"></i></a>
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
</div>
<?php
    include('includes/footer.php');
?>