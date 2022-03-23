<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project_db";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
	echo"not connected";
}
?>