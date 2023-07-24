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
                        <li class="breadcrumb-item active">Edit - Registered Users</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        Edit - Category
                        <a href="category.php" class="btn btn-success float-right btn-sm"><i class="fa fa-backward m-1"
                                aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form Action="code.php" method="POST">
                                    <?php
                                        if(isset($_GET['category_id'])){
                                            $category_id    = $_GET['category_id'];
                                            $query      = "SELECT * FROM `category` WHERE category_id='$category_id' LIMIT 1 ";
                                            $query_run  = mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run) >0 ){
                                                foreach($query_run as $row){
                                                ?>
                                                <div class="form-group">
                                                    <input type="hidden" name="category_id" value="<?php echo $row['category_id'] ?>">
                                                    <label for="">Name</label>
                                                    <input type="text" name="category_name" value="<?php echo $row['category_name'] ?>"
                                                        class="form-control" id="" placeholder="Enter Category Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="updatecategory" class="btn btn-info">Update Category Name</button>
                                                </div>

                                                <?php
                                                }
                                            }
                                            else{
                                                echo "No Record Found";
                                            }
                                        }                                                   
                                    ?>
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