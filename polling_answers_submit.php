<?php

if(isset($_POST['answer']))
{
  
    include("db_config.php");
    
    $pl_id=mysqli_real_escape_string($con,$_POST['pl_id']);
    $usr=mysqli_real_escape_string($con,$_POST['usr_num']);
    $usr_name=mysqli_real_escape_string($con,$_POST['usr_name']);
    $answer=mysqli_real_escape_string($con,$_POST['answer']);
    $location=mysqli_real_escape_string($con,$_POST['location']);
    $sub=mysqli_real_escape_string($con,$_POST['submitted']);

    $quer=mysqli_query($con,"select * from poling_answers where usr_num='$usr' and pl_id='$pl_id' ");
    $row=mysqli_fetch_assoc($quer);
   
   if($row > 0){
              

                $response = array( 'status' => 'success', 'content' => 'Already polling is submitted');  
                  print json_encode($response);      
            
            }


    else{
		$sql=mysqli_query($con,"INSERT INTO `poling_answers`(`usr_num`, `usr_name`, `pl_id`, `answer`, `location`, `submitted`)
                 VALUES('$usr','$usr_name','$pl_id','$answer','$location','$sub')");
				 
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
  

  }


?>