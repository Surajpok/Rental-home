<?php 
	include("./common/header.php");
	include("./database/connection.php");
	include("./functions/functions.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$mail = $_POST['mail'];
		$number = $_POST['num'];
		$addressOne = $_POST['addone'];
		$addressTwo = $_POST['addtwo'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		// $image = $_POST['imag'];

		  $msg = "";


 
  	// Get image name
  	$image = $_FILES['imag']['name'];
  	// Get text

  	// $image_text = mysqli_real_escape_string($con, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

		if(!empty($firstName) &&!empty($lastName) &&!empty($mail) &&!empty($number) &&!empty($addressOne) &&!empty($addressTwo) &&!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,first_name,last_name,email,phone_num,address1,address2,image) values ('$user_id','$user_name','$password','$firstName','$lastName','$mail','$number','$addressOne','$addressTwo','$image')";

			mysqli_query($con, $query);
			if (move_uploaded_file($_FILES['imag']['tmp_name'], $target)) {
					$msg = "Image uploaded successfully";
				}else{
					$msg = "Failed to upload image";
				}


			header("Location: login.php");
			die;
		}else
		{
			echo " Not Inserted ";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="./styles/signup.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
	<script src ="./js/signupValidate.js"></script>

</head>
<body>
	<div id="box">
		<h1>Sign Up</h1>
		<div class="form">
			<form name = "myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
					
					<label>First Name</label>
					<input type="text" class="text" name="fname" placeholder="First Name">
				
				
					<label>Last Name</label>
					<input type="text" class="text" name="lname" placeholder="Last Name">
				
				
					<label>Email Address</label>
					<input type="email" class="text" name="mail" placeholder="Yourmail@gmail.com">
				
				
					<label>Phone Number</label>
					<input type="text" class="text" name="num" placeholder="+977 **********" >
				
				
					<label>Address One</label>
					<input type="text" class="text" name="addone" placeholder="Address Line One">
				
				
					<label>Address Two</label>
					<input type="text" class="text" name="addtwo" placeholder="Address Line Two">
				
					<level>Username:</label><br>
					<input class="text" type="text" name="user_name" placeholder="Username" ><br><br>

					<label>Password:</label><br>
					<input class="text" type="password" name="password" placeholder="Password" ><br><br>
					
					<label>Select Image</label>
                    <input type="file" id="img" name="imag" accept="image/*">

					<input id="button" type="submit" name="upload" value="Signup"><br><br>

				<div class="backto">
					<a href="./login.php">Click To Login</a>
					<a href="./index.php">Back To Home</a>
				</div>
			</form>
		</div>
	</div>
	<?php
		include("./common/footer.php");
	?>

</body>
</html>