<!DOCTYPE html>
<head>
<!-- Multiple Select -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> 
</head>
</html>

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
	$category_type=mysqli_real_escape_string($con,$_POST['category_type']);
    $category=mysqli_real_escape_string($con,$_POST['breaking_news']);
	$content=mysqli_real_escape_string($con,$_POST['content']);
	$content1=strlen($content);
	$nl=$_POST['news_length'];
	if($content1=='0' || $content1<='1040'){

	//exit();
    $type=$_POST['type'];
	  $images_name =""; 
	   foreach ($_FILES["files"]["error"] as $key => $error)
       {
         if ($error == UPLOAD_ERR_OK) 
         {
            $tmp_name = $_FILES["files"]["tmp_name"][$key]; 
          $name = $_FILES["files"]["name"][$key]; 
          // $target ="upload/";
         $target ="upload/".$name;
        
       
       move_uploaded_file($tmp_name, $target); 

          $images_name =$images_name.",".$name;
         } 
        }
	$language=$_POST['language'];
	 $location=$_POST['location'];
	$r_name=mysqli_real_escape_string($con,$_POST['reporter_name']);
	$r="1";/* 
 $sql=mysqli_query($con,"INSERT INTO breaking_news(`breaking_news`,`category_type`,`reporter`,`content`,`news_length`,`type`,`image`,`location`,`language`) VALUES('$category','$category_type','$r','$content','$nl','$type','$images_name','$location','$language')");
  */
   if ($_POST) {
			$location = rtrim(implode(',', $_POST['location']), ','); 

    $sql=mysqli_query($con,"INSERT INTO breaking_news(`breaking_news`,`category_type`,`reporter`,`content`,`news_length`,`type`,`image`,`location`,`language`,`reporter_name`) VALUES('$category','$category_type','$r','$content','$nl','$type','$images_name','$location','$language','$r_name')");
   }
    function sendNot($news_id,$category_id,$gcm,$title,$image){
 

define( 'API_ACCESS_KEY', 'AAAAXououQk:APA91bFhecDSy1GQWXXgbt98Wgq7pTJo8t4nGxkxGAQyi04XgJPc8heQQFXvlJnlTufyGmxII6CPzTUVNnjGuf98Z6W-1ghwRRpBdG7S0Pbb9z3e7sC4pFxePAq1qcY1HwUrvAXQJG6VRDLIcNjUfQecRCuPXlNyKg' );
$registrationIds = array($gcm);
if ($image == NULL){
	
	$img = ",logo.png";
}
else {
	$img = $image;
}


$msg = array
(
  'image' => $img,
  'title'   => $title,
  'news_id'   => $news_id,
  'category_id'   => $category_id
  
);
$fields = array
(
  'registration_ids'  => $registrationIds,
  'data'      => $msg
);


$headers = array
(
  'Authorization: key=' . API_ACCESS_KEY,
  'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
//$result = curl_exec($ch );
//curl_close( $ch );


$response = curl_exec($ch);
//Close request
if ($response === FALSE) {
die('FCM Send Error: ' . curl_error($ch));
}
curl_close( $ch );
//var_dump($result);die;

  

}
	/* if($sql)
    {
        $msg='Reporter Breaking News Added Successfully';
        header("location:reporter_breaking_news.php");
    } */
	if($sql)
    {

    $last=mysqli_query($con,"SELECT * FROM news ORDER BY ID DESC LIMIT 1");
        while($row=mysqli_fetch_assoc($last))
    {
    	
       $image =$row['image'];
    	
       $news_id = $row['id'];
       $category_id = $row['category_type'];
       $title = $row['title'];
      
    }
    
     $not_query=mysqli_query($con,"SELECT * FROM notifications");
        while($row=mysqli_fetch_assoc($not_query))
    {
       $gcm = $row['gcm_id'];
    
       sendNot($news_id,$category_id,$gcm,$title,$image);
    }
      $msg='Reporter Breaking News Added Successfully';
        header("location:reporter_breaking_news.php");
       
    }

}
else if($content1>='1040'){
		
		echo "<script>alert('Min. 160 & Max 380 characters.');</script>";
}
}
?>
<?php
include("reporter_dashboard.php");
?>

    <div id="page-wrapper">
        <div class="container-fluid">
         <p class="text-center">
            <?php
            if(isset($msg))
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
            <legend class="text-center">Breaking News</legend>
			<div class="form-group">
              <label class="col-md-3 control-label" for="name">Language</label>
              <div class="col-md-9">
                <select name="language" class="form-control" required="required" id="language">
				<option value="">Select Language</option>
				<option value="1">Telugu</option>
				<option value="2">English</option>
				</select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="title">Reporter Name</label>
              <div class="col-md-9">
              <input name="reporter_name" class="form-control" placeholder="Enter Your Name"/>
 
              </div>
            </div>            
          <!--  <div class="form-group">
              <label class="col-md-3 control-label" for="name">Breaking News</label>
              <div class="col-md-9">
                <textarea  type="text" name="breaking_news" class="form-control" required="required" placeholder="Enter Breaking news" ></textarea>
 
              </div>
            </div>   -->
		<div class="form-group">
                    <label class="col-md-3 control-label" for="name">Category Type </label>
                    <div class="col-md-9">
                    <select name="category_type" class="form-control" id="category_type" required>
                    <option value="">Select Category Type</option>
                    <?php
                    include("db_config.php");
                    $sql=mysqli_query($con,"SELECT * FROM `category_type` ");
                    while($row=mysqli_fetch_assoc($sql))
                    {
                      ?>
                      <option value=<?php echo $row['id']; ?> ><?php echo $row['category_type']; ?></option>
					  
                      <?php
                    }
                    ?>
                    </select>
       
                    </div>
            </div>
             <div class="form-group">
              <label class="col-md-3 control-label" for="name"> Add Breaking News</label>
              <div class="col-md-9">
                <input type="text" name="breaking_news" class="form-control" required="required" placeholder="Enter Breaking news" />
 
              </div>
			  
			  
			 <div> &nbsp;</div>
			    
              <label class="col-md-3 control-label" for="type">News Type</label>
              <div class="col-md-9">

              <select  id="type" class="form-control" name="type" required >

                  <option value="">Select Type</option>

                  <option value="image">Image News</option>

                  <option value="Image&Content">Image and Content News</option>
                 
                </select>
              </div>  
            </div>
			<!-- Image Div -->
			 <div id="img" style="display:none;">
             <div class="form-group" >
              <label class="col-md-3 control-label" for="image">Image</label>
              
              <div class="col-md-9">
                <input id="i" type="file" name="files[]" multiple="" class="form-control file" />
                <br>
                <div class="gallery"></div>
              </div>
             </div>
          </div>
           
		   <!-- Content News -->
			   <div id="cnt" style="display:none;">
             <div class="form-group">
                  <label class="col-md-3 control-label" for="content">Content</label>
                  <div class="col-md-9">
                  <textarea id="contents" name="content" class="form-control" placeholder="Enter Content" ></textarea>
				  <!-- <p style="color:green;"> No. Of Characters: <span id="number">0</span></p> -->
				  <p style='color:red;display:none;' id="msg2"><b>Note:</b> Min. 160 and Max 380 characters.</p>
				  <?php if(isset($msg1)){ echo $msg1; } ?>
                  </div>
             </div>
             <div class="form-group">
              <label class="col-md-3 control-label" for="type">News Length</label>
              <div class="col-md-9">

              <select  id="sl" class="form-control" name="news_length" >

                  <option value="">Select Type</option>

                  <option value="Short News">Short News</option>

                  <option value="Long News">Long News</option>

                </select>
              </div>
            </div>
          </div>
		   <div class="form-group">
              <label class="col-md-3 control-label" for="name">Location </label>
              <div class="col-md-9">
              <select class="selectpicker form-control" name="location[]" multiple data-live-search="true" required>
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
            </div>
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
  <!-- Multiple Select --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 
<script>
  $('#type').on('change',function(){
	  if( $(this).val()===''){
    $("#img").hide()
    $("#cnt").hide()
    $("#vdo").hide()
	$("#pol").hide()
    $("#yvo").hide()
     $('#i').prop('required',true);
     $('#title').prop('required',true);
    }
    if( $(this).val()==='image'){
    $("#img").show()
    $("#cnt").hide()
    $("#vdo").hide()
	$("#pol").hide()
    $("#yvo").hide()
     $('#i').prop('required',true);
     $('#title').prop('required',true);
	 $('#contents').prop('required',false);
     $('#c').prop('required',false);
     $('#sl').prop('required',false);
	 $('#vd').prop('required',false);
	 $('#link').prop('required',false);
	 $('#que').prop('required',false);
    $('#o_a').prop('required',false);
    $('#o_b').prop('required',false);
    $('#o_c').prop('required',false);
    $('#o_d').prop('required',false);
    }
    else if( $(this).val()==='content'){
    $("#img").hide()
    $("#cnt").show()
    $("#vdo").hide()
	$("#pol").hide()
    $("#yvo").hide()
	
	$('#contents').prop('required',true);
     $('#c').prop('required',true);
     $('#sl').prop('required',true);
    $('#i').prop('required',false);
     $('#title').prop('required',false);
	 $('#vd').prop('required',false);
	 $('#link').prop('required',false);
	 $('#que').prop('required',false);
    $('#o_a').prop('required',false);
    $('#o_b').prop('required',false);
    $('#o_c').prop('required',false);
    $('#o_d').prop('required',false);
    }
    else if( $(this).val()==='Image&Content'){
    $("#img").show()
    $("#cnt").show()
    $("#vdo").hide()
	$("#pol").hide()
    $("#yvo").hide()
	$('#contents').prop('required',true);
    $('#i').prop('required',true);
    $('#c').prop('required',true);
    $('#sl').prop('required',true);
	$('#title').prop('required',false);
	$('#vd').prop('required',false);
	$('#link').prop('required',false);
	$('#que').prop('required',false);
    $('#o_a').prop('required',false);
    $('#o_b').prop('required',false);
    $('#o_c').prop('required',false);
    $('#o_d').prop('required',false);
    }
    else if( $(this).val()==='video'){
    $("#img").hide()
    $("#cnt").hide()
    $("#vdo").show()
	$("#pol").hide()
    $("#yvo").hide()
    $('#vd').prop('required',true);
    $('#contents').prop('required',false);
    $('#i').prop('required',false);
    $('#c').prop('required',false);
    $('#sl').prop('required',false);
	$('#title').prop('required',false);
	$('#link').prop('required',false);
	$('#que').prop('required',false);
    $('#o_a').prop('required',false);
    $('#o_b').prop('required',false);
    $('#o_c').prop('required',false);
    $('#o_d').prop('required',false);
    }
     else if( $(this).val()==='Advertisements'){
    $("#img").show()
    $("#cnt").hide()
    $("#vdo").hide()
	$("#pol").hide()
	$("#yvo").hide()
    $('#i').prop('required',true);
	$('#vd').prop('required',false);
    $('#contents').prop('required',false);
    $('#c').prop('required',false);
    $('#sl').prop('required',false);
	$('#title').prop('required',false);
	 $('#link').prop('required',false);
	 $('#que').prop('required',false);
    $('#o_a').prop('required',false);
    $('#o_b').prop('required',false);
    $('#o_c').prop('required',false);
    $('#o_d').prop('required',false);
    }
    else if( $(this).val()==='youtube'){
    
    $("#yvo").show()
    $("#cnt").hide()
    $("#vdo").hide()
    $("#pol").hide()
    $("#img").hide()
    $('#link').prop('required',true);
	$('#i').prop('required',false);
	$('#vd').prop('required',false);
    $('#contents').prop('required',false);
    $('#c').prop('required',false);
    $('#sl').prop('required',false);
	$('#title').prop('required',false);
	$('#que').prop('required',false);
    $('#o_a').prop('required',false);
    $('#o_b').prop('required',false);
    $('#o_c').prop('required',false);
    $('#o_d').prop('required',false);
    }
    else if( $(this).val()==='Polling'){
    $("#img").hide()
    $("#cnt").hide()
    $("#vdo").hide()
    $("#pol").show()
    $("#yvo").hide()
    $('#que').prop('required',true);
    $('#o_a').prop('required',true);
    $('#o_b').prop('required',true);
    $('#o_c').prop('required',true);
    $('#o_d').prop('required',true);
	$('#link').prop('required',false);
	$('#i').prop('required',false);
	$('#vd').prop('required',false);
    $('#contents').prop('required',false);
    $('#c').prop('required',false);
    $('#sl').prop('required',false);
	$('#title').prop('required',false);
    }
});
$('#language').on('change',function(){
    var id= $(this).val();
	$.post("get.php", {id: id}, function(result){
        $("#category_type").html(result);
		//alert(result);
    });
});

$("#contents").on('change',function(){
    var len = $(this).val().length;
    $("#number").html(len);
     if(len>='160' && len<='380'){
	// //alert('success');
	 $('#msg2').hide();
     }
     else{
	// //alert('Fail');
	 $('#msg2').show();
     }
   // alert(len);
});
</script>
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