<?php
	ob_start();
	session_start();
	if(!isset($_SESSION["sess_user"])){
		header("location:index.php");
	}
	$id=$_GET["id"];
	$user=$_SESSION['sess_user'];
	$n=$_SESSION['sess_name'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"SELECT * FROM course where c_id='$id'");
	$numrows=mysqli_num_rows($query);
	if($numrows>0)
	{$row=mysqli_fetch_row($query);
	$c_name=$row[1];
	$branch=$row[2];
	$year=$row[3];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/ot.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Online Test</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet" />


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />
	<style media="">
	.responsive-cards {
		width: 47.4%;
	}
		@media only screen and (max-width: 700px){
	    .responsive-cards {
	        width: 95%;
	    }
		}
	</style>

	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">
	<link href="assets/css/themify-icons.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-background-color="brown" data-active-color="danger">
			<div class="logo">
				<a href="javascript:void(0)" class="simple-text logo-mini">
					OQ
				</a>
				<a href="javascript:void(0)" class="simple-text logo-normal">
					Online Quiz
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li>
						<a href="a_home.php">
							<i class="ti-panel"></i>
								<p>Home</p>
						</a>
					</li>
					<li class="active">
						<a href="course.php">
							<i class="ti-panel"></i>
								<p>Course</p>
						</a>
					</li>
					<li>
						<a href="subject.php">
							<i class="ti-panel"></i>
								<p>Subject</p>
						</a>
					</li>
					<li>
						<a href="teacher.php">
							<i class="ti-panel"></i>
								<p>Teacher</p>
						</a>
					</li>
					<li>
						<a href="student.php">
							<i class="ti-panel"></i>
								<p>Student</p>
						</a>
					</li>
					
					<li>
						<a href="changepassword.php">
							<i class="ti-key"></i>
							<p>
									Change Password
							</p>
						</a>
					</li>
					<li>
						<a href="logout.php">
							<i class="ti-share"></i>
							<p>
									Logout
							</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-minimize">
						<button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
						<p class="navbar-brand">
							<b>WELCOME <?php echo $n ?></b>
						</p>
						
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="margin-top: 0px; padding-top: 0px;padding-left: 0px;">
				<div class="responsive-cards" style="width: 50%; margin-left: auto; margin-right: auto; border-radius: 7px;">
				<div class="">
							<form method="post">
								<div class="card" data-background="color" data-color="blue">
									<div class="card-header">
										<h3 class="card-title">Edit Course</h3>
									</div>
									<div class="card-content">
										<div class="form-group">
											<label>Course ID</label>
											<input type="text" placeholder="Course ID" name="username" value="<?php echo $id?>" class="form-control input-no-border">
										</div>
										<div class="form-group">
											<label>Course Name</label>
											<input type="text" placeholder="Course Name" name="password" value="<?php echo $c_name?>"class="form-control input-no-border">
										</div>
									
										<div class="form-group">
											<label>Branch</label>
											<select name="branch" value="<?php echo $branch?>" class="form-control input-no-border">
												<option value="NA" <?php if($branch=="NA")echo "selected"?> >NA</option>
												<option value="CS"<?php if($branch=="CS")echo "selected"?> >CS</option>
												<option value="IT"<?php if($branch=="IT")echo "selected"?> >IT</option>
											</select>
										</div>
										<div class="form-group">
											<label>Year</label>
											<select name="year" value="<?php echo $year?>" class="form-control input-no-border">
												<option value="1" <?php if($year==1)echo "selected"?>>1</option>
												<option value="2"<?php if($year==2)echo "selected"?>>2</option>
												<option value="3"<?php if($year==3)echo "selected"?>>3</option>
												<option value="4"<?php if($year==4)echo "selected"?>>4</option>
											</select>
										</div>
									</div>
									<div class="card-footer text-center">
										<button type="submit" value="login" name="submit" class="btn btn-fill btn-wd ">UPDATE</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php
						if(isset($_POST["submit"])){
							$not="Fill all fields !!";
							$c_id=$_POST['username'];
							$c_name=$_POST['password'];
							$branch=$_POST['branch'];
							$year=$_POST['year'];
							echo $year;
							$query=mysqli_query($con,"UPDATE course SET c_id='$c_id', c_name='$c_name', branch='$branch', year='$year' WHERE c_id='$c_id'");
							if($query){
								//echo "<script type='text/javascript'>alert('Successfully Updated!')</script>";
								header("Location: course.php");
							}
							else
								echo "<script type='text/javascript'>alert('ERROR!')</script>";
						}
					?>
			</div>
			<footer class="footer" style="border: 0px;">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="new.html">
                    About
                </a>
							</li>
						</ul>
					</nav>
					<div class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>, made with <i class="fa fa-heart heart"></i> by Team MCA
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="assets/js/es6-promise-auto.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="assets/js/bootstrap-datetimepicker.js"></script>

<!--  Select Picker Plugin -->
<script src="assets/js/bootstrap-selectpicker.js"></script>

<!--  Switch and Tags Input Plugins -->
<script src="assets/js/bootstrap-switch-tags.js"></script>

<!-- Circle Percentage-chart -->
<script src="assets/js/jquery.easypiechart.min.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>

<!-- Vector Map plugin -->
<script src="assets/js/jquery-jvectormap.js"></script>

<!-- Wizard Plugin    -->
<script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="assets/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="assets/js/jquery.datatables.js"></script>

<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		demo.initOverviewDashboard();
		demo.initCirclePercentage();

	});
</script>

</html>
