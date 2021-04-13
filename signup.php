<!DOCTYPE html>
<?php
    include("config.php");
    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['post_submit']))
    {
        $username=mysqli_real_escape_string($db,$_POST['post_username']);
        $password=mysqli_real_escape_string($db,$_POST['post_password']);
        $name=mysqli_real_escape_string($db,$_POST['post_name']);
        $email=mysqli_real_escape_string($db,$_POST['post_email']);
        $contact=mysqli_real_escape_string($db,$_POST['post_contact']);
        
        $query="INSERT INTO user VALUES ('$username','$name','$email','$password','$contact' )";
        if(mysqli_query($db,$query))
        {
            header("Location: login.php");
        }
        else
        {
            $error="INVALID CREDENTIALS";
            echo "Invalid Credentials";
        }
    }
?>
<html lang="en">
    <head>
        <title>
            Sign Up
        </title>
    </head>
    <body>
    <form action="signup.php" method="post">
            <label>Name:</label><input type="text" name="post_name" class="box"/><br /><br />
            <label>Email ID:</label><input type="text" name="post_email" class="box"/><br /><br />
            <label>UserName:</label><input type="text" name="post_username" class="box"/><br /><br />
            <label>Password:</label><input type="password" name="post_password" class="box"/><br /><br />
            <label>Confirm Password:</label><input type="password" name="post_cpassword" class="box"/><br /><br />
            <label>Contact Number:</label><input type="number" name="post_contact" class="box"/><br /><br >
            <input type="submit" value="Submit" name="post_submit"/><br />
        </form>
        <br />
        <a href="login.php">Login</a>
    </body>
</html>