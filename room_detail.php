<?php
include("./common/header.php");
include("./database/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>
    <link rel="stylesheet" href="./styles/room_detail.css">
</head>
<body>

    
<div class="slider">
      <div class="slide">
<?php 
    global $con;

    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $get_room = "select * from rooms where room_id=$id";
	  	$result = mysqli_query($con,$get_room);

      if ($result && mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
          $pimage = $row['room_img1'];
          $roomtitle = $row['room_title'];
          $roomdsc = $row['room_desc'];
          $roomprice = $row['price'];
          $furnished = $row['furnished'];
          $water = $row['water'];
          $electricity = $row['electricity'];
          $contact = $row['contact'];
          $location = $row['location'];
          $nearestlandmark = $row['nearest_landmark'];
          echo"
          <img src='./image/".$pimage."' class='listImg' alt='Rooms Near Me'>
          <div class='caption'>First Image</div>
          </div>

          <div class='slide'>
          <img src='./image/".$pimage."' class='listImg' alt='Rooms Near Me' />
          <div class='caption'>Second Image</div>
          </div>

          <div class='slide'>
          <img src='./image/".$pimage."' class='listImg' alt='Rooms Near Me' />
          <div class='caption'>Third Image</div>
          </div>
          
          ";
          }
      }
    }
  ?>


      <!-- buttons -->
      <a class="prev">&#10094;</a>
      <a class="next">&#10095;</a>
    </div>
   
    


<div class="acr-listing-details">
        <div class="acr-listing-section">
          <div class="acr-listing-section-body">
            <div class="acr-listing-section-price">
              <span>For Rent</span>
              <h3>Rs.<?php echo $roomprice; ?></h3>
              <span>Est. Cost</span>
              <p>Rs.<?php echo $roomprice; ?>/MO</p>
            </div>
          </div>
        </div>
        <div class="acr-listing-section">
          <div class="acr-listing-section-body">
            <h1> <?php echo $roomtitle; ?> </h1>
            <div class="acr-listing-icons">
              <div class="acr-listing-icon">
                <i class="flaticon-bedroom"></i>
                <span>
                <?php 
                  if ($furnished==1 ){
                    echo"<img src='./images/chair.png' class='icons' alt='Rooms Near Me' />
                    
                    </span>
                    <span class='acr-listing-icon-value'>Furnished</span>
                    ";
                  } 
                ?>
              </div>
              <div class="acr-listing-icon">
                <i class="flaticon-bathroom"></i>
                <span>
                <?php 
                  if ($water==1 ){
                    echo"<img src='./images/water.png' class='icons' alt='Rooms Near Me' />
                    
                    </span>
                    <span class='acr-listing-icon-value'>Water</span>
                    ";
                  } 
                ?>
              </div>
              <div class="acr-listing-icon">
                <i class="flaticon-ruler"></i>
                <span>
                <?php 
                  if ($electricity==1 ){
                    echo"<img src='./images/electricity.png' class='icons' alt='Rooms Near Me' />
                    
                    </span>
                    <span class='acr-listing-icon-value'>Electricity</span>
                    ";
                  } 
                ?>
              </div>
            </div>
            <p>
            <?php echo $roomdsc; ?>
            </p>
          </div>
        </div>

        <div class="acr-listing-section">

          <div class="acr-listing-section-body">
            <div class="acr-listing-meta">
              <div class="row">
                <div class="col-lg-6 col-md-3 col-sm-3">
                  <div class="acr-listing-meta-item">
                    <span>Contact Number</span>
                    <p><?php echo $contact; ?></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-3">
                  <div class="acr-listing-meta-item">
                    <span>View</span>
                    <p><?php echo $location; ?></p>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

        </div>

      </div>



</body>
</html>
<?php
include("./common/footer.php");
?>

<script>
const images = document.querySelectorAll(".slide"),
  next = document.querySelector(".next"),
  prev = document.querySelector(".prev");

let current = 0;

function changeImage() {
  images.forEach(img => {
    img.classList.remove("show");
    img.style.display = "none";
  });

  images[current].classList.add("show");
  images[current].style.display = "block";
}

// Calling first time
changeImage();

next.addEventListener("click", function() {
  current++;

  if (current > images.length - 1) {
    current = 0;
  } else if (current < 0) {
    current = images.length - 1;
  }

  changeImage();
});
prev.addEventListener("click", function() {
  current--;

  if (current > images.length - 1) {
    current = 0;
  } else if (current < 0) {
    current = images.length - 1;
  }

  changeImage();
});

// Auto change in 5 seconds

setInterval(() => {
  next.click();
}, 5000);


</script>