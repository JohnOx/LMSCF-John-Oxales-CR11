<?php
	require_once '../crud/actions/dbconnect.php';

	$search = $_POST["search"];
	

	$sql = "SELECT * FROM animals WHERE Breed Like 'd%g$search'";

	$result = mysqli_query($con, $sql);

	if($result->num_rows == 0){
		echo "No result";
	}elseif($result->num_rows == 1){
		$row = $result->fetch_assoc();
		echo $row["animalName"];
	}else {
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $row) {
			echo $row["animalName"] . "<br>";
		}
	}

?>