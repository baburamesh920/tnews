 <?php
session_start();
include_once("db_config.php");
$i=1;
$data=array();
if($_REQUEST['locid']) 
{
		$sql=mysqli_query($con,"SELECT id, usr_num, usr_name FROM poling_answers WHERE location='".$_REQUEST['locid']."'");
		while($row=mysqli_fetch_assoc($sql))
		{ 
				$nesteddata['id']=$i;
				$nesteddata['user_name']=$row['usr_name'];
				$nesteddata['user_number']=$row['usr_num'];
				$data[]=$nesteddata;
				$i++;
		}
$json_data=array("data"=>$data);
echo json_encode($json_data);
} 
else 
{
	$json_data=array("data"=>$data);
	echo json_encode($json_data);
}


?>
