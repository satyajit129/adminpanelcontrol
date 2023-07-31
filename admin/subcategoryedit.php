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
                        <li class="breadcrumb-item active">Edit - SubCategory</li>
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
                        Edit - SubCategory
                        <a href="subcategory.php" class="btn btn-success float-right btn-sm"><i
                                class="fa fa-backward m-1" aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form Action="code.php" method="POST">
                                    <?php
                                    if (isset($_GET['subcategory_id'])) {
                                        $subcategory_id = $_GET['subcategory_id'];
                                        $query = "SELECT * FROM `subcategory` WHERE subcategory_id='$subcategory_id' LIMIT 1 ";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                    ?>
                                    <form action="update_subcategory.php" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="subcategory_id"
                                                value="<?php echo $row['subcategory_id'] ?>">
                                            <label for="">Name</label>
                                            <input type="text" name="subcategory_name"
                                                value="<?php echo $row['subcategory_name'] ?>" class="form-control"
                                                id="" placeholder="Enter SubCategory Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_category_id">Parent Category</label>
                                            <select class="form-control" name="parent_category_id" id="" required>
                                                <option value="">Select a category</option>
                                                <?php
                                                    $categoryQuery = "SELECT category_id , category_name FROM category";
                                                    $result = mysqli_query($con, $categoryQuery);
                                                    while ($categoryRow = mysqli_fetch_assoc($result)) {
                                                        $categoryId = $categoryRow['category_id'];
                                                        $categoryName = $categoryRow['category_name'];
                                                        $selected = ($categoryId == $row['category_id']) ? 'selected' : '';
                                                        echo "<option value='$categoryId' $selected>$categoryName</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="updatesubcategory" class="btn btn-info">Update
                                                Category Name</button>
                                        </div>
                                    </form>
                                    <?php
                                    }
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