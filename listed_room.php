<?php
include("./functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/profile.css">
    <link rel="stylesheet" href="./styles/my_listing.css">
    <title>Admin Area</title>
</head>
<body>
  <center><h1>Admin Area</h1></center>
  <div class="section">
    <div class="containerr">
      <div class="row">
        <div class="column1">
          <div class="sidebar">
            <ul class="usernav">
              <!-- <li> <a class="active" href="pending_rooms.php">Pending Rooms</a> </li> -->
              <li> <a href="./listed_room.php">Listed Rooms</a> </li>
              <li> <a class="logout" href="./logout.php"><i class="flaticon-shut-down-button"></i> Logout</a> </li>
            </ul>
          </div>
        </div>
        <div class="column2">
          <!-- this is where products details comes to admin -->
        <?php
        function getMyProduct(){
          global $con;
          $get_room = "select * from rooms order by 1 DESC";
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
        return getMyProduct();
        ?>
        </div>
      </div>
    </div>
  </div>

</body>
</html>