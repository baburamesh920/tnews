<!DOCTYPE html>
<head>
<!-- Multiple Select -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> 
</head>
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
</html>
<?php
if(isset($_POST['update']))
{
    include("db_config.php");
    $id=$_GET['id'];
    $title_name=mysqli_real_escape_string($con,$_POST['breaking_news']);
	//echo $title_name;
	$category_type=mysqli_real_escape_string($con,$_POST['category_type']);
	$r="0";
	$content=mysqli_real_escape_string($con,$_POST['content']);
	//echo $content;exit;
	/*echo "<table border='3'>";
	foreach ($_POST as $key => $value) {
         
		echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
		
    }
	echo "</table>";
	return false;*/
	$content1=strlen($content);
	//echo $content1;
	$nl=$_POST['news_length'];
	//echo $nl;exit;
    $type=$_POST['type']; 
	if($content1=='0' || $content1<='1040'){
	 $sql=mysqli_query($con,"SELECT image FROM `breaking_news` where id='$id'");
					
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
    if($images_name == ''){
		    $sql=mysqli_query($con,"UPDATE `breaking_news` SET `breaking_news`='$title_name',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'");
	//echo "UPDATE `breaking_news` SET `breaking_news`='$title_name',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'";
//exit;
	}
	else if($images_name != ''){
    $sql=mysqli_query($con,"UPDATE `breaking_news` SET `breaking_news`='$title_name',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`image`='$images_name',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'");
	//echo "UPDATE `breaking_news` SET `breaking_news`='$title_name',`category_type`='$category_type',`content`='$content',`news_length`='$nl',`type`='$type',`image`='$images_name',`location`='$location',`language`='$language',`reporter`='$r' WHERE  id='$id'";
	//exit;
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

    $last=mysqli_query($con,"SELECT * FROM breaking_news ORDER BY ID DESC LIMIT 1");
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
      header("location:breaking_news.php");
       
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
                    $query=mysqli_query($con,"SELECT * FROM `breaking_news` WHERE id='$id' ");
                    while($row=mysqli_fetch_assoc($query))
                    {
						$content = $row['content'];
						$breaking_news = $row['breaking_news'];
                      ?>
       
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Edit Breaking News</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Breaking News</label>
			   <div class="col-md-9">
                <input type="text" name="breaking_news" class="form-control" value="<?php echo $breaking_news; ?>" required="required" />
                
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
					$sql2=mysqli_query($con,"SELECT * FROM `breaking_news` where id='$id'");
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

               <!--  <option value="">Select Type</option>   -->
					 <?php
                    include("db_config.php");
                    $sql=mysqli_query($con,"SELECT * FROM `breaking_news` where id='$id'");
					
                    while($row=mysqli_fetch_assoc($sql))
                    {
						$type = $row['type'];
						 if($type=='image'){
                      
					  ?>
				
                     <option value="image" <?php if($type=='image'){ ?> selected <?php } ?>>Image News</option>
						 <?php } 
						 else if($type=='Image&Content'){   ?>
						
					 <option value="Image&Content" <?php if($type=='Image&Content') { ?> selected <?php } ?>>Image and Content News</option>
					  
                      <?php
                    }
					}
                    ?>
				
                 <!-- <option value="image">Image News</option>

                  <option value="content">Content News</option> -->
                 
                </select>
              </div>  
			  <div>&nbsp;</div>
			  <?php 
			   $sql=mysqli_query($con,"Select * from `breaking_news` where id='$id'");
			   
			   while($row=mysqli_fetch_assoc($sql))
				{
					$type = $row['type'];
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
			   		   
				<?php } 
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
                    $sql=mysqli_query($con,"SELECT * FROM `breaking_news` where id='$id'");
					
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
				}?>
				  
			  </div>
			  
			  <!--Image Label-->
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
		<!--	   <div id="cnt" style="display:none;">
             <div class="form-group">
                  <label class="col-md-3 control-label" for="content">Content</label>
                  <div class="col-md-9">
                  <textarea id="contents" name="content" class="form-control" placeholder="Enter Content" ></textarea>
				
				  <p style='color:red;display:none;' id="msg2"><b>Note:</b> Min. 160 and Max 380 characters.</p>
				  <?php //if(isset($msg1)){ echo $msg1; } ?>
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
          </div>  -->
			   
     <div class="form-group">
              <label class="col-md-3 control-label" for="name">Location </label>
              <div class="col-md-9">
              <select name="location[]" class="form-control" multiple required>
              <!-- <option value="">Select Location</option>  -->
              <?php
              include("db_config.php");
              $sql=mysqli_query($con,"SELECT * FROM `news_location`");
			 $sql1=mysqli_query($con,"SELECT * FROM `breaking_news` where id='$id'");
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
</div><!-- /#wrapper -->
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
		$('#i').prop('required',true);
		$('#title').prop('required',true);
    }
    if( $(this).val()==='image'){
		$("#img").show()
		$("#cnt").hide()
		$('#i').prop('required',true);
		$('#title').prop('required',true);
		$('#contents').prop('required',false);
		$('#c').prop('required',false);
		$('#sl').prop('required',false);

    }
   
    else if( $(this).val()==='Image&Content'){
		$("#img").show()
		$("#cnt").show()
		$('#contents').prop('required',true);
		$('#i').prop('required',true);
		$('#c').prop('required',true);
		$('#sl').prop('required',true);
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
<?php
include("footer.php");
?>