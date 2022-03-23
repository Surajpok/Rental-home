<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text

  	// image file directory
  	$target = "image/".basename($image);

  	$sql = "INSERT INTO image (image) VALUES ('$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		//echo "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM image");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
</head>
<body>
<div id="content">
  
  <form method="POST" action="image.php" enctype="multipart/form-data">
  	
  	<div>
  	  <input type="file" name="image">	
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>