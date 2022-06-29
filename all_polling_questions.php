<?php 
if(isset($_POST['pl_id'], $_POST['usr_num']))
{
	//$city = $_POST['location'];
	$pl_id = $_POST['pl_id'];
	$usr_num = $_POST['usr_num'];
include("db_config.php");
if($pl_id !='' && $usr_num != '')
{
	$result = mysqli_query($con,"SELECT DISTINCT news.id, news.* FROM news 
	LEFT JOIN poling_answers ON news.id = poling_answers.pl_id 
	where (news.type='Polling' OR news.type='Advertisements') 
	AND (poling_answers.pl_id <> '$pl_id' AND poling_answers.usr_num <> '$usr_num')
	AND ((news.reporter='0' OR news.status='posted') OR (news.user='1' AND news.approval_status='1'))");

	//print_r($result);
}
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) 
	{
	$rows[] = $r;
	}
	$response = array( 'status' => 'success', 'content' => $rows);	
	//print_r($response);
	print json_encode($response);
}
else 
{
	 $response = array(
     'status' => 'failed',
     'content' => 'Unavailable'
					   );	
	print json_encode($response);
}
?>