 <?php
 session_start();
 if($_SESSION['email']!=''){
	
if($_SESSION['email']=="admin@gmail.com"){
	include("header.php");
}
else{
	include("reporter_dashboard.php");
}
 ?>

 <div id="page-wrapper">
     <div class="container-fluid">
            <!-- Page Heading -->
    <div class="row" id="main" >
        <h3 style="text-align: center"> Polling Results</h3>
                <hr>
    <div class="col-sm-12 col-md-12 custyle" id="content">
    
    <table class="display" id="example">
    <thead>
   
        <tr>
           <th>ID</th> 
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Option D</th>
            <th>Location</th>
			<th>Language</th>
			<th>Result</th>  
		<!--	<th>Action</th>  -->
           
         
           
            <!-- <th class="text-center">Edit</th> -->

           <!-- <th class="text-center">Delete</th>  -->
        </tr>
    </thead>
    <?php
    include("db_config.php");
    
    $i=1;
	// $id=$_GET['id'];
    $sql=mysqli_query($con,"SELECT news.id,news.question,news.opt_a,news.opt_b,news.opt_c,news.opt_d,news.language,news.location
    FROM news 
	where news.type = 'Polling'
    ORDER BY id DESC");

    while($row=mysqli_fetch_assoc($sql))
    {
        ?>
            <tr>
                 <td><?php echo $i; ?> </td> 
                <td><?php echo $row['question']; ?></td>
                <td><?php echo $row['opt_a']; ?></td>
                <td><?php echo $row['opt_b']; ?></td>
                <td><?php echo $row['opt_c']; ?></td>
                <td><?php echo $row['opt_d']; ?></td>
				
				<?php 
						$str_arr = explode (",", $row['location']);  
						$locations='';
						for($j=0;$j<sizeof($str_arr);$j++)
						{
							$location_name_sql=mysqli_query($con,"SELECT news_location.location from news_location where id=$str_arr[$j]");
							 while ($row1=mysqli_fetch_row($location_name_sql))
							{
								$locations= $locations.','.$row1[0];
							}
						}
				?>
                <td><?php echo $locations; ?></td>
				<td><?php  if($row['language']=='1'){ echo "Telugu";}if($row['language']=='2'){ echo "English";} ?></td>				
				<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalc<?php echo $row['id'];?>">View</button></td>
				
				<div class="modal fade" id="myModalc<?php echo $row['id'];?>" role="dialog">
                    <div class="modal-dialog modal-xs">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title text-center">Polling Count</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>This is a small modal.</p> -->
                          <?php	
						   $id=$row['id'];
						   //$divid=0;
						  for($k=0;$k<sizeof($str_arr);$k++)
						{
							
								//A count
								$location_name_sql1=mysqli_query($con,"SELECT news_location.location from news_location where id=$str_arr[$k]");
							 while ($row11=mysqli_fetch_row($location_name_sql1))
							{
								echo "<br>";
								echo '<span class="label label-success">Location Name : </span>&nbsp&nbsp<b>'.$row11[0].'</b><br>';
								//echo '<button class="btn btn-primary" btn-sm" type="button" data-toggle="collapse" data-target="#que'.$divid.'" aria-expanded="false" aria-controls="que'.$divid.'">Show Users</button><br/>';
								//echo '<button class="btn btn-primary" btn-sm" type="button" data-toggle="collapse" data-target="#que'.$divid.'">Show Users</button><br/>';
								$sql1 = mysqli_query($con,"SELECT COUNT(pl_id) as A_Count FROM `poling_answers` WHERE answer = 'a' and pl_id = '$id' and location = '$str_arr[$k]' ");
							
									while($row=mysqli_fetch_assoc($sql1))
									{
								  echo "A Count : ".$row['A_Count']."<br>";//.'----'.$id.'----'.$str_arr[$i]; 
									}
								//B count
								$sql2 = mysqli_query($con,"SELECT COUNT(pl_id) as B_Count FROM `poling_answers` WHERE answer = 'b' and pl_id = '$id' and location = '$str_arr[$k]' ");
								  while($row=mysqli_fetch_assoc($sql2))
									{
								  echo "B Count : ".$row['B_Count']."<br>";							  
									}
								//C count	
								$sql3 = mysqli_query($con,"SELECT COUNT(pl_id) as C_Count FROM `poling_answers` WHERE answer = 'c' and pl_id = '$id' and location = '$str_arr[$k]' ");
								  while($row=mysqli_fetch_assoc($sql3))
									{
								  echo "C Count : ".$row['C_Count']."<br>";
									} 
							    //D count	
								$sql4 = mysqli_query($con,"SELECT COUNT(pl_id) as D_Count FROM `poling_answers` WHERE answer = 'd' and pl_id = '$id' and location=$str_arr[$k]");
								  while($row=mysqli_fetch_assoc($sql4))
									{
								  echo "D Count : ".$row['D_Count']."<br/>";
								  echo "<br>";								  
									} 
		$sql_details = mysqli_query($con,"SELECT usr_name,usr_num FROM `poling_answers` WHERE pl_id = '$id' and location = '$str_arr[$k]'");
		
		//echo '<div id="que'.$divid.'" class="collapse">';
		//echo '<div class="collapse" id="que'.$divid.'">';
		while($row=mysqli_fetch_assoc($sql_details))
		{
			echo "<b>Name : </b>".$row['usr_name']."&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<b>Number : </b>".$row['usr_num']."<br>";
		}		
			//echo "</div>";			
							}
							//$divid++;
										
						}
							?>	
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
               
               
             <!--   <td class="text-center"><a class='btn btn-info btn-xs' href="edit_news.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-edit"></span> Edit</a>  
 -->
              <!--  <td class="text-center"><a class='btn btn-info btn-xs' href="delete_news.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span> delete</a></td>  -->
            </tr>
    <?php
         $i++;
     }
         ?>


    </table>
         
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php
include("footer.php");
?>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "searching": true,
        "paging":   true,
        // "ordering": false,
        // "info":     false
    } );
} );
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

<?php
}
 else{
	 header('Location:index.php');
 }
?>