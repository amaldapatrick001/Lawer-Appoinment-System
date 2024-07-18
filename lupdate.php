<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: llogin.php");
    exit();
}

$email = $_SESSION['email'];
	if(isset($_POST['UPDATE'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$phone = $_POST['phone'];
			$bar_number = $_POST['bar_number'];
			$specialization = $_POST['specialization'];
			$education = $_POST['education'];
			$experience = $_POST['experience'];
			$consultation_time = $_POST['consultation_time'];
			$location = $_POST['location'];
			$bio = $_POST['bio'];
			$Practicing_at = $_POST['Practicing_at'];
		
			$imagename = $_FILES["profile_picture"]["name"];
			$tempname = $_FILES["profile_picture"]["tmp_name"];
			if (!empty($_FILES["profile_picture"]["name"])) {
				move_uploaded_file($tempname, "imgs/$imagename");
			}
			
			$stmt = $con->prepare($sql);
			$stmt->bind_param('s', $bio);
			$result = $stmt->execute();
			$sql = "UPDATE `lawers` SET first_name = '$fname',last_name = '$lname',phone_number = '$phone',bar_number = '$bar_number',specialization = '$specialization',education = '$education',experience = '$experience',consultation_time = '$consultation_time',location = '$location',bio = '$bio',Practicing_at = '$Practicing_at',profile_picture='$imagename' WHERE email = '$email'";
			$result=$con->query($sql);
			if ($result) {
				echo "<script>
						alert('Lawyer profile updated successfully');
						window.location.href = 'lprofil.php';
					  </script>";
			} else {
				echo "<script>
						alert('ERROR');
						window.location.href = 'lprofil.php';
					  </script>";
			}
		}
			
			$con->close();
?>