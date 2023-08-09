<?php
    session_start();
    include('config/dbcon.php');  




// update subcategory code start here
if(isset($_POST['updatesubcategory'])){
    $subcategory_id = $_POST['subcategory_id'];
    $new_subcategory_name = $_POST['subcategory_name'];
    $new_parent_category_id = $_POST['parent_category_id'];
    $update_query = "UPDATE `subcategory` SET `subcategory_name`='$new_subcategory_name', `category_id`='$new_parent_category_id' WHERE `subcategory_id`='$subcategory_id'";
    $update_result = mysqli_query($con, $update_query);

    if($update_result){
        $_SESSION['status']= "Subcategory Updated  successfully";
        header('location: subcategory.php');
    }
    else{
        $_SESSION['status']= "Subcategory Updating Failed";
        header('location: subcategory.php');
    }     
}
// update subcategory code end here



// add post code start here
if (isset($_POST['addpost'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $category_id = isset($_POST['parent_category_id']) ? $_POST['parent_category_id'] : null;
    $subcategory_id = isset($_POST['parent_subcategory_id']) ? $_POST['parent_subcategory_id'] : null;
    
    if (isset($_POST['post_tag']) && is_array($_POST['post_tag'])) {
        $selected_tags = $_POST['post_tag'];
    } else {
        $selected_tags = array(); // If no tags were selected, set an empty array
    }

    if (isset($_FILES['post_img']) && $_FILES['post_img']['error'] === UPLOAD_ERR_OK) {
        $post_img = $_FILES['post_img']['name'];
        $tempname = $_FILES['post_img']['tmp_name'];
        $updatelocation = "images/$post_img";

        if (move_uploaded_file($tempname, $updatelocation)) {
            // Prepare the SQL statement using a prepared statement
            $insertquery = "INSERT INTO `post`(`title`, `post_details`, `category_id`, `subcategory_id`, `tumb_img`) VALUES (?, ?, ?, ?, ?)";
            $query_run = mysqli_prepare($con, $insertquery);
        
            mysqli_stmt_bind_param($query_run, "ssiss", $title, $description, $category_id, $subcategory_id, $post_img);
        
            // Execute the prepared statement
            if (mysqli_stmt_execute($query_run)) {
                // Get the ID of the newly inserted post
                $post_id = mysqli_insert_id($con);
        
                // Insert the post-tag relationships into the `post_tags` table
                if (!empty($selected_tags)) {
                    // Prepare the SQL statement for inserting tags
                    $insert_tags_query = "INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES (?, ?)";
                    $insert_tags_stmt = mysqli_prepare($con, $insert_tags_query);
        
                    foreach ($selected_tags as $tag_id) {
                        mysqli_stmt_bind_param($insert_tags_stmt, "ii", $post_id, $tag_id);
                        mysqli_stmt_execute($insert_tags_stmt);
                    }
                }
        
                $_SESSION['status'] = "POST added successfully";
                header('location: post.php');
                exit();
            } else {
                $_SESSION['status'] = "Error: " . mysqli_stmt_error($query_run);
                header('location: post.php');
                exit();
            }
        } else {
            $_SESSION['status'] = "Error uploading the image.";
            header('location: post.php');
            exit();
        }
    }
}
// add post code end here






// logout code 
if(isset($_POST['logout_btn'])){

    $_SESSION['status']= " Logged out successfully";
    header('location: login.php');
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
}
// log out code end here




    
// user add code start here
    if(isset($_POST['adduser'])){
        $name       = mysqli_real_escape_string($con, $_POST['name']) ;        
        $phone      = mysqli_real_escape_string($con, $_POST['phone']) ;
        $email      = mysqli_real_escape_string($con, $_POST['email']) ;
        $password   = mysqli_real_escape_string($con, $_POST['password']) ; 
        $confirmpassword   = mysqli_real_escape_string($con, $_POST['confirmpassword']) ; 

        if($password == $confirmpassword){
            $pass       = password_hash($password, PASSWORD_BCRYPT);
            $emailquery = " SELECT * FROM users WHERE email= '$email' ";
            $query      = mysqli_query($con, $emailquery);
            $emailcount = mysqli_num_rows($query);
            if($emailcount>0){

                $_SESSION['status']=" This Email Already Exist";
                
                header('location: register.php');
                exit();
            }
            else{
                $insertquery    = "INSERT INTO users(name,email,phone,password) VALUES ('$name','$email','$phone','$pass')";
                $iquery         = mysqli_query($con, $insertquery);
                if($iquery){
                    $_SESSION['status']="user added successfully";
                    header('location: register.php');
                }
                else{
                    $_SESSION['status']="user Registration Failed";
                    header('location: register.php');
                }
            }
        }
        else{
            $_SESSION['status']="Password and Confirm Password Does not match";
            header('location: register.php');
        }
    }
// user add code end here 









// add category code
if (isset($_POST['addcategory'])) {
    $addcategory = isset($_POST['addcategory']) ? $_POST['addcategory'] : null;
    
    // Check if the category already exists or not
    $categoryquery = "SELECT * FROM category WHERE category_name = '$addcategory'";
    $categoryconnect = mysqli_query($con, $categoryquery);
    $categorycount = mysqli_num_rows($categoryconnect);
    
    if ($categorycount == 0) {
        // Category doesn't exist, so insert it into the database
        $insertquery = "INSERT INTO category (category_name) VALUES ('$addcategory')";
        $query = mysqli_query($con, $insertquery);

        if ($query) {
            $_SESSION['status'] = "Category added successfully";
            header('location: category.php');
            exit();
        } else {
            $_SESSION['status'] = "Category not added";
            header('location: category.php');
            exit();
        }
    } else {
        // Category already exists
        $_SESSION['status'] = "Category already exists";
        
        header('location: category.php');
        // exit();
    }
}

// end of add category code 








// add tag code

if (isset($_POST['addtag'])) {
    $addtag = isset($_POST['addtag']) ? $_POST['addtag'] : null;

    // Check if the tag already exists or not
    $tagquery = "SELECT * FROM tag WHERE tag_name = '$addtag'";
    $tagconnect = mysqli_query($con, $tagquery);
    $tagcount = mysqli_num_rows($tagconnect);

    if ($tagcount == 0) {
        // Tag doesn't exist, so insert it into the database
        $insertquery = "INSERT INTO tag (tag_name) VALUES ('$addtag')";
        $query = mysqli_query($con, $insertquery);

        if ($query) {
            $_SESSION['status'] = "Tag added successfully";
            header('location: tag.php');
            exit();
        } else {
            $_SESSION['status'] = "Tag not added";
            header('location: tag.php');
            exit();
        }
    } else {
        // Tag already exists
        $_SESSION['status'] = "Tag already exists";
        header('location: tag.php');
        exit();
    }
}

// end of add category code 










// user update information code 
if(isset($_POST['updateuser'])){
    $user_id    = $_POST['user_id'];
    $name       = mysqli_real_escape_string($con, $_POST['name']) ;
    $phone      = mysqli_real_escape_string($con, $_POST['phone']) ;
    $email      = mysqli_real_escape_string($con, $_POST['email']) ;        
    $password   = mysqli_real_escape_string($con, $_POST['password']) ; 
    $role_as   = mysqli_real_escape_string($con, $_POST['role_as']) ; 

    $query      = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password',role_as='$role_as' WHERE id= '$user_id' ";
    $query_run  = mysqli_query($con,$query);
    if($query_run){
        $_SESSION['status']= "User Updated  successfully";
        header('location: register.php');
    }
    else{
        $_SESSION['status']= "user Updating Failed";
        header('location: register.php');
    }
}
// end of user update information code










//  update category information  code start

if (isset($_POST['updatecategory'])) {
    $category_id = $_POST['category_id'];
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    $query = "UPDATE category SET category_name='$category_name' WHERE category_id='$category_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "Category Updated successfully";
        header('location: category.php');
    } else {
        $_SESSION['status'] = "Category Updating Failed";
        header('location: category.php');
    }
}
//  update category information  code end


//update tag code start here
if (isset($_POST['updatetag'])){
    $tag_id = $_POST['tag_id'];
    $tag_name = mysqli_real_escape_string($con, $_POST['tag_name']);
    $query = "UPDATE tag SET tag_name='$tag_name' WHERE tag_id='$tag_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "tag Updated successfully";
        header('location: tag.php');
    } else {
        $_SESSION['status'] = "tag Updating Failed";
        header('location: tag.php');
    }
}
// end of update tag code 










// add sub category code
    if(isset($_POST['addsubcategory'])){

        $subcategoryname = isset($_POST['subcategory_name']) ? $_POST['subcategory_name'] : null;
        $parentCategoryId = isset($_POST['parent_category_id']) ? $_POST['parent_category_id'] : null;

        $insertquery = "INSERT INTO subcategory (subcategory_name, category_id) VALUES (?,?)";
        $stmt = mysqli_prepare($con, $insertquery);
        mysqli_stmt_bind_param($stmt, 'si', $subcategoryname, $parentCategoryId);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['status'] = "Sub Category added successfully";
            header('location: subcategory.php');
        } else {
            $_SESSION['status'] = "Sub Category not added";
            header('location: subcategory.php');
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);

    }
// end of add subcategory code
?>