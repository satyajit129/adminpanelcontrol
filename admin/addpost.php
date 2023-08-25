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
                            <div class="col-md-10">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="subcategory_name">POST Title</label>
                                        <input type="text" class="form-control" name="title" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_category_id">Category</label>
                                        <select class="form-control" name="parent_category_id" id="category-dropdown"
                                            required>
                                            <option value="" selected disabled>Select a category</option>
                                            <?php
                                            $categoryQuery = "SELECT category_id , category_name FROM category";
                                            $result = mysqli_query($con, $categoryQuery);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $categoryId = $row['category_id'];
                                                $categoryName = $row['category_name'];
                                                echo "<option value='$categoryId'>$categoryName</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="parent_category_id">SubCategory</label>
                                        <select class="form-control" name="parent_subcategory_id"
                                            id="sub-category-dropdown" required>
                                            <option value="" selected disabled>Select a category</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">POst Discription </label>
                                        <textarea name="description" id="summernote" class="form-control" rows="4"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Add Tag</label>
                                        <select name="post_tag[]" class="js-example-basic-multiple form-control"
                                            multiple="multiple" required>

                                            <?php
                                            $categoryQuery = "SELECT tag_id , tag_name FROM tag";
                                            $result = mysqli_query($con, $categoryQuery);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $tag_id = $row['tag_id'];
                                                $tag_name = $row['tag_name'];
                                                echo "<option value='$tag_id'>$tag_name</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <style>
                                        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
                                            cursor: default;
                                            padding-left: 2px;
                                            padding-right: 5px;
                                            color: black;
                                        }

                                        .select2-container--default .select2-dropdown .select2-search__field:focus,
                                        .select2-container--default .select2-search--inline .select2-search__field:focus {
                                            outline: 0;
                                            border: none;
                                        }
                                    </style>
                                    <div class="form-group">
                                        <label for="">Post IMG </label>
                                        <input type="file" class="form-control" name="post_img" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addpost" class="btn btn-info">ADD POST </button>
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