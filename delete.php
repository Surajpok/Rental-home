<?php
include("./database/connection.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $get_room = "delete from rooms where room_id=$id";
    mysqli_query($con,$get_room);
    echo'<script>
    alert("Room Deleted Successfully!");
   
    </script>';
}
?>