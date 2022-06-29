 <?php
 include("header.php");
 ?>
   <div id="page-wrapper">
     <div class="container-fluid">
            <!-- Page Heading -->
    <div class="row" id="main" >
        <h3 style="text-align: center"> All Breaking News</h3>
                <hr>
    <div class="col-sm-12 col-md-12 custyle" id="content">
    
    <table class="display" id="example">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>News Type</th>
            <th class="text-center">Content</th>
			<th class="text-center">Image</th>
            <th>Location</th>
            <th>Language</th>
			<th>News By</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <?php
    include("db_config.php");
    $i=1;
	 $sql=mysqli_query($con,"SELECT breaking_news.language,breaking_news.id,breaking_news.breaking_news,category_type.category_type as category_type,breaking_news.content,breaking_news.type,breaking_news.image,breaking_news.location,breaking_news.reporter_name,breaking_news.user_name
    FROM breaking_news 
    JOIN category_type ON breaking_news.category_type=category_type.id
    ORDER BY id DESC");
	
    //$sql=mysqli_query($con,"SELECT * FROM `breaking_news` ");
    while($row=mysqli_fetch_assoc($sql))
    {
        ?>
            <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $row['breaking_news']; ?></td>
				<td><?php echo $row['category_type']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <!-- Content Modal -->
			
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
				<!-- Image Modal -->
                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>">View Images</button></td>
                <div class="modal fade" id="myModal<?php echo $row['id'];?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Uploaded Images</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>This is a small modal.</p> -->
                          <?php
                         
                         $data=$row['image'];
						 
                            $arr=explode(",",$data);
                            unset($arr[0]);    //removes the first value
                            unset($arr[count($arr)-1]); 
							//print_r($arr);
                            foreach($arr as $k){
                            ?>

                           <img src="upload/<?php echo $k; ?>"  height="150px" width="150px" style="float: left;padding:10px;"> 
                           <?php } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
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
				   <td>
                     <?php
                        if(isset($row['reporter_name'])){
                            echo $row['reporter_name']."(reporter)";
                        }
                        else if(isset($row['user_name'])){
                            echo $row['user_name']."(user)";

                        }
                        else {
                            echo "Admin";
                        }

                    ?>
                    
                </td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="edit_breaking_news.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <!-- /* <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a> --></td>
  
                 <td class="text-center"><a class='btn btn-info btn-xs' href="delete_breaking_news.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-trash"></span> delete</a> <!-- <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td> -->
            </tr>
         <?php
         $i++;
     }
         ?>
  </table>
        </div>
          </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#wrapper -->
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
