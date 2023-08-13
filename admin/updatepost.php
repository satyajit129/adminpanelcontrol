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
                        <li class="breadcrumb-item active">Edit - Tag</li>
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
                        Edit - POST
                        <a href="post.php" class="btn btn-success float-right btn-sm"><i class="fa fa-backward m-1"
                                aria-hidden="true"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">                               
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                    if (isset($_GET['post_id'])) {
                                        $post_id = $_GET['post_id'];
                                        $query = "SELECT * FROM `post` WHERE post_id='$post_id' LIMIT 1 ";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {

                                    ?>
                                    <div class="form-group">
                                    <input type="hidden" name="post_id" value="<?php echo $row['post_id'] ?>">
                                        <label for="subcategory_name">POST Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>"
                                            id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_category_id">Category</label>
                                        <select class="form-control" name="parent_category_id" id="category-dropdown-post"
                                            required>
                                            <option value="" selected disabled >Select a category</option>
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
                                    <label for="parent_category_id" >SubCategory</label>
                                    <select class="form-control" name="parent_subcategory_id" id="sub-category-dropdown-post" required>
                                        <option value="" selected disabled >Select a category</option>
                                        <?php
                                            $subcategoryQuery = "SELECT * FROM subcategory WHERE category_id = " . $row['category_id'];
                                            $subcategoryResult = mysqli_query($con, $subcategoryQuery);
                                            while ($subcategoryRow = mysqli_fetch_assoc($subcategoryResult)) {
                                                $subcategory_id = $subcategoryRow['subcategory_id'];
                                                $subcategory_name = $subcategoryRow['subcategory_name'];
                                                $selectedSubcategory = ($subcategory_id == $row['subcategory_id']) ? 'selected' : '';
                                                echo "<option value='$subcategory_id' $selectedSubcategory>$subcategory_name</option>";
                                            }
                                        ?>

                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">POst Discription </label>
                                        <textarea name="description" id="summernote" class="form-control"  rows="4" required><?php echo $row['post_details'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Add Tag</label>
                                        <select name="post_tag[]" class="js-example-basic-multiple form-control" multiple="multiple" required >
                                        <?php
                                            $tagsQuery = "SELECT * FROM tag WHERE post_id='$post_id' ";
                                            $tagsResult = mysqli_query($con, $tagsQuery);
                                            
                                            while ($tagRow = mysqli_fetch_assoc($tagsResult)) {
                                                $tag_id = $tagRow['tag_id'];
                                                $tag_name = $tagRow['tag_name'];
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
                                    .select2-container--default .select2-dropdown .select2-search__field:focus, .select2-container--default .select2-search--inline .select2-search__field:focus {
                                        outline: 0;
                                        border: none;
                                    }
                                    </style>
                                    <div class="form-group">
                                        <label for="">Post IMG </label>
                                        <input type="file" class="form-control" name="post_img"
                                            id="" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addpost" class="btn btn-info">ADD POST </button>
                                    </div>
                                    <?php
                                            }
                                        }else {
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