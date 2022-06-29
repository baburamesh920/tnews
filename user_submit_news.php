<?php
if(isset($_POST['title']))
{
    include("db_config.php");
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $category_type=mysqli_real_escape_string($con,$_POST['category_type']);
    $content=mysqli_real_escape_string($con,$_POST['content']);
    $type=$_POST['type'];
	$video=mysqli_real_escape_string($con,$_POST['video']);
	
	$target_dir = "upload/";
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir.basename($_FILES["image"]["name"]);
	$img_name = ",".basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["image"]["size"] > 100000000) {
		//echo "Sorry, your file is too large.";
		$uploadOk = 0;
		print_r($_FILES["image"]["size"]);
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		print_r($_FILES["image"]["size"]);
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			//print_r($_FILES["image"]["size"]);
		} else {
			//echo "Sorry, there was an error uploading your file.";
			//print_r($_FILES["image"]["size"]);
		}
	}
	$target="reporter_videos/";
     // $target=$target.basename($_FILES['video']['name']);

     // $typ=pathinfo($target,PATHINFO_EXTENSION);
     // $uplaod_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
     // $video_name=$_FILES['video']['name'];


  $target=$target.basename($_FILES['video_link']['name']);

  $uplaod_success=move_uploaded_file($_FILES['video_link']['tmp_name'],$target);
   $video_name=$_FILES['video_link']['name'];


	$language=$_POST['language'];
    $location=$_POST['location'];
    $user_name=$_POST['user_name'];
    $user_mobile=$_POST['user_mobile'];
    $nl="Short News";
    $r='1';
	$approval_status ='0';

 $sql=mysqli_query($con,"INSERT INTO `news`(`title`, `category_type`, `content`, `news_length`, `type`, `image`, `video_link`, `language`, `location`, `user`,`approval_status`,`user_name`,`user_mobile`) VALUES('$title','$category_type','$content','$nl','$type','$img_name','$video_name','$language','$location','$r','$approval_status','$user_name','$user_mobile')");
   if($sql)
    {
      $response = array( 'status' => 'success');  
      print json_encode($response);
       
    }
    else{
		
      $response = array( 'status' => 'failed');  
      print json_encode($response);
    }
  }
?>
