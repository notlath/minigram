<?php
$hostname="localhost"; 	
$username="root"; 		
$password=""; 		
$dbname="insta"; 		
$connect=mysqli_connect($hostname,$username,$password,$dbname) or die("Error Connecting ".  mysqli_connect_error());
?>
