
<?php
session_start();
if($_SESSION)
{
$email=$_SESSION['email'];
}
else
{
    header("location:index.php");
}
if(isset($_POST['name']))
{
    include("db_config.php");
$n=mysqli_real_escape_string($con,$_POST['name']);
  $images_name =""; 
      foreach ($_FILES["files"]["error"] as $key => $error)
       {
         if ($error == UPLOAD_ERR_OK) 
         {
            $tmp_name = $_FILES["files"]["tmp_name"][$key]; 
          $name = $_FILES["files"]["name"][$key]; 
          // $target ="upload/";
         $target ="/var/www/html/newsdashboard/advertisementsimages/".$name;
        
       
          move_uploaded_file($tmp_name, $target); 

          $images_name =$images_name.",".$name;
         } 
        }

    $sql=mysqli_query($con,"INSERT INTO `advertisements`(`name`, `image`) VALUES('$n','$images_name')");
    if($sql)
    {
        $msg='Advertisement Added Successfully';
        header("location:view_advertisements.php");
    }

}
?>
<?php
include("header.php");
?>

    <div id="page-wrapper">
        <div class="container-fluid">
         <p class="text-center">
            <?php
            if(isset(($msg)))
            {
              echo $msg;
            }
            ?>
            </p>
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12" id="content">
                    <div class="col-md-6 col-md-offset-3">
       
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Advertisements</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input type="text" name="name" class="form-control" required="required" placeholder="Enter Advertisement Name" />
 
              </div>
            </div>
           
             <div class="form-group" >
              <label class="col-md-3 control-label" for="image">Image</label>
              <div class="col-md-9">
                <input type="file" name="files[]" multiple="" class="form-control" />
              </div>
             </div>
          
    
            <!-- Email input-->
            
    <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="add">Add</button>
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