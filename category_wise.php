<?php 

	if(isset($_POST['category_type']) or isset($_POST['location']) or isset($_POST['language']))
{
	//var_dump($_POST);die;
	if(!isset($_POST['location'])){
		$city='';
	}
	else{
	$city = $_POST['location'];
	}
	
	if(!isset($_POST['language'])){
		$language='';
	}
	else{
	$language = $_POST['language'];
	}
	
	$catgry =$_POST['category_type'];
	 if ($_POST['category_type'] == "0573" and $language == NULL){

			$catgry =$_POST['category_type'];
			
			include("db_config.php");
			$row = mysqli_query($con,"SELECT * FROM news  where reporter='0' ORDER BY id DESC LIMIT 20 ");
				$rows = array();
				while($r = mysqli_fetch_assoc($row)) {
					$rows[] = $r;
				}
				$response = array( 'status' => 'success', 'content' => $rows);	
				print json_encode($response);

				

		}
		else if($_POST['category_type'] == "0573" and $language != ''){
			$catgry =$_POST['category_type'];
			$language=$_POST['language'];
			include("db_config.php");
			$row = mysqli_query($con,"SELECT * FROM news  where reporter='0' AND language='$language' ORDER BY id DESC LIMIT 20 ");
				$rows = array();
				while($r = mysqli_fetch_assoc($row)) {
					$rows[] = $r;
				}
				$response = array( 'status' => 'success', 'content' => $rows);	
				print json_encode($response);
			
		}
		else if (isset($city) and $catgry == NULL)
		{
				
				include("db_config.php");
		
				$row = mysqli_query($con,"SELECT * FROM news where reporter='0' and 
					location = '".$city."' ORDER BY id DESC LIMIT 20");
					$rows = array();
					while($r = mysqli_fetch_assoc($row)) {
						$rows[] = $r;
					}
					$response = array( 'status' => 'success', 'content' => $rows);	
					print json_encode($response);


		}	
				else if (isset($catgry) and $city == NULL)
		{
				
				include("db_config.php");
		
				$row = mysqli_query($con,"SELECT * FROM news where reporter='0' and 
					category_type = '".$catgry."' ORDER BY id DESC LIMIT 20");
					$rows = array();
					while($r = mysqli_fetch_assoc($row)) {
						$rows[] = $r;
					}
					$response = array( 'status' => 'success', 'content' => $rows);	
					print json_encode($response);

		}
			    else 
		{
				
				include("db_config.php");

				$row = mysqli_query($con,"SELECT * FROM news WHERE reporter='0' AND category_type = '$catgry' AND  location = '$city' ORDER BY id DESC LIMIT 20");
					$rows = array();
					while($r = mysqli_fetch_assoc($row)) {
						$rows[] = $r;
					}
					$response = array( 'status' => 'success', 'content' => $rows);	
					print json_encode($response);

		}
}

else {
	 $response = array(
                    'status' => 'failed',
                    'content' => 'Unavailable'
                    );	
	print json_encode($response);
}
?>