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
        <h3 style="text-align: center"> User Details</h3>
        <hr>
	 <div class="col-md-12">
              <select class="selectpicker form-control" name="location" id="location">
			  <option value="" selected="selected">Select Location</option>
              <?php
              include("db_config.php");
              $sql=mysqli_query($con,"SELECT * FROM `news_location`");
			  while($row=mysqli_fetch_assoc($sql))
              {
                ?> 
                <option value=<?php echo $row['id']; ?> ><?php echo $row['location']; ?></option>
                <?php
              }
              ?>
              </select>
      </div>
	  <br/>
	  <br/>
   <div class="col-lg-12 col-md-12" id="tbl_div" style="display:hidden;">
	   <table class="table table-striped table-bordered" id="usr_tbl">
	   <thead>
	   <th>id</th>
	   <th>User Name</th>
	   <th>Mobile Number</th>
	   </thead>
	   <tbody>
	   </tbody>
   </table>
   </div>
    <!-- /.row -->
    </div>
     <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$('#tbl_div').hide();
	$("#location").change(function(){
		$("#usr_tbl").dataTable().fnDestroy();
		$('#tbl_div').slideUp();
	var id = $(this).find(":selected").val();
		$('#usr_tbl').DataTable({
			"ajax":
			{
			"url":"getUserDetails.php",
			"dataType": "json",
			"type": "POST",
			"data" : {"locid":id}
          },
          "columns": [
                            { "data": "id" },
                            { "data": "user_name" },
                            { "data": "user_number" }
					],
          "columnDefs": [
                            { "orderable": false, "targets": 2 }
                        ]
		}); 
		$('#tbl_div').slideDown();
    } );
  } );
</script>


<?php
include("footer.php");

}
 else{
	 header('Location:index.php');
 }
?>