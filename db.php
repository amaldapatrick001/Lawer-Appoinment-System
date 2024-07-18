<?php
    $con=new mysqli("localhost","root","","las");
    if($con->connect_error){
        die ("Connection failed".$con->connect_error);
    }
?>