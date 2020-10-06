<?php
	include("includes/connection.php");

	include("functions.php");
	
	$id = $_GET['exhibition'];

	$check = "SELECT * FROM exhibition WHERE  $id = exhibition.ART_ID";

	$result = mysqli_query($conn, $check);

	if(mysqli_num_rows($result) == 0 ){

			$sql = "INSERT INTO exhibition SELECT * from art_work where $id = art_work.ART_ID";
			mysqli_query($conn, $sql);
			echo '<script type="text/javascript">location.href = "exhibition.php";</script>';
	
	}else{

			echo "already in exhibition.";

	}
?>