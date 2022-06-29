<?php
session_start();
if($_SESSION['email']!=''){
	
if($_SESSION['email']=="admin@gmail.com"){
	include("header.php");
}
else{
	include("reporter_dashboard_withcount.php");
}
?>
<style>
.abc
{
margin-right: 20px;
    margin-left: 20px;
  }
  .xyz
  {
    margin-left: 69px;
    margin-right: 20px;
  }
    </style>
<div class="container" style="margin-top: 125px;">
	<div class="row xyz">
      <div class="col-md-3 abc">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-file-code-o fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                  <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `category_type` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
					
                  ?>


                </p>
                <p class="announcement-text">Category Types</p>
              </div>
            </div>
          </div>
          <a href="category_types.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!--<div class="col-md-3 abc">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-barcode fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                    <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `news_location` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>


                </p>
                <p class="announcement-text"> Locations</p>
              </div>
            </div>
          </div>
          <a href="location.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>-->
	 
	  <!-- News-->
      <div class="col-md-3 abc">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-cog fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                    <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `news` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>


                </p>
                <p class="announcement-text">News</p>
              </div>
            </div>
          </div>
          <a href="news.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
	  
	  <div class="col-md-3 abc">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-cog fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                    <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `breaking_news` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>


                </p>
                <p class="announcement-text">Breaking News</p>
              </div>
            </div>
          </div>
          <a href="breaking_news.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
	  
	  <div class="col-md-3 abc">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-cog fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                    <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `news` where type = 'Polling'");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>


                </p>
                <p class="announcement-text">Polling</p>
              </div>
            </div>
          </div>
          <a href="polling_results.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
	   <!-- Location -->
	  <div class="col-md-3 abc">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-cog fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                    <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `news_location` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>


                </p>
                <p class="announcement-text">Locations</p>
              </div>
            </div>
          </div>
          <a href="location.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      </div>




<!-- <div class="row xyz">
      <div class="col-md-3 abc">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-bars fa-5x" aria-hidden="true"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                    <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `sub_location` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>


                </p>
                <p class="announcement-text"> Sub location</p>
              </div>
            </div>
          </div>
          <a href="plans.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-3 abc">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-eye fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">  <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `upload_image` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>

                </p>
                <p class="announcement-text"> Images</p>
              </div>
            </div>
          </div>
          <a href="posts.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-3 abc">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-check fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">
                  <?php
                  include("db_config.php");
                  $sql=mysqli_query($con,"SELECT count(*) AS count FROM `Upload_video` ");
                
                  $row=mysqli_fetch_assoc($sql);
                    echo $row['count'];
                  ?>

                  </p>
                <p class="announcement-text"> Videos</p>
              </div>
            </div>
          </div>
          <a href="plan_types.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div><!-- /.row -->
    <!-- </div> -->
    <?php
    include("footer.php");
}
else{
	header("location: index.php");
}
    ?>