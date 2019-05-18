<?php
	$username= $_POST['user'];
	$password= $_POST['pass'];

	$conn=mysqli_connect('localhost', 'root', '', 'login');
	// mysql_select_db("login");

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);

	

	$result= mysqli_query($conn,"select * from users where username='$username' and password = '$password'")
		or die("Failed to query database" .mysqli_error());
	$row = mysqli_fetch_array($result);

	if ($row['username']== $username && $row['password']==$password) {
		echo "Login Successful Welcome" .$row['username'];
	}
	else 
	{
		echo "Failed to Login";
	}
	
?>