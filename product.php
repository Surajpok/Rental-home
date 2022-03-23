
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/product.css">
</head>
<body>
      <div class="list">
        <?php
        getPro();
        ?>
      </div>
      <!--Pagination-Start-->
      <div class="pagi-div">
        <ul class="pagination">
          <?php
          $per_page=9;
          $get_rooms = "select * from rooms";
	        $results = mysqli_query($con,$get_rooms);
          $total_result = mysqli_num_rows($results);
          $total_page = ceil($total_result/$per_page);
          // echo "
          //   <li><a href='product.php?page=1'>First</a></li>
          // ";
          
          
        ?>
        </ul>
      </div>
</body>
</html>