<?php
    // include('authen.php');
    session_start();
    
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
                
                    <div class="card-header">
                        ADD POST
                        <a href="subcategory.php" class="btn btn-success float-right btn-sm"><i
                                class="fa fa-backward m-1" aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="code.php" method="POST">
                                    <div class="form-group">
                                        <label for="subcategory_name">POST Name</label>
                                        <input type="text" class="form-control" name="subcategory_name"
                                            id="subcategory_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_category_id">Category</label>
                                        <select class="form-control" name="parent_category_id" id=""
                                            required>
                                            <option value="">Select a category</option>
                                            <?php 
                                                $categoryQuery = "SELECT category_id , category_name FROM category";
                                                $result = mysqli_query($con, $categoryQuery);
                                                while ($row = mysqli_fetch_assoc($result)){
                                                $categoryId = $row['category_id'];
                                                $categoryName = $row['category_name'];
                                                echo "<option value='$categoryId'>$categoryName</option>";
                                                } 
                                            ?>     
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="parent_category_id">SubCategory</label>
                                    <select class="form-control" name="parent_subcategory_id" id="" required>
                                    <option value="">Select a SubCategory</option>
                                        <?php
                                            $categoryQuery = "SELECT category_id , category_name FROM category";
                                            $result = mysqli_query($con, $categoryQuery);
                                            while ($row = mysqli_fetch_assoc($result)){
                                            $categoryId = $row['category_id'];
                                            $categoryName = $row['category_name'];
                                            $subcategoryQuery = "SELECT subcategory_id, subcategory_name FROM subcategory WHERE category_id = $categoryId";
                                            $result = mysqli_query($con, $subcategoryQuery);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $subcategoryId = $row['subcategory_id'];
                                                $subcategoryName = $row['subcategory_name'];
                                                echo "<option value='$subcategoryId'>$subcategoryName</option>";
                                            }
                                        }
                                            
                                        ?>
                                    </select>
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