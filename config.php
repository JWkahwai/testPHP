<?php
$servername ="staffdb.cpgv8rvwzl4n.us-east-1.rds.amazonaws.com";
$username ="aws_user";
$password ="Bait3273";
$dbname ="staffdb";
$custombucket = "kongkahwai-staffdb";
$customregion = "us-east-1";	

//Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
?>
