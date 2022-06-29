<!DOCTYPE html>
<head>
<!-- Multiple Select -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> 
<style>
	.pip {
  display: inline-block;
}
	.imageThumb {
  max-height: 67px;
  border: 1px solid;
  padding: 1px;
  cursor: pointer;
}

</style>
</head>
</html>
<?php
if(isset($_POST['update']))
{
    include("db_config.php");
    $id=$_GET['id'];
    $title=mysqli_real_escape_string($con,$_POST['title']);
	$category_type=mysqli_real_escape_string($con,$_POST['category_type']);
	$r="0";
	$nl=mysqli_real_escape_string($con,$_POST['news_length']);
    $type=$_POST['type'];
	$content=mysqli_real_escape_string($con,$_POST['content']);
	$content1=strlen($content);
	if($content1=='0' || $content1<='1040'){
		
    //if(isset($_POST['content'])){
	    
		 $target="videos/";
		 $target=$target.basename($_FILES['video']['name']);

		 $typ=pathinfo($target,PATHINFO_EXTENSION);
		 $uplaod_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
		 $video_name=$_FILES['video']['name'];
	// }
	 $sql=mysqli_query($con,"SELECT * FROM `news` where id='$id'");
     while($row=mysqli_fetch_assoc($sql))
      {
		$previous_images = $row['image'];
		$images_name = ""; 
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
	$location = rtrim(implode(',', $_POST['location']), ','); 
	$yl=$_POST['youtube'];
	$ques=$_POST['question'];
    $a=$_POST['opt_a'];
    $b=$_POST['opt_b'];
    $c=$_POST['opt_c'];
    $d=$_POST['opt_d'];
     if($images_name == ''){
		$sql=mysqli_query($con,"UPDATE `news` SET `title`='$title',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`video_link`='$video_name',`question`='$ques',`opt_a`='$a',`opt_b`='$b',`opt_c`='$c',`opt_d`='$d',`youtube_link`='$yl',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'");
	//echo "UPDATE `news` SET `title`='$title',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`video_link`='$video_name',`question`='$ques',`opt_a`='$a',`opt_b`='$b',`opt_c`='$c',`opt_d`='$d',`youtube_link`='$yl',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'";
	//exit;
	}
	else if($images_name != ''){
	    $sql=mysqli_query($con,"UPDATE `news` SET `title`='$title',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`image`='$images_name',`video_link`='$video_name',`question`='$ques',`opt_a`='$a',`opt_b`='$b',`opt_c`='$c',`opt_d`='$d',`youtube_link`='$yl',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'");
	//echo "UPDATE `news` SET `title`='$title',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`image`='$images_name',`video_link`='$video_name',`question`='$ques',`opt_a`='$a',`opt_b`='$b',`opt_c`='$c',`opt_d`='$d',`youtube_link`='$yl',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'";
	//exit;
	}
	else{
   $sql=mysqli_query($con,"UPDATE `news` SET `title`='$title',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`image`='$images_name',`video_link`='$video_name',`question`='$ques',`opt_a`='$a',`opt_b`='$b',`opt_c`='$c',`opt_d`='$d',`youtube_link`='$yl',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'");
	}
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
       $msg='Category Type Edited Successfully';
       header("location:breaking_news.php");
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
      $msg='Breaking News Updated Successfully';
      header("location:news.php");
       
    }

}
else if($content1>='1040'){
		
		echo "<script>alert('Min. 160 & Max 380 characters.');</script>";
}

}
//`reporter`,`content`,`news_length`,`type`,`image`

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
                    <?php
                  
                    $id=$_GET['id'];
                    
                    include("db_config.php");
                    $query=mysqli_query($con,"SELECT * FROM `news` WHERE id='$id' ");
                    while($row=mysqli_fetch_assoc($query))
                    {
                      ?>
       
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Edit News</legend>
    
            <!-- Name input-->
            <div class="form-group">
         <label class="col-md-3 control-label" for="title">Title</label>
              <div class="col-md-9">
              <input id="title" name="title" class="form-control" value="<?php echo $row['title']?>" required />
 
              </div>  
				 
		
             
            </div>
			 <div class="form-group">
				  <label class="col-md-3 control-label" for="name">Language</label>
				  <div class="col-md-9">
					<select name="language" class="form-control" required="required" id="language">
					<option value="1">Telugu</option>
					<option value="2">English</option>
					</select> 
				
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
					$sql2=mysqli_query($con,"SELECT * FROM `news` where id='$id'");
					while($row=mysqli_fetch_assoc($sql2))
					{
						$category_id = $row['category_type'];
						  while($res=mysqli_fetch_assoc($sql))
						  {
							  $category_type = $res['category_type'];
                      ?>
                      <option value="<?php echo $res['id']; ?>" <?php if($res['id']==$category_id){ ?> selected <?php } ?> ><?php echo $category_type; ?></option>
					  
                      <?php
                    }
					}
                    ?>
                    </select>
       
                    </div>
            </div>  
					<div class="form-group">
			 <label class="col-md-3 control-label" for="type">News Type</label>
              <div class="col-md-9">

              <select  id="type" class="form-control" name="type" required >

              <!--    <option value="">Select Type</option>  -->
					 <?php
                    include("db_config.php");
                    $sql=mysqli_query($con,"SELECT * FROM `news` where id='$id'");
					
                    while($row=mysqli_fetch_assoc($sql))
                    {
						$type = $row['type'];
						if($type=='image'){
                      ?>
                     <option value="image" <?php if($type=='image'){ ?> selected <?php } ?>>Image News</option>
					 <?php } else if($type=='content'){   ?>
					 <option value="content" <?php if($type=='content') { ?> selected <?php } ?>>Content News</option>
					 <?php } else if($type=='Image&Content'){   ?>
					 <option value="Image&Content" <?php if($type=='Image&Content') { ?> selected <?php } ?>>Image and Content News</option>
					 <?php } else if($type=='video'){   ?>
					 <option value="video" <?php if($type=='video') { ?> selected <?php } ?>>Video News</option>
					 <?php } else if($type=='Advertisements'){   ?>
					 <option value="Advertisements" <?php if($type=='Advertisements') { ?> selected <?php } ?>>Advertisements</option>
					 <?php } else if($type=='Polling'){   ?>
					 <option value="Polling" <?php if($type=='Polling') { ?> selected <?php } ?>>Polling</option>
					 <?php } else if($type=='youtube'){   ?>
					 <option value="youtube" <?php if($type=='youtube') { ?> selected <?php } ?>>youtube</option>
                      <?php
                    }
					}
                    ?>
                 
                </select>
              </div> 
			<div>&nbsp;</div>
			 <?php 
			   $sql=mysqli_query($con,"Select * from `news` where id='$id'");
			   while($row=mysqli_fetch_assoc($sql))
				{
					$type = $row['type'];
			//Image News
			  if($type=='image'){ ?>
			   <div class="col-md-12">
				<label class="col-md-3 control-label" for="image">Previous&nbsp;Images</label>
					<?php
					  $data=$row['image'];
                           $arr=explode(",",$data);
						   $previous_images = $data;
                           unset($arr[0]);    //removes the first value
                           // unset($arr[count($arr)-1]); 
                           foreach($arr as $k){ 
                            ?>
							 <span class="pip">
								<div class="col-md-9"> <img class="imageThumb" src="upload/<?php echo $k; ?>" > </div>
							 </span>
                           <?php } ?>
			   </div>
			    <!-- Image Div -->
			 <div id="img">
				<div class="form-group" >
					<label class="col-md-3 control-label" for="image">Image</label>
					<div class="col-md-9">
						<input id="i" type="file" name="files[]" multiple="" class="form-control file" />
						<br>
						<div class="gallery"></div>
					</div>
				</div>
             </div>
				<?php } 
				
		//  Image And Content News  
		
				else if($type=='Image&Content'){  ?>
				   <div class="col-md-12">
						<label class="col-md-3 control-label" for="image">Previous&nbsp;Images</label>
					<?php
					  $data=$row['image'];
                           $arr=explode(",",$data);
						   $previous_images = $data;
                           unset($arr[0]);    //removes the first value
                           // unset($arr[count($arr)-1]); 
                           foreach($arr as $k){ 
                            ?>
						 <span class="pip">
							<div class="col-md-9"> <img class="imageThumb" src="upload/<?php echo $k; ?>" > </div>
						 </span>
                           <?php } ?>
			   </div>
				<!-- Content News -->
			 <div id="cnt">
				<div class="form-group">
					  <label class="col-md-3 control-label" for="content">Content</label>
					  <div class="col-md-9">
					  <textarea id="contents" name="content" class="form-control" ><?php echo $row['content'];  ?></textarea>
					  <!--<p style="color:green;"> No. Of Characters: <span id="number">0</span></p> -->
					  <p style='color:red;display:none;' id="msg2"><b>Note:</b> Min. 160 and Max 380 characters.</p>
					  <?php if(isset($msg1)){ echo $msg1; } ?>
					  </div>
				</div>
             <div class="form-group">
				<label class="col-md-3 control-label" for="type">News Length</label>
				<div class="col-md-9">
					<select  id="sl" class="form-control" name="news_length" >
						<option value="">Select Type</option>
						<?php
						include("db_config.php");
						$sql=mysqli_query($con,"SELECT * FROM `news` where id='$id'");
						while($row=mysqli_fetch_assoc($sql))
						{
							$news_length = $row['news_length'];
						  ?>
					  <option value="Short News" <?php if($news_length=='Short News'){ ?> selected <?php } ?>>Short News</option>
					  <option value="Long News" <?php if($news_length=='Long News'){ ?> selected <?php } ?>>Long News</option>
				  <?php } ?>
					</select>
               </div>
            </div>
          </div>
		   <!-- Image Div -->
			 <div id="img">
				 <div class="form-group" >
					  <label class="col-md-3 control-label" for="image">Image</label>
					  <div class="col-md-9">
						<input id="i" type="file" name="files[]" multiple="" class="form-control file" />
						<br>
						<div class="gallery"></div>
					  </div>
				 </div>
          </div>
			<?php
			}
			
	//  Content News  
		
				else if($type=='content'){  ?>
				  <!-- Content News -->
			   <div id="cnt">
				 <div class="form-group">
					  <label class="col-md-3 control-label" for="content">Content</label>
						  <div class="col-md-9">
							  <textarea id="contents" name="content" class="form-control" ><?php echo $row['content'];  ?></textarea>
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
					   <?php
						include("db_config.php");
						$sql=mysqli_query($con,"SELECT * FROM `news` where id='$id'");
						while($row=mysqli_fetch_assoc($sql))
						{
							$news_length = $row['news_length'];
						  ?>
					  <option value="Short News" <?php if($news_length=='Short News'){ ?> selected <?php } ?>>Short News</option>
					  <option value="Long News" <?php if($news_length=='Long News'){ ?> selected <?php } ?>>Long News</option>
						<?php } ?>
				  </select>
              </div>
            </div>
          </div>
			<?php
			}
	//  Polling News  
		
				else if($type=='Polling'){  ?>
				   <!--Polling -->   
				 <div id="pol">
				 <div class="form-group">
					  <label class="col-md-3 control-label" >Polling</label>
					  <div class="col-md-9">
					  <input id ="que" type="text" class="form-control" name="question" value="<?php echo $row['question']; ?>" /> 
					  <br>
					  Option A<input id ="o_a" type="text" class="form-control" name="opt_a" value="<?php echo $row['opt_a']; ?>"  /> 
					  Option B<input id ="o_b" type="text" class="form-control" name="opt_b" value="<?php echo $row['opt_b']; ?>" />
					  Option C<input id ="o_c" type="text" class="form-control" name="opt_c" value="<?php echo $row['opt_c']; ?>"  />
					  Option D<input id ="o_d" type="text" class="form-control" name="opt_d" value="<?php echo $row['opt_d']; ?>"  />
					  </div>
				 </div>
			  </div>
			<?php
			}
	//  Youtube News  
		
				else if($type=='youtube'){  ?>
				 <!--  Youtube -->
				   <div id="yvo">
						 <div class="form-group" >
							<label class="col-md-3 control-label" >You Tube Link</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="youtube" value="<?php echo $row['youtube_link']; ?>" id="link" /> 
							</div>
						 </div> 
				   </div> 
			<?php
			}
		
	//Advertisements News
			  else if($type=='Advertisements'){ ?>
			   <div class="col-md-12">
				<label class="col-md-3 control-label" for="image">Previous&nbsp;Images</label>
					<?php
					  $data=$row['image'];
                           $arr=explode(",",$data);
						   $previous_images = $data;
                           unset($arr[0]);    //removes the first value
                           // unset($arr[count($arr)-1]); 
                           foreach($arr as $k){ 
                            ?>
							 <span class="pip">
								<div class="col-md-9"> <img class="imageThumb" src="upload/<?php echo $k; ?>" > </div>
							 </span>
                           <?php } ?>
			   </div>
			   <div>&nbsp;</div>
			    <!-- Image Div -->
			 <div id="img">
				<div class="form-group" >
					<label class="col-md-3 control-label" for="image">Image</label>
					<div class="col-md-9">
						<input id="i" type="file" name="files[]" multiple="" class="form-control file" />
						<br>
						<div class="gallery"></div>
					</div>
				</div>
             </div>
				<?php }
				
		//Video News
			  else if($type=='video'){ ?>
			   <div class="col-md-12">
				<label class="col-md-3 control-label" for="image">Previous&nbsp;Videos</label>
					<?php
				$video = $row['video_link'];
					 // $data=$row['video_link'];
                        //  $arr=explode(",",$data);
						//   $previous_images = $data;
                           //unset($arr[0]);    //removes the first value
                           // unset($arr[count($arr)-1]); 
                           //foreach($arr as $k){ 
                            ?>
							<div class="col-md-9"> 
								<video width="320" height="240" controls>
								  <source src="videos/<?php echo $video; ?>">
								</video>
							</div>
							<!-- <span class="pip">
								<div class="col-md-9"> <img class="imageThumb" src="videos/<?php //echo $k; ?>" > </div>
							 </span>-->
                           <?php //} ?>
			   </div>
			   <div>&nbsp;</div>
			     <!-- Video -->
		   <div id="vdo">
             <div class="form-group" >
              <label class="col-md-3 control-label" for="video">Upload Video </label>
              <div class="col-md-9">
              <input id= "vd" type="file" class="form-control" name="video"  placeholder="Upload Video" /> 
                <div class="vdeo"></div>
              </div>
            </div> 
          </div>  
				<?php }
				}?>
			  
			  </div>
			  
			
			
			
		 
		 
     <div class="form-group">
              <label class="col-md-3 control-label" for="name">Location </label>
              <div class="col-md-9">
              <select class="form-control" name="location[]" multiple required>
            <!--  <option value="">Select Location</option>  -->
              <?php
              include("db_config.php");
              $sql=mysqli_query($con,"SELECT * FROM `news_location`");
			 $sql1=mysqli_query($con,"SELECT * FROM `news` where id='$id'");
			while($row=mysqli_fetch_assoc($sql1))
            {
				$location_id = $row['location'];
				$location_array = explode(',', $location_id);
				
              while($res=mysqli_fetch_assoc($sql))
              {
				  $location = $res['location'];
                ?>
                <option value="<?php echo $res['id']; ?>" <?php if(in_array($res['id'], $location_array)) echo "selected"; ?> ><?php echo $location; ?></option>
                <?php
              }
			}
              ?>
              </select>
 
              </div>
            </div>
			
		
			
		
    <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="update">Update</button>
              </div>
            </div>
          </fieldset>
          </form>
         
          </div>
          <?php
        }
          ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<!-- /#wrapper -->
<!-- <script>
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
</script> -->
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