<?php
    session_start();
    if(session_destroy())
    {
        header("Loaction:login.php");
    }
?>