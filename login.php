<!DOCTYPE html>
<?php
    include("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_submit']))
    {
        $userid=mysqli_real_escape_string($db,$_POST['post_username']);
        $password=mysqli_real_escape_string($db,$_POST['post_password']);

        $query="SELECT uid FROM user WHERE uid='$userid' and password='$password'";
        $result=mysqli_query($db,$query);
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            $_SESSION['login_user']=$userid;
            header("Location: dashboard.php");
        }
        else
        {
            $error="INVALID CREDENTIALS";
            echo "Invalid Login";
        }
    }
?>

<html lang="en">
    <head>
        <title>
            User Login
        </title>
    </head>
    <body>
        <form action="login.php" method="post">
            <label>UserName:</label><input type="text" name="post_username" class="box"/><br /><br />
            <label>Password:</label><input type="password" name="post_password" class="box"/><br /><br />
            <input type="submit" value=" Submit " name="post_submit"/><br />
        </form>
        <br />
        <a href="logout.php">Logout</a>
        <a href="signup.php">Sign Up</a>
    </body>
</html>