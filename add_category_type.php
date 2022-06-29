
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
if(isset($_POST['add']))
{
    include("db_config.php");
$category=mysqli_real_escape_string($con,$_POST['category']);
$language=$_POST['language'];
// $images_name =""; 
     // foreach ($_FILES["files"]["error"] as $key => $error)
       //{
        // if ($error == UPLOAD_ERR_OK) 
        // {
            $tmp_name = $_FILES["files"]["tmp_name"]; 
          $name = $_FILES["files"]["name"]; 
          // $target ="upload/";
         $target ="cupload/".$name;
        
       
		move_uploaded_file($tmp_name, $target); 

//          $images_name = $name;
         //} 
       // }
//$banner=$_FILES['banner']['name'];

    $sql=mysqli_query($con,"INSERT INTO category_type(`category_type`,`language`,`image`) VALUES('$category','$language','$target')");
    if($sql)
    {
        $msg='Title Added Successfully';
        header("location:category_types.php");
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
            <legend class="text-center">Add Category Type</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">category Type</label>
              <div class="col-md-9">
                <input type="text" name="category" class="form-control" required="required" placeholder="Enter Category name" />
 
              </div>
            </div>
			<div class="form-group">
              <label class="col-md-3 control-label" for="name">Language</label>
              <div class="col-md-9">
                <select name="language" class="form-control" required="required">
				<option value="">Select Language</option>
				<option value="1">Telugu</option>
				<option value="2">English</option>
				</select>
              </div>
            </div>
			<div class="form-group">
              <label class="col-md-3 control-label" for="name">Category Image</label>
              <div class="col-md-9">
                <input type="file" name="files" id="i" class="form-control" required="required" />
				<br>
                <div class="gallery"></div>
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
<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
			
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
					
					 var image = new Image();
					 image.src = event.target.result;
					 
					 image.onload = function () {
                    var height = this.height;
                    var width = this.width;
					//alert(height);
                    /* if (height != '400' || width != '400') {
						
                        alert("Height and Width must not exceed 400px.");
                        //return false;
						$("#i").val(null);
                    } */
					//else{
						
						$($.parseHTML('<img style="height:100px;width:100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
					//}
                    
                };
					 
                    
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#i').on('change', function() {
		
			
        imagesPreview(this, 'div.gallery');
		
        });
    });

</script>
<?php
include("footer.php");
?>
