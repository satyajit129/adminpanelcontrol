<?php
session_start();
?>

<h2>
    home page for user
</h2>
<?php
if(isset($_SESSION['status']))
{
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}
?>