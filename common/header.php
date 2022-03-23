<?php
include("./database/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Home | Room Listing Site</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./common/header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <!-- Laptop Menu -->
        <nav class="navbar">
            <div class="navbar-container container">
                <input type="checkbox" name="" id="">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>



                <a href="./index.php"><img src="./images/logo.png" class="logo"> </a>

                <ul class=" menu-items navLeft">
                    <li><a href=index.php>HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>

                </ul>
                <ul class="menu-items navRight">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $findUser = $_SESSION['user_id'];
                        global $con;
                        $get_user = "select * from users where user_id='$findUser'";
                        $result = mysqli_query($con, $get_user);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pimage = $row['image'];
                                $pname = $row['first_name'];
                            }
                        }
                        echo "
            <div class='profilenav'>
                <div>
                    <li><a href='./profile.php'><img src='./images/" . $pimage . "' class='proimg' alt='agent'></a>
                </div>
                ";

                        echo "
                <div class='profilename'>
                    <a href='./profile.php'>$pname</a></li>
                </div>
            </div>
        <div class='media-body'>
            ";
                    } else {
                        echo '<li><a href="./login.php">LOGIN</a></li>
            <li><a href="./signup.php">SIGN UP</a></li>
            <li><a href="./adminLogin.php">ADMIN</a></li>
            ';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <!-- Laptop Menu -->

        <!-- Mobile Menu -->
        <nav class="mobileNavbar">
            <div class="navbar-container container">
                <input type="checkbox" name="" id="">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>


                <div>
                    <a href="./index.php"><img src="./images/logo.png" class="logo"> </a>
                </div>
                <ul class=" menu-items">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $findUser = $_SESSION['user_id'];
                        global $con;
                        $get_user = "select * from users where user_id='$findUser'";
                        $result = mysqli_query($con, $get_user);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pimage = $row['image'];
                                $pname = $row['first_name'];
                                $lname = $row['last_name'];
                            }
                        }
                        echo "
                    <div class='profilenav'>
                        <div>
                            <li><a href='./profile.php'><img src='./images/" . $pimage . "' class='proimg' alt='agent'></a>
                        </div>
                        ";

                        echo "
                        <div class='profilename'>
                            <a href='./profile.php'>$pname $lname</a></li>
                        </div>
                    </div>
                    ";
                    } else {
                        echo '<li><a href="./login.php">LOGIN</a></li>
                    <li><a href="./signup.php">SIGN UP</a></li>
                    <li><a href="./adminLogin.php">ADMIN</a></li>';
                    }
                    ?>

                    <li><a href=index.php>HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>

                </ul>
            </div>
        </nav>
        <!-- Mobile Menu -->
    </header>
</body>

</html>