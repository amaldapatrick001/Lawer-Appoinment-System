
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="#" method="post">
            <div class="input-box">
                <label class="details"></label>
                <input type="email" placeholder="Email id:" name="email" required>
            </div>
            <div class="input-box">
                <label class="details"></label>
                <input type="password" placeholder="Password:" name="password" required>
            </div>
            <input type="submit" value="Login" name="submit">
            <div class="sign_up">Don't have an account? <a href="lsignin.html">SIGN UP</a></div>
            <div class="sign_up">Back to <a href="homes.html">HOME</a></div>
        </form>
    </div>       
</body>
</html>
<?php
session_start();
require("db.php");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $adminEmail = "admin@gmail.com";
    $adminPassword = "Admin@123";

    if ($email == $adminEmail && $password == $adminPassword) {
        $_SESSION['email'] = $email;
        header('location: ahome.php'); 
    } else {
            echo "<script type='text/javascript'> alert('Your Email or Password is Wrong. Please try again.')</script>";
        }
    }

?>

