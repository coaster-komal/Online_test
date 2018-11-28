<?php
	session_start();
	if(!isset($_SESSION["sess_user"])){
		header("location:index.php");
	}
	$user=$_SESSION['sess_user'];
	$n=$_SESSION['sess_name'];
	$a="teacher";
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"SELECT * FROM course");
	$query1=mysqli_query($con,"SELECT * FROM user WHERE type='$a'");
	// echo "LOGGED IN USER IS -----";
	// echo $user;

	/*if(!isset($_GET)) {
		$topic =$_GET['user_id'];
		echo "Get". $topic ;
	}*/
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
					<li >
						<a href="course.php">
							<i class="ti-panel"></i>
								<p>Course</p>
						</a>
					</li>
					<li class="active">
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
<<<<<<< HEAD
						<a href="addstudent.php">
=======
						<a href="student.php">
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
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
			<div class="content" style="margin-top: 0px;">

<<<<<<< HEAD
			<div class="responsive-cards" style='width: 60%;'>
=======
			<div class="responsive-cards" style='width: 40%;'>
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
				<?php  
							$con=mysqli_connect('localhost','root','') or die(mysql_error());
							mysqli_select_db($con,'online_test') or die("cannot select DB");
							$query2=mysqli_query($con,"SELECT * FROM course order by c_id,c_name,year,branch");
							$numrows=mysqli_num_rows($query2);

							if($numrows>0)
							while ($row=mysqli_fetch_row($query2))
							{
								$id=$row[0];  //style='margin: 6px;margin-bottom: 15px;'

<<<<<<< HEAD
								echo "<div class='card' style='width: 50%;' >
									 <a href='addstudent.php?id=$id'>
=======
								echo "<div class='card' style='width: 40%;' >
									 <a href='editSubject.php?id=$id'>
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
									<div class='card-body' style='padding: 2px;'><h5 style='margin: 0px;'><b>Course Id :</b>$row[0]</h5></div>
									<hr style='margin: 0px;'>
									<div class='' style='width: 100%;'>
										<div class='card-body' style='padding: 2px;'><b>Course Name :</b> $row[1]</div>
										<div class='card-body' style='padding: 2px;'><b>Branch: </b> $row[2] </div>
										<div class='card-body' style='padding: 2px;'><b>Year : </b> $row[3] </div>
									</div>
									</a>
								</div>";
							}
							else
							{
								echo "<div class='card-body' style='padding: 10px;'><h6 style='margin: 0px;'>NO Course Added</h6></div>";
							}
				?>
				</div>
				
					
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
