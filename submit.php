<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $iden = $_POST['iden'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $cont = $_POST['cont'];
    $pincode = $_POST['pincode'];

	// Database connection
	$conn = new mysqli('localhost','root','','pdet');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user_info(fname, lname, iden, email, phone, age, area, city, cont, pincode) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiisssi", $fname, $lname, $iden, $email, $phone, $age, $area, $city, $cont, $pincode);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>
