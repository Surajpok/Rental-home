<?php 
include("./common/header.php");

	include("./database/connection.php");
	// include("./functions/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			
			$query = "select * from admin where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: listed_room.php");
						die;
					}
				}
			}
			
			echo "";
		}else
		{
			echo "";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Rental House Login</title>
	<link rel="stylesheet" href="./styles/login.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
	<script src= "./js/loginvalidate.js;"></script>
</head>
<body>

	<div id="box">
	<centre><h1 style>Admin Login</h1></centre>
		<div class="form">
		<form name = "myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
			<label>Username:</label><br>
			<input id="text" type="text" placeholder="Username" name="user_name" ><br><br>
			<label>Password:</label><br>
			<input id="text" type="password" placeholder="Password" name="password" ><br><br>

			<input id="button" type="submit" value="Login"><br><br>
			<div class="backto">
			<a href="signup.php">Click To Signup</a>
			<a href="./index.php">Back To Home</a></li>
			</div>
		</form>
</div>
	</div>
	<?php
		include("./common/footer.php");
	?>
</body>
</html>