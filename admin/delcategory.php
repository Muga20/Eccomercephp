<?php
	session_start();
	require_once '../config/connect.php';
	// if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	// 	header('location: login.php');
	// }

    if(isset($_GET) & !empty($_GET)){ //if is set to get and not empty
		$id = $_GET['id']; //get the id 
		$sql = "DELETE FROM category WHERE id='$id'"; //delete from  category where id = id 
		if(mysqli_query($connection, $sql)){ 
			header('location:categories.php');
		}
	}else{
		header('location: categories.php');
	}
?>