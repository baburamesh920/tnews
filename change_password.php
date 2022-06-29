
<?php
session_start();
if($_SESSION)
{
$email=$_SESSION['email'];
}
else
{
    header("location:admin_login.php");
}
if(isset($_POST['submit']))
{
    include("db_config.php");
$current=mysqli_real_escape_string($con,$_POST['current']);
$new=mysqli_real_escape_string($con,$_POST['new']);
$sql=mysqli_query($con,"SELECT * FROM `admin` WHERE password='$current' AND email='$email' ");
$no=mysqli_num_rows($sql);
if($no==1)
{
  $query=mysqli_query($con,"UPDATE `admin` SET password='$new' WHERE email='$email' ");
$msg='Your password Set successfully';
}
else
{
   $msg='Please enter correct password';
}

//$banner=$_FILES['banner']['name'];

}
?>
<?php
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
                <div class="col-sm-12 col-md-12" id="content">
                    <div class="col-md-6 col-md-offset-3">
                    <p>
       <?php
       if(isset($msg))
       {
        echo $msg;
       }
       ?>
       </p>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Change Password</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Current Password</label>
              <div class="col-md-9">
                <input type="password" name="current" class="form-control" required="required" placeholder="current Password" />
 
              </div>
            </div>
    <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">New Password</label>
              <div class="col-md-9">
                <input type="password" name="new" class="form-control" required="required" placeholder="New Password" />
 
              </div>
            </div>
            <!-- Email input-->
            
    <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Change</button>
              </div>
            </div>
          </fieldset>
          </form>
         
          </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
<?php
include("footer.php");
?>