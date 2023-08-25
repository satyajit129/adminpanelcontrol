<?php
include('authen.php');
// session_start();

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
                        ADD Banner
                        <a href="banner.php" class="btn btn-success float-right btn-sm"><i class="fa fa-backward m-1"
                                aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="code.php" method="POST">
                                    <div class="form-group">
                                        <label>Banner Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Paragraph </label>
                                        <textarea name="paragraph" id="summernote" class="form-control" rows="4"
                                            required></textarea>
                                    </div>
                                    <button type="submit" name="bannercreate" class="btn btn-success mt-2 w-100">Add Banner</button>
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