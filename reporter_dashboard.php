<!DOCTYPE html>
<head>
<title>Reporter Dashboard</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<link href="css/style.css" rel="stylesheet" >
<script src="js/script.js" ></script>
<style>
#logo
{
    height: 125%;
    width: 75%;
    margin-left: 35px;
}
.box_style{
    border:solid 2px #423c42;
-moz-border-radius: 0px;
-webkit-border-radius: 0px;
border-radius: 0px;
}

    </style>

</head>
<body>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="banner/logo.png" alt="LOGO" style="width:80px;height:58px;margin-left: 53px;" id="logo"> 
                <!-- <h3>News Hub</h3> -->
            </a> 
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
           <!--  <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>    -->         
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporter User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li> -->
                    <li><a href="change_password.php"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                   <!--  <li class="divider"></li> -->
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="reporter_dashboard_withcount.php" style=
                    "margin-top:30px;"></i> Dashboard   </a>
                    </li>
                     
                    

                    <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-star"></i> News <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-3" class="collapse">
                        <li><a href="reporter_news.php"><i class="fa fa-angle-double-right"></i> View News</a></li>
                        <li><a href="add_reporter_news.php"><i class="fa fa-angle-double-right"></i> Add News</a></li>
                        
                    </ul>
                    </li>

                    <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-star"></i> Breaking News <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-4" class="collapse">
                        <li><a href="reporter_breaking_news.php"><i class="fa fa-angle-double-right"></i> View Breaking News</a></li>
                        <li><a href="add_reporter_breaking_news.php"><i class="fa fa-angle-double-right"></i> Add Breaking News</a></li>
                        
                    </ul>
                    </li>
                    
              
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>