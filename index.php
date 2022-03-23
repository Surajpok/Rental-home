<?php
include("./common/header.php");
require("./database/connection.php");

function getPro(){
	
	global $con;
	
	if (isset($_POST['submit'])){
		$Flocation= $_POST['flocation'];
		$Initialprice= $_POST['initial_price'];
		$Finalprice= $_POST['final_price'];
		

		$get_room = "select * from rooms WHERE location = '$Flocation' AND price BETWEEN '$Initialprice' AND '$Finalprice' order by 1 DESC "; //LIMIT 0,9

		$result = mysqli_query($con,$get_room);

		if ($result && mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['room_id'];
				// $cat_id = $row['r_cat_id'];
				$user_id = $row['user_id'];
				$date = $row['date'];
				$title = $row['room_title'];
				$img = $row['room_img1'];
				$img1 = $row['room_img2'];
				$img2 = $row['room_img3'];
				$price = $row['price'];
				$discription = $row['room_desc'];
				$location = $row['location'];
				$landmark = $row['nearest_landmark'];
				$province = $row['province'];
				$no_of_rooms = $row['no_of_rooms'];
				$furnished = $row['furnished'];
				$water = $row['water'];
				$electricity = $row['electricity'];
				// $aircondition= $row['aircondition'];
			
				echo "
					<div class='listing'>
						<div class='listingImage'>
							<a href='./room_detail.php?id=$id'>
								<img src='image/".$row['room_img1']."' class='listImg' alt='Rooms Near Me'>
							</a>
						</div>

						<div class='listingBody'>
							<h6 class='listingTitle'> <a href='./index.php?id=$id'>$title</a> </h6>
							<span class='listingPrice'> Rs. $price</span>/month
						</div>
						<div class='listingBody2'>
							<p>$date</p>
							<a class='btn' href='./room_detail.php?id=$id'>Details</a>
						</div>
  					</div>
				";
			}
		}else{
		echo "Nothing To Show";
		}
	}else{
		$get_room = "select * from rooms order by 1 DESC";
		$result = mysqli_query($con,$get_room);

		if ($result && mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['room_id'];
				// $cat_id = $row['r_cat_id'];
				$user_id = $row['user_id'];
				$date = $row['date'];
				$title = $row['room_title'];
				$img = $row['room_img1'];
				$img1 = $row['room_img2'];
				$img2 = $row['room_img3'];
				$price = $row['price'];
				$discription = $row['room_desc'];
				$location = $row['location'];
				$landmark = $row['nearest_landmark'];
				$province = $row['province'];
				$no_of_rooms = $row['no_of_rooms'];
				$furnished = $row['furnished'];
				$water = $row['water'];
				$electricity = $row['electricity'];
				// $aircondition= $row['aircondition'];
			
				echo "
					<div class='listing'>
						<div class='listingImage'>
							<a href='./room_detail.php?id=$id'>
								<img src='image/".$img."' class='listImg' alt='Rooms Near Me'>
							</a>
						</div>

						<div class='listingBody'>
							<h6 class='listingTitle'> <a href='./index.php?id=$id'>$title</a> </h6>
							<span> Rs. $price</spanz	>
						</div>
						<div class='listingBody2'>
							<p class='listingPrice'>Rs. $price<span>/MO</span></p>
							<a class='btn' href='./room_detail.php?id=$id'>Details</a>
						</div>
  					</div>
				";
			}
		}
	}
	
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Rental House | Best Site To Find Rooms & Flats</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="main1">
        <h1 class="title">Find <span class="titlecolor">Perfect</span> Place <br>To Live Life.</h1>
        <p class="subtitle">Book Rooms, Flats & Rental Property That Suits Your Personality And Profession.
        </p>
    </div>

    <div class="form">
        <form method="post">
			
			<div class="formSelect">
					<!-- <label class = "label">Location</label> -->
					<select class="select2" name="flocation">
					<option selected value="*">Location</option>
					<option value="Kathmandu">Kathmandu</option>
					<option value="Biratnagar">Biratnagar</option>
					<option value="Pokhara">Pokhara</option>
					</select>
			</div>

			<div class="formSelect">
					<select class="select2" name="fstatus">
					<option selected value="*">Status</option>
					<option value="For Rent">For Rent</option>
					<option value="For Sale">For Sale</option>
					</select>
			</div>

			<div class="formSelect">
                <!-- <label class = "label">Price Range </label> -->
				<input type = "number" class="select2" placeholder= "From" name ="initial_price" style="width: 60px">
				<input type = "number" class="select2" placeholder= "To" name ="final_price"style="width: 60px">
            </div>

            <div class="formSelect">
                <button type="submit" class="bttn" name="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<h2>Recent Listing</h2>

<!--place for product-->
<?php
include("product.php");

?>
<?php
include("./common/footer.php");
?>
</body>
</html>