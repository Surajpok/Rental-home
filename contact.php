<?php
include("./common/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./styles/contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src ="./js/contactvalidate.js"></script>
</head>
<body>
 <h1>Contact US</h1>
<div class="container">  
   
<form name = "myForm" action="contact.php" method="post" enctype="multipart/form-data" onsubmit="return validate();">
                                        
    <label for="email">Email</label> 
    <input type="email" name="email" placeholder= " your email..."> 
    
    <label for="lname">Message</label>
    <textarea name="message" placeholder="Write something.." style="height:200px"></textarea>
    
    <button type="submit" name = "submit">Send</button>

  </form>
  </div>


 </body>


<?php


include("./common/footer.php");

?>