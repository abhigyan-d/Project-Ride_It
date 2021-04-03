<!DOCTYPE html>
<?php
    include("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $userid=mysqli_real_escape_string($db,$_POST['username']);
        $password=mysqli_real_escape_string($db,$_POST['password']);

        $query="SELECT uid FROM users WHERE uid='$userid' and Password='$password'";
        $result=mysqli_query($db,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active=$row['active'];

        $count=mysqli_num_rows($result);
        if($count==1)
        {
            session_register($userid);
            $_SESSION['login_user']=$userid;
            header("location: dashboard.php");
        }
        else
        {
            $error="INVALID CREDENTIALS";
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
        <form action="" method="post">
            <label>UserId:</label><input type="text" name="username" class="box"/><br /><br />
            <label>Password:</label><input type="password" name="password" class="box"/><br /><br />
            <input type="submit" value=" Submit "/><br />
        </form>
    </body>
</html>