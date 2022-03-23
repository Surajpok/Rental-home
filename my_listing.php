<?php
include("./common/header.php");
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
    <title>My Profile</title>
</head>
<body>
<!-- Profile Page Start -->
  
    <div class="container">
      <div class="media">

        <?php
            $findUser = $_SESSION['user_id']; 
            global $con;
  
	        $get_user = "select * from users where user_id='$findUser'";
	        $result = mysqli_query($con,$get_user);

            if ($result && mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                $mail = $row['email'];
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $pimage = $row['image'];
                }
            }
        echo "
        <img src='images/".$pimage."' class='img' alt='agent'>
        <div class='media-body'>
        ";
        ?>
          <h3 class="username"><?php echo $fname.' '.$lname ?></h3>
          <div class="useremail"><?php echo $mail ?></div>
        </div>
        <a href="./submit_listing.php" class="btn">Submit Listing +</a>
      </div>
    </div>
  <!-- Profile Page End -->

  <div class="section">
    <div class="containerr">
      <div class="row">
        <div class="column1">
          <div class="sidebar">
            <ul class="usernav">
              <li> <a class="active" href="profile.php">Edit Profile</a> </li>
              <li> <a href="./submit_listing.php">Submit Listings</a> </li>
              <li> <a href="./my_listing.php">My Listings</a> </li>
              <li> <a class="logout" href="./logout.php"><i class="flaticon-shut-down-button"></i> Logout</a> </li>
            </ul>
          </div>
        </div>

        <div class="column2">
        <?php
        getMyPro();
        ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  include("./common/footer.php");
  ?>
</body>
</html>