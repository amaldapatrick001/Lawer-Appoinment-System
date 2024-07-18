<html>
    <head>
            <link rel="stylesheet" href="main.css">
            <link rel="stylesheet" href="style.css">
            
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
          </head>
          <body><header>
                  <img src="logo.jpg" width="10%" height="20%" >
                  <ul class="nav">
                             <li><a href="homes.php">Home</a></li>
                             <li><a href="about.php" >About</a></li>
                             <li><a href="lawer.php" >Lawers</a>
                            <li><a href="condact.php" >Contact us</a></li>
                             <li style="float:right"><a href="login.php" class="active">Login</a></li>
                       
                   </ul>
                  </header>

    <div class="container">
        <h1>Contact Us</h1><p>We'd love to hear from you! Please fill out the form below to solve queries and get in touch with us.</p>


        <form action="#" method="POST">
            <div class="input-box">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-box">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="message">Message:</label>
                <textarea name="message" rows="4" required></textarea>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>
<?php
include 'db.php'; // Assuming you have a file named 'db.php' for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Perform basic validation (you should enhance this based on your needs)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
    } else {
        // Insert data into the 'contacts' table
        $insertQuery = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

        if (mysqli_query($con, $insertQuery)) {
            echo "Message submitted successfully. We'll get in touch with you soon!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

$con->close();
?>
