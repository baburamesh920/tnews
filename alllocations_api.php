<?php 

	
	include("db_config.php");
	$row = mysqli_query($con,"SELECT * FROM news_location ");
		$rows = array();
		while($r = mysqli_fetch_assoc($row)) {
			$rows[] = $r;
		}
	$response = array( 'status' => 'success', 'content' => $rows);	
		print json_encode($response);

?>