<?php
    include('authen.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>

<?php
    if(isset($_GET['delete_user_id'])){
        $delete_id= $_GET['delete_user_id'];

        $delete_query= "DELETE FROM users WHERE id='$delete_id' ";
        $query      = mysqli_query($con, $delete_query);
        if($query == TRUE){

            $_SESSION['status']="User Delete Successfully";
            // header('location: register.php');
        }
        else{
            $_SESSION['status']="User Deletion Failed ";
        }
}
?>


<div class="content-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="addusermodel" tabindex="-1" aria-labelledby="addusermodel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-10 text-uppercase" id="exampleModalLabel">Sign Up</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form Action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Your Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Enter Your Email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone number</label>
                            <input type="text" name="phone" class="form-control" id=""
                                placeholder="Enter Your Phone Number" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" id=""
                                        placeholder="Enter Your Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="confirmpassword" class="form-control" id=""
                                        placeholder="Confirm Your Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="adduser" class="btn btn-primary">Save </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
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
                        <li class="breadcrumb-item active">Registered Users</li>
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
                <?php 
                    if (isset($_SESSION['status'])) {
                        echo "<h4>" . $_SESSION['status'] . "</h4>";
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        Registered Users
                        <a href="#" class="btn btn-success btn-sm float-right" data-bs-toggle="modal"
                            data-bs-target="#addusermodel">Add User</a>
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
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query= "SELECT * FROM users";
                                $query_run= mysqli_query($con,$query);
                                $serialNumber = 1;
                                if(mysqli_num_rows($query_run) >0){
                                    while ($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>

                                    <td><?php echo $serialNumber++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td>
                                        <?php
                                        if($row['role_as'] == 0){
                                            echo "User";
                                        }
                                        else{
                                            echo" Admin";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="register-edit.php?user_id=<?php echo $row['id'];?>">
                                        <i class="fas fa-edit fs-5 btn btn-info btn-sm"></i></a>
                                        <a href="register.php?delete_user_id=<?php echo $row['id'];?>">
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