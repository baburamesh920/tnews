<?php

if(isset($_POST['ad_id']))
{
  
    include("db_config.php");
    
    $ad=mysqli_real_escape_string($con,$_POST['ad_id']);
    $usr=mysqli_real_escape_string($con,$_POST['usr_num']);
    
    $sql=mysqli_query($con,"INSERT INTO `usr_adds`(`usr_num`, `ad_id`) VALUES('$usr','$ad')");
    
    if($sql)
    {
      $response = array( 'status' => 'success', 'content' => 'submit successfully');  
        print json_encode($response);      
    }
    else {
      $response = array( 'status' => 'failed', 'content' => 'submit failed');  
        print json_encode($response);
    }
  }


?>