<?php
    include('authen.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>
<!-- wrapper containes  page content-->
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
        <div class="row " >
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        Edit - Registered Users
                        <a href="register.php" class="btn btn-success float-right btn-sm"><i class="fa fa-backward m-1"
                                aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form Action="code.php" method="POST">
                                    <div class="modal-body">

                                        <?php
                                        if(isset($_GET['user_id'])){
                                            $user_id    = $_GET['user_id'];
                                            $query      = "SELECT * FROM `users` WHERE id='$user_id' LIMIT 1 ";
                                            $query_run  = mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run) >0 ){
                                                foreach($query_run as $row){
                                                    ?>
                                                        <div class="form-group">
                                                            <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                                            <label for="">Name</label>
                                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id=""
                                                                placeholder="Enter Your Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" id=""
                                                                placeholder="Enter Your Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone number</label>
                                                            <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" id=""
                                                                placeholder="Enter Your Phone Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control" id=""
                                                                placeholder="Enter Your Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Give Role</label>
                                                            <select class="form-control" name="role_as" id="" required>
                                                                <option value="" disabled>SELEct</option>
                                                                <option value="0">User</option>
                                                                <option value="1">Admin</option>

                                                            </select>
                                                        </div>

                                                    <?php
                                                }
                                            }
                                            else{
                                                echo "No Record Found";
                                            }
                                        }
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="updateuser" class="btn btn-info">Update </button>
                                    </div>
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