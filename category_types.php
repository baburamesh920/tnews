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
                <h3 style="text-align: center"> All Categories</h3>
                <hr>
             <div class="col-sm-12 col-md-12" id="content">
    <div class="row col-md-9 col-md-offset-1 custyle">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Category Type</th>
			<th>Category Image</th>
           <th>Language</th>
            <th class="text-center">Edit</th>

            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <?php
    include("db_config.php");
    $i=1;
    $sql=mysqli_query($con,"SELECT * FROM `category_type` ");
    while($row=mysqli_fetch_assoc($sql))
    {
        ?>
            <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $row['category_type']; ?></td>
				<td><img src="<?php echo $row['image']; ?>" height="50" width="50"></td>
				<td><?php  if($row['language']=='1'){ echo "Telugu";}if($row['language']=='2'){ echo "English";} ?></td>
                
                <td class="text-center"><a class='btn btn-info btn-xs' href="edit_category.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <!-- /* <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a> --></td>
  
                 <td class="text-center"><a class='btn btn-info btn-xs' href="delete_category_type.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-trash"></span> delete</a> <!-- <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td> -->
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
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php
include("footer.php");

 }
 else{
	 header('Location:index.php');
 }
?>
