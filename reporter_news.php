 <?php
 include("reporter_dashboard.php");
 ?>

 <div id="page-wrapper">
     <div class="container-fluid">
            <!-- Page Heading -->
    <div class="row" id="main" >
        <h3 style="text-align: center"> All news</h3>
                <hr>
    <div class="col-sm-12 col-md-12 custyle" id="content">
    
    <table class="display" id="example">
    <thead>
   
        <tr>
           <th>ID</th> 
            <th>Title</th>
            <th>Reporter Name</th>
            <th>CategoryType</th>
            <th>News Type</th>
            <th>Content</th>
            <th>Image</th>
            <th >VideoLink</th>
			<th>Youtube Link</th>
            <th>Location</th>
			<th>Language</th>
           
            <!-- <th class="text-center">Edit</th> -->

            <!-- <th class="text-center">Delete</th> -->

            <th class="text-center">Status</th>
			<th>Actions</th>
        </tr>
    </thead>
    <?php
    include("db_config.php");

    $i=1;
    $sql=mysqli_query($con,"SELECT news.id,news.title,category_type.category_type as category_type,news.content,news.type,news.image,news.video_link,news.youtube_link,news.language,news.location,news.reporter_name,news.status
    FROM news 
    JOIN category_type ON news.category_type=category_type.id
	where reporter='1'
    ORDER BY id DESC");

    while($row=mysqli_fetch_assoc($sql))
    {
        ?>
            <tr>
                 <td><?php echo $i; ?> </td> 
                <td><?php echo $row['title']; ?></td>
				<td><?php echo $row['reporter_name']; ?></td>
                <td><?php echo $row['category_type']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalc<?php echo $row['id'];?>">View content</button></td>
				 <div class="modal fade" id="myModalc<?php echo $row['id'];?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Uploaded Content</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>This is a small modal.</p> -->
                          <?php			
						    $data=$row['content'];
                            $arr=explode(",",$data);
                            foreach($arr as $k){
                            echo $k; 
                           } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>

               
                
                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>">View Images</button></td>
                <div class="modal fade" id="myModal<?php echo $row['id'];?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Uploded Images</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>This is a small modal.</p> -->
                          <?php
                         
                         $data=$row['image'];
                            $arr=explode(",",$data);
                            unset($arr[0]);    //removes the first value
                           // unset($arr[count($arr)-1]); 
                            foreach($arr as $k){
                            ?>

                          <div class="col-sm-3"> <img src="upload/<?php echo $k; ?>"  height="150px" width="150px" style="float: left"> </div>
                           <?php } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>

                <td><?php echo $row['video_link']; ?></td>
				 <td><a href="<?php echo $row['youtube_link']; ?>" target="_blank"><?php echo $row['youtube_link']; ?></a></td>
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
              
                
           
                <!-- <td class="text-center"><a class='btn btn-info btn-xs' href="edit_news.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-edit"></span> Edit</a>  -->

                
                     <?php
                if($row['status']=='unposted')
                    {
                        ?>

                        
 
                        <td class="text-center"></span> Unpost</a>
                        <!-- <a class='btn btn-info btn-xs' href="delete_reporter.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span> delete</a> -->

                <?php
            }
            else{
                echo "</td><td>";
                echo "Posted";
            }
            ?>
			<td class="text-center"><a class='btn btn-info btn-xs' href="edit_reporter_news.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-edit"></span></a>  

                <a class='btn btn-info btn-xs' href="delete_reporter_news.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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