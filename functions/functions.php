<?php
require("./database/connection.php");
function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		

		$text .= rand(0,9);
	}

	return $text;
}



function getMyPro(){
	$findUser = $_SESSION['user_id'];
	global $con;
	$get_room = "select * from rooms where user_id='$findUser' order by 1 DESC";
	$result = mysqli_query($con,$get_room);



		if ($result && mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['room_id'];
				// $cat_id = $row['r_cat_id'];
				$owner_id = $row['user_id'];
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
							<a href='./index.php?id=$id'>
								<img src='image/".$img."' class='listImg' alt='Rooms Near Me'>
							</a>
						</div>

						<div class='listingBody'>
							<h6 class='listingTitle'> <a href='./index.php?id=$id'>$title</a> </h6>
							<span class='listingPrice'> Rs. $price</span>/month
						</div>
						<div class='listingBody2'>
							<p>$date</p>
	
						</div>
						<div class='dltbtn'>
							<a class='btn' name='dlt' href='./delete.php?id=$id'>❌</a>

						</div>
  					</div>
				";
			}
		}else{
		echo "Nothing To Show";

}
}

?>