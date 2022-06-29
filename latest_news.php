<?php 

	if(isset($_POST['location']))
{
	//$category_type = $_POST['category_type'];
	$city = $_POST['location'];
	
	include("db_config.php");
	//$result = mysqli_query($con,"SELECT * FROM news where (location = $city OR location LIKE '$city,%' OR location LIKE '%,$city,%' OR location LIKE '%,$city') ORDER BY Id DESC LIMIT 15");
	if($city == ''){
	$result = mysqli_query($con," SELECT * FROM news where ((reporter='0' OR status='posted') OR (user='1' AND approval_status='1')) ORDER BY Id DESC LIMIT 15");
	}
	
    else if($city != ''){
	$result = mysqli_query($con,"SELECT * FROM news where (location = $city OR location LIKE '$city,%' OR location LIKE '%,$city,%' OR location LIKE '%,$city') AND ((reporter='0' OR status='posted') OR (user='1' AND approval_status='1')) ORDER BY Id DESC LIMIT 15");
	}
	
	
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
				
		}

		$response = array( 'status' => 'success', 'content' => $rows);	
		print json_encode($response);

			
}
else {
	 $response = array(
                    'status' => 'failed',
                    'content' => 'Unavailable'
                    );	
	print json_encode($response);
}


?>