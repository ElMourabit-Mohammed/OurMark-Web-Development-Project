<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $SERVICES = $_POST['SERVICES'];
	$POG = $_POST['POG'];
    $msg = $_POST['msg'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName,number,email,password,POG,msg) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssissss", $firstName, $lastName, $number, $email, $password, $POG, $msg);
		$execval = $stmt->execute();
		// echo $execval;
		echo "Data Sent...";
		$stmt->close();
		$conn->close();
	}
?>