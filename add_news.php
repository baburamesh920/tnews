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
	//print_r($_POST);
    include("db_config.php");
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $category_type=mysqli_real_escape_string($con,$_POST['category_type']);
    $content=mysqli_real_escape_string($con,$_POST['content']);
	$content1=strlen($content);
	//echo "<script>alert('$content');</script>";
	//echo $content1;
	
	if($content1=='0' || $content1<='1040'){

	//exit();
    $type=$_POST['type'];

    if(isset($_POST['content'])){
	    
		 $target="videos/";
		 $target=$target.basename($_FILES['video']['name']);

		 $typ=pathinfo($target,PATHINFO_EXTENSION);
		 $uplaod_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
		 $video_name=$_FILES['video']['name'];

	 }
    // if(isset($_FILES['files'])){
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
          
  //Thumbnail Images
		 $thumb_images_name =""; 
      foreach ($_FILES["thumbfiles"]["error"] as $key => $error)
       {
         if ($error == UPLOAD_ERR_OK) 
         {
            $tmp_name = $_FILES["thumbfiles"]["tmp_name"][$key]; 
          $name = $_FILES["thumbfiles"]["name"][$key]; 
          // $target ="upload/";
         $target ="thumbnails/".$name;
        
       
       move_uploaded_file($tmp_name, $target); 

          $thumb_images_name =$thumb_images_name.",".$name;
         } 
        }
   //Video Thumbnail Image
		 $video_thumb_images_name =""; 
      foreach ($_FILES["thumbvideo"]["error"] as $key => $error)
       {
         if ($error == UPLOAD_ERR_OK) 
         {
            $tmp_name = $_FILES["thumbvideo"]["tmp_name"][$key]; 
          $name = $_FILES["thumbvideo"]["name"][$key]; 
          // $target ="upload/";
         $target ="thumbnails/".$name;
        
       
       move_uploaded_file($tmp_name, $target); 

          $video_thumb_images_name = $video_thumb_images_name.",".$name;
         } 
        }
    //$location=$_POST['location'];
	$language=$_POST['language'];
	 $location=$_POST['location'];
    $ques=$_POST['question'];
    $a=$_POST['opt_a'];
    $b=$_POST['opt_b'];
    $c=$_POST['opt_c'];
    $d=$_POST['opt_d'];
    $nl=$_POST['news_length'];
    $r='0';
    $yl=$_POST['youtube'];
	$approval_status ='1';
      

 //$sql=mysqli_query($con,"INSERT INTO `news`(`title`, `category_type`, `content`, `news_length`, `type`, `image`, `video_link`, `location`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `reporter`,`youtube_link`,`language`) VALUES('$title','$category_type','$content','$nl','$type','$images_name','$video_name','$location','$ques','$a','$b','$c','$d','$r','$yl','$language')");
 
 if ($_POST) {
	 
$location = rtrim(implode(',', $_POST['location']), ','); 

$sql=mysqli_query($con,"INSERT INTO `news`(`title`, `category_type`, `content`, `news_length`, `type`, `image`,`thumbnail_image`, `video_link`, `video_thumbnail_image`, `location`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `reporter`,`youtube_link`,`language`,`approval_status`) VALUES('$title','$category_type','$content','$nl','$type','$images_name','$thumb_images_name','$video_name','$video_thumb_images_name','$location','$ques','$a','$b','$c','$d','$r','$yl','$language','$approval_status')");
      }
   
function sendNot($news_id,$category_id,$gcm,$title,$image){
 

define( 'API_ACCESS_KEY', 'AIzaSyA3RbHt6bVPdrPWRbtm56MEElUncMDmqBk' );
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
//die('FCM Send Error: ' . curl_error($ch));
}
curl_close( $ch );
//var_dump($result);die;

  

}




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
      $msg='News Added Successfully';

      
      

      header("location:news.php");
       
    }
}
	
	
	else if($content1>='1040'){
		
		echo "<script>alert('Min. 160 & Max 380 characters.');</script>";
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
            <legend class="text-center">Add News</legend>
			
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
              <label class="col-md-3 control-label" for="title">Title</label>
              <div class="col-md-9">
              <input id="title" name="title" class="form-control" placeholder="Enter Title" required />
 
              </div>
            </div>
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
              <label class="col-md-3 control-label" for="type">News Type</label>
              <div class="col-md-9">

              <select  id="type" class="form-control" name="type" required >

                  <option value="">Select Type</option>

                  <option value="image">Image News</option>

                  <option value="content">Content News</option>

                  <option value="Image&Content">Image and Content News</option>

                  <option value="video">Video News</option>

                  <option value="Advertisements">Advertisements</option>

                  <option value="Polling">Polling</option>

                  <option value="youtube">Youtube Link</option>

                </select>
              </div>
			  
			  
            </div>

          <div id="cnt" style="display:none;">
             <div class="form-group">
                  <label class="col-md-3 control-label" for="content">Content</label>
                  <div class="col-md-9">
                  <textarea id="contents" name="content" class="form-control" placeholder="Enter Content" ></textarea>
				 <!-- <p style="color:green;"> No. Of Characters: <span id="number">0</span></p>-->
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

          <div id="img" style="display:none;">
             <div class="form-group" >
              <label class="col-md-3 control-label" for="image">Image</label>
              
              <div class="col-md-9">
                <input id="i" type="file" name="files[]" multiple="" class="form-control file" />
                <br>
                <div class="gallery"></div>
              </div>
			  
			   <label class="col-md-3 control-label" for="image">Thumbnail Image</label>
              
              <div class="col-md-9">
                <input id="i" type="file" name="thumbfiles[]" multiple="" class="form-control file" />
                <br>
                <div class="gallery"></div>
              </div>
			  
             </div>
          </div>
          <div id="pol" style="display:none;">
             <div class="form-group">
                  <label class="col-md-3 control-label" >Polling</label>
                  <div class="col-md-9">
                  <input id ="que" type="text" class="form-control" name="question" placeholder="Enter Question" /> 
                  <br>

                  Option A<input id ="o_a" type="text" class="form-control" name="opt_a" placeholder="Options"  /> 
                  Option B<input id ="o_b" type="text" class="form-control" name="opt_b" placeholder="Options" />
                  Option C<input id ="o_c" type="text" class="form-control" name="opt_c" placeholder="Options"  />
                  Option D<input id ="o_d" type="text" class="form-control" name="opt_d" placeholder="Options"  />
                  </div>
             </div>
          </div>

          <div id="vdo" style="display:none;">
             <div class="form-group" >
              <label class="col-md-3 control-label" for="video">Upload Video </label>
              <div class="col-md-9">
              <input id= "vd" type="file" class="form-control" name="video"  placeholder="Upload Video" /> 
                <div class="vdeo"></div>
              </div>
			  			 <div>&nbsp;</div>
			   <label class="col-md-3 control-label" for="image">Thumbnail Image</label>
              
              <div class="col-md-9">
                <input id="vd" type="file" name="thumbvideo[]" multiple="" class="form-control file" />
                <br>
                <div class="gallery"></div>
              </div>
            </div> 
          </div>  

          <div id="yvo" style="display:none;">
             <div class="form-group" >
              <label class="col-md-3 control-label" >Enter You Tube Link</label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="youtube" placeholder="Enter youtube link" id="link" /> 
              </div>
            </div> 
          </div> 
             
             <!--<div class="form-group">
              <label class="col-md-3 control-label" for="name">Location </label>
              <div class="col-md-9">
              <select name="location" class="form-control" required>
              <option value="">Select Location</option>
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
            </div>-->
			
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
					 
					//  image.onload = function () {
          //           var height = this.height;
          //           var width = this.width;
					// //alert(height);
          //           if (height != '400' || width != '400') {
						
          //               alert("Height and Width must not exceed 400px.");
          //               //return false;
					// 	$("#i").val(null);
          //           }
					// else{
						
					// 	$($.parseHTML('<img style="height:100px;width:100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
					// }
                    
          //       };
					 
                    
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
<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<video style="height:300px;width:300px" controls>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#vd').on('change', function() {
        imagesPreview(this, 'div.vdeo');
    });
});
</script>
<?php
include("footer.php");
?>
