<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verification = $_POST['verification'];

	

	// Database connection
	$conn = new mysqli('localhost','root','','login');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(email, password,verification values(?, ?, ?)");
		$stmt->bind_param("ssissss", $email, $password, $verification);
		$execval = $stmt->execute();
		// echo $execval;
		echo "Login successful...";
		$stmt->close();
		$conn->close();
	}
?>