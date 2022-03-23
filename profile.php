<?php
include("./common/header.php");
include("./database/connection.php");
include("./functions/functions.php");
?>
<?php


if(isset($_POST['submit']))
	{
    $findUser = $_SESSION['user_id']; 
		//something was posted
		$fistName = $_POST['fn'];
		$latName = $_POST['ln'];
		$mal = $_POST['ea'];
		$nuber = $_POST['pn'];
		$adressOne = $_POST['ao'];
		$adressTwo = $_POST['at'];
		$usr_name = $_POST['un'];

		if(!empty($fistName) &&!empty($latName) &&!empty($mal) &&!empty($nuber) &&!empty($adressOne) &&!empty($adressTwo) &&!empty($usr_name) && !is_numeric($usr_name))
		{

			//save to database
			$query = "update users set user_name='$usr_name',first_name='$fistName', last_name='$latName', email='$mal',phone_num='$nuber',address1='$adressOne',address2='$adressTwo' where user_id='$findUser'";

			mysqli_query($con, $query);

      unset($_SESSION['user_id']);
	    session_destroy();
      header("Location: login.php");
			die;
		}else
		{
			echo " Please Fill All Details";
		}
	}

  //password reset code
   if(isset($_POST['submitpw'])){
      $findUser = $_SESSION['user_id']; 
      $pasword = $_POST['pw'];
      $rpssword = $_POST['rpw'];

      $query = "UPDATE `users` set `password`='$pasword' where `user_id`='$findUser'";
      mysqli_query($con, $query);
      unset($_SESSION['user_id']);
	    session_destroy();
      header("Location: login.php");
			die;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/profile.css">
    <title>My Profile</title>
</head>
<body>
<!-- Profile Page Start -->
  
    <div class="container">
      <div class="media">
      <?php
      //ya xa img code
        
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

          <div class="wlcmmsg">
            <h3>Welcome <?php echo $fname.' '.$lname ?></h3>
          </div>

          <form method="post">
            <div class="row">

              <div class="col1 formelement">
                <label>First Name</label>
                <input type="text" class="form-control" name="fn" placeholder="First Name">
              </div>
              <div class="col1 formelement">
                <label>Last Name</label>
                <input type="text" class="form-control" name="ln" placeholder="Last Name">
              </div>
              <div class="col1 formelement">
                <label>Username</label>
                <input type="text" class="form-control" name="un" placeholder="Your Username">
              </div>
              <div class="col1 formelement">
                <label>Email Address</label>
                <input type="email" class="form-control" name="ea" placeholder="Yourmail@gmail.com">
              </div>
              <div class="col1 formelement">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="pn" placeholder="+977 **********">
              </div>
              <div class="col1 formelement">
                <label>Address One</label>
                <input type="text" class="form-control" name="ao" placeholder="Address Line One">
              </div>
              <div class="col1 formelement">
                <label>Address Two</label>
                <input type="text" class="form-control" name="at" placeholder="Address Line Two">
              </div>
            </div>
            <button type="submit" name="submit" class="btn btnsub">Save Changes</button>
          </form>
          <hr>

          <div class="wlcmmsg">
            <h3>Security</h3>
          </div>

          <form method="post">
            <div class="row">
              <div class="col1 formelement">
                <label>Password</label>
                <input type="password" class="form-control" name="pw" placeholder="Password" value="">
              </div>
              <div class="col1 formelement">
                <label>Repeat Password</label>
                <input type="password" class="form-control" name="rpw" placeholder="Repeat Password" value="">
              </div>
            </div>
            <button type="submit" name="submitpw" class="btn btnsub">Save Changes</button>

          </form>

        </div>

      </div>
    </div>
  </div>
  <?php
  include("./common/footer.php");
  ?>
</body>
</html>