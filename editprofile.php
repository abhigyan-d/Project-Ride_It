<!DOCTYPE html>
<?php
    include("session.php");
    $query="SELECT uid,name,password,contact FROM user where uid='".$_SESSION['login_user']."'";
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
    $username=$row['uid'];
    $password=$row['password'];
    $contact=$row['contact'];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_submit']))
    {   
        if($password != $_POST['post_password'])
        {
            echo "Invalid Password Changes not saved";
        }
        else
        {
            echo "Update successful. Please login again to see results";
            $editquery=sprintf('UPDATE user SET uid="%s",name="%s",contact="%s" WHERE uid="%s"',mysqli_real_escape_string($db,$_POST['post_username']),mysqli_real_escape_string($db,$_POST['post_name']),mysqli_real_escape_string($db,$_POST['post_contact']),$_SESSION['login_user']);
            if(mysqli_query($db,$editquery))
            {
                header("Location: logout.php");
            }
            else
            {
                echo "Edit failed";
            }
        }
    }
?>
<html lang="en">
    <head>
        <title>
            Edit Profile
        </title>
    </head>
    <body>
        <form action="editprofile.php" method="post">
            <label>Edit Name:</label><input type="text" name="post_name" value="<?php echo $name ?>" class="box"/><br /><br />
            <label>Edit UserName:</label><input type="text" name="post_username" value="<?php echo $username ?>" class="box"/><br /><br />
            <label>Edit Contact Number:</label><input type="number" name="post_contact" value="<?php echo $contact ?>" class="box"/><br /><br >
            <label>Confirm Password:</label><input type="password" name="post_password" class="box"/><br /><br />
            <input type="submit" value=" Submit " name="post_submit"/><br />
        </form>
        <br />
        <a href="logout.php">Logout</a>
    </body>
</html>