<?php
	session_start();
	$user=$_SESSION['sess_user'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"select * from subject where t_id='$user'");
	$que=mysqli_query($con,"SELECT * FROM course");
	
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
					<li >
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
					<li class="active">
						<a href="addstudent.php">
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
						<a class="navbar-brand" href="add_notification.php">
							Add Student
						</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						
						</ul>
					</div>
				</div>
			</nav>
			<div class="content">
				<div style="width: 60%; margin-left: auto; margin-right: auto;">
					<div class="card">
						<form method="post">
							<div class="card-header">
								<h4 class="card-title">
										Add Student
									</h4>
							</div>
							<div class="card-content">
								<div class="form-group">
									<label class="control-label">
										User Handle <star>*</star>
									</label>
									<input type="text" name="userh" placeholder="User Handle" class="form-control">
								</div>
								<div class="form-group">
									<label class="control-label">
										User Name <star>*</star>
									</label>
									<input type="text" name="username" placeholder="User Name" class="form-control">
								</div>
								<div class="form-group">
											<label>Course</label>
											<select name="course" class="form-control input-no-border">
											<?php
												while($row=mysqli_fetch_row($que))
												{
													echo "<option value='$row[0]'>$row[0]  $row[1]  $row[2]  $row[3]</option>";
												}
											?>
											</select>
										</div>
								<div class="form-group">
									<label class="control-label">
										Password <star>*</star>
									</label>
									<input type="text" name="pass" placeholder="Password" class="form-control" pattern=".{5-15}">
								</div>
				
								<div class="form-group">
									<label class="control-label">
											Joining Year <star>*</star>
									</label>
									<input class="form-control" name="jyear" placeholder="Joining Year" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<br>
								<div class="category">
									<star>*</star> Required fields</div>
							</div>
							<div class="card-footer">
								<button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Submit</button>
								<button type="reset" style="margin-right: 20px;" class="btn btn-danger btn-fill pull-right">Reset</button>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
	<?php

		if(isset($_POST["submit"]))
		{
			$uname=$_POST['username'];
			$userh=$_POST['userh'];
			$pass=$_POST['pass'];
			$jyear=$_POST['jyear'];
			$id=$_POST['course'];
			$type="student";
			$sql="insert into user(u_handle,u_pass,type) values ('$userh','$pass','$type')";
			if ($con->query($sql) === TRUE) {
						$last_id = mysqli_insert_id($con);
						$query=mysqli_query($con,"insert into student values ('$last_id','$uname','$id','$jyear')");
						if(query)
							echo "<script type='text/javascript'>alert('Student Added!')</script>";
			}
			else
				echo "<script type='text/javascript'>alert('Student already exist!')</script>";

		}
	?>
			<footer class="footer">
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
<script type="text/javascript">
	$().ready(function() {
		demo.initFormExtendedDatetimepickers();
	});
</script>

</html>
