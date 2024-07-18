<?php
include "db.php";

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bar_number = $_POST['bar_number'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    if($password!=$con_password){
        echo '<script>alert("Password should be similar")</script>';
        echo "<script>window.open('registration.html','_self')</script>";
        }
    $sql = "INSERT INTO `lawers`(`first_name`, `last_name`, `email`, `phone_number`, `bar_number`, `password`) VALUES ('$fname','$lname','$email','$phone','$bar_number','$password')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('You have been Registered Successfully')</script>";
    
        echo "<script>window.open('llogin.php','_self')</script>";
    }
    
    }
    ?>
    
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ee1af068c0.js"></script>
</head>
<body> <header>
        <img src="logo.jpg" width="10%" height="20%">
        <ul class="nav">
            <li><a href="lprofil.php">Profile</a></li>
            <li><a href="labout.php">About</a></li>
            <li><a href="lmessage.php">Messages</a></li>
            <li><a href="lappoinment.php">Appointments</a></li>
            <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
        </ul>
    </header>

    <div class="container">
        <h1>Lawyer Registration</h1>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <input type="text" placeholder="First Name" name="fname" required>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Last Name" name="lname" required>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="E-mail" name="email" required>
                </div>
                <div class="input-box">
                    <input type="number" placeholder="Phone Number" name="phone" required>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Bar Association Registration Number" name="bar_number" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confirm Password" name="con_password" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register" name="submit">
            </div>

            <div class="sign_up">If you already have an account? <a href="llogin.php">LOG IN</a></div>
            <div class="sign_up">Back to <a href="homes.php">HOME</a></div>
        </form>
    </div>
</body>
</html>