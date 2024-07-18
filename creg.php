<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration </title>
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/ee1af068c0.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Registration</h1>
            <form action="#" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <input type="text" placeholder="First name" name = "fname" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Last name" name = "lname" required>
                    </div>
                    <div class="input-box">
                        <input type="email" placeholder="E-mail" name = "email" required>
                    </div>
                    <div class="input-box">
                        <input type="number" placeholder="Phone Number" name = "phone" required>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" name ="password" required>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Conform Password" name ="con_password" required>
                    </div>
                </div>
                
                <div class="button">
                    <input type="submit"  value="Register" name="submit">
                </div>
                
                <div class="sign_up">If you already  have an account? <a href="login.php">LOG IN</a></div>
                <div class="sign_up">Back to <a href="home.php">HOME</a>
            </form>
        </div>
    </body>
</html>


<?php
include "db.php";

if (isset($_POST['submit'])) { 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];

    if($password!=$con_password){
        echo '<script>alert("Password should be similar")</script>';
        echo "<script>window.open('registration.html','_self')</script>";
        }
    $sql = "INSERT INTO `clint`(`first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES ('$fname','$lname','$email','$phone','$password')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('You have been Registered Successfully')</script>";
    
        echo "<script>window.open('clogin.php','_self')</script>";
    }
    
    }
$con->close();
?>
