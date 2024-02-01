<?php

$connection = mysqli_connect("localhost","dfoiwidm_classrecord","miguelmalayan","dfoiwidm_classrecord");



if(isset($_POST['registerbtn']))
{

    
    $username = $_POST['email'];
    $email = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $usertype=$_POST['usertype'];
    
    if($password === $cpassword)
    {
        $query ="INSERT INTO `auth` (`user`, `mail`, `password`, `tuser`) VALUES  ('$username',' $email','$password','$usertype')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
         $_SESSION['success'] ="Admin Profile Added";
         header('Location:index.php');

        }

        else
        {
         $_SESSION['status'] ="Admin Profile Not Added";
         header('Location: registeradmin.php');

        }

    }

    else
    {
        $_SESSION['status'] ="Password and Confirm Password Does Not Macth  ";
        header('Location: registeradmin.php');
    }


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log Book System</title> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
    
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons"></i> <strong>Record</strong></a>
				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
				
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>Raffy</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li> 
<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>
<ul id="dropdown2" class="dropdown-content w250">
  
</ul>
<ul id="dropdown3" class="dropdown-content dropdown-tasks w250">

</ul>   
<ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
  
</ul>  
	   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu waves-effect waves-dark" href="index.php"><i class="fa fa-dashboard"></i> Admin</a>
                    </li>
                    <li>
                        <a href="registeradmin.php" class="waves-effect waves-dark"><i class="fa fa-desktop"></i> Register Admin</a>
                    </li>
					<li>
                        <a href="info.php" class="waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> Add-Info</a>
                    </li>
                    <li>
                        <a href="table.php" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i> Students</a>
                    </li>
                    
                    <li>
                        <a href="table.html" class="waves-effect waves-dark"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html" class="waves-effect waves-dark"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empty.html" class="waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>

        <div id="page-inner">
        <div class="container">

        <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin-Register</h1>
                                
                            </div>
                            <form  method="POST">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control " placeholder="UserName">
                                </div><br>
                                <div class="form-group">
                                    <input type="email"name="email" class="form-control " placeholder="Email Address">
                                </div><br>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control " placeholder="Password">
                                </div><br>
                                <div class="form-group">
                                    <input type="password" name="cpassword" class="form-control " placeholder="Reapet Password">
                                </div><br>
                                <div class="form-group">
                                    <input type="hidden" name="usertype" value="admin">
                                </div><br>
                                <button type="submit" name="registerbtn" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
				
			
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	
	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/materialize/js/materialize.min.js"></script>
	
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
 

</body>

</html>
