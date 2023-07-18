<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $email_search = "SELECT * FROM users WHERE email ='$email' LIMIT 1";
    $email_search_run = mysqli_query($con, $email_search);

    if(mysqli_num_rows($email_search_run) > 0) {
        $row = mysqli_fetch_assoc($email_search_run);
        $user_id = $row['id'];
        $user_name = $row['name'];
        $user_password = $row['password'];
        $user_email = $row['email'];
        $user_phone = $row['phone'];
        $role_as = $row['role_as'];


        // Verify the password
        if (password_verify($password, $user_password)) {
            $_SESSION['auth'] = "$role_as";
            $_SESSION['auth_user'] = [
                'user_id' => $user_id,
                'user_name' => $user_name,
                'user_email' => $user_email,
                'user_phone' => $user_phone,
            ];
            $_SESSION['status'] = "Logged In Successfully";
            header('location:index.php');
            exit(0);
        }
    }

    $_SESSION['status'] = "Invalid Email or Password";
        header('location:login.php');
    exit;
} 
else {
    $_SESSION['status'] = "Access Denied";
    header('location:login.php');
    exit;
}


?>