<?php
session_start();
    include('includes/header.php');
    if(isset($_SESSION['auth'])){
        $_SESSION['status']= "you are already logged in ";
        header('location:index.php');
        exit(0);
    }

?>
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-4">
                <div class="card my-5 p-4 bg-dark">
                <?php
                if(isset($_SESSION['auth_status']))
                {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy! </strong> <?php echo $_SESSION['auth_status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['auth_status']);
                }
                ?>
                    <div class="card-header ">
                        <h5>Log in Form</h5>
                    </div>
                    <div class="card-body">
                        
                        <form action="logincode.php" method="POST">
                            <div class="form-group">
                                <label for="">Email ID</label>
                                <input type="text" name="email" class="form-control" placeholder="Email Id" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group my-5">
                                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>