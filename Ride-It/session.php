<?php
    include('config.php');
    session_start();
    $user_check=$_SESSION['login_user'];
    $ses_sql=mysqli_query($db,"select uid from users where uid='$user_check'");
?>