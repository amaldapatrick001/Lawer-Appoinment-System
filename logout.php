<?php
    session_start(); 
    session_destroy(); 
    header("location:homes.php"); 
exit();
?>