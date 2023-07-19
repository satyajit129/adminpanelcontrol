<?php
    session_start();
    include('config/dbcon.php');  
// logout code 
if(isset($_POST['logout_btn'])){


    $_SESSION['status']= " Logged out successfully";
    header('location: login.php');
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    // exit(0);
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
    }

    // end of add category code 

// add tag code
    if (isset($_POST['addtag'])) {
        $addtag = isset($_POST['addtag']) ? $_POST['addtag'] : null;
    
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