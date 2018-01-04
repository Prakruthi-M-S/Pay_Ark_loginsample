<html>
	<head>
		<title>Registration</title>
	</head>
	<body>
		<h2>Register here</h2>
		<a href ="index.php"> Click here to go back</a><br/><br/>
		<form action ="register.php" method="POST">
			Enter Username: <input type = "text" name = "username" required = "required"/><br/>
			Enter Password: <input type = "password" name = "password" required = "required"/><br/>
			<input type = "submit" value = "Register"/>
		</form>
	</body>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$Username = mysql_real_escape_string($_POST['Username']);
		$Password = mysql_real_escape_string($_POST['Password']);
		
		echo "Username entered is:" . $Username . "<br/>";
		echo "Password entered is:" . $Password ;
		$bool = true;
		
		mysql_connect("localhost", "root","") or die(mysql_error()); //server
		mysql_select_db("first_db") or die("Cannot connect to database"); //database
		$query = mysql_query("Select * from users"); 
		while ($row = mysql_fetch_array($query)) 
		{
			$table_users = $row['username'];
			if($username == $table_users)
			{
				$bool = false;
				Print '<script>alert("Username has been taken");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}
		
		if ($bool)
		{
			mysql_query("INSERT INTO users (Username, Password) VALUES ('$username', '$password')");
			Print '<script>alert<"Registered Successfully");</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}	
	}
?>
