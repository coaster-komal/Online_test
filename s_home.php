<?php
	session_start();
	if(!isset($_SESSION["sess_user"])){
		header("location:index.php");
	}
	$user=$_SESSION['sess_user'];
	$n=$_SESSION['sess_name'];
<<<<<<< HEAD
=======
	// echo "LOGGED IN USER IS -----";
	// echo $user;

	/*if(!isset($_GET)) {
		$topic =$_GET['user_id'];
		echo "Get". $topic ;
	}*/
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
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
					<li class="active">
						<a href="home.php">
	              <i class="ti-panel"></i>
								<p>Home</p>
	          </a>
					</li>
					
					<li>
<<<<<<< HEAD
						<a href="view_user_result.php">
=======
						<a href="produce_result.php">
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
                <i class="ti-clipboard"></i>
                <p>
									Results
                </p>
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
						<button onclick="location.href='start_test.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px; margin-right: 20px;padding: 10px 15px;" class="btn btn-success hidden-md hidden-lg pull-right">
							Start Test
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<button onclick="location.href='start_test.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px;padding: 10px 15px;" class="btn btn-success hidden-sm">
									Start Test
                </button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="margin-top: 0px; padding-top: 0px;padding-left: 0px;">
<<<<<<< HEAD
				<div class="responsive-cards" style="float: left; margin: 7px; margin-left: 2%; background-color: #BDCFB7; border-radius: 7px;">
					<h3 style="padding: 10px;">Notification:</h3>
					<?php
						$con=mysqli_connect('localhost','root','') or die(mysql_error());
						mysqli_select_db($con,'online_test') or die("cannot select DB");
						$q=mysqli_query($con,"select n.t_id,n.time_date,n.comment,c.s_name from student s,subject c,notification n where s.course=c.c_id and c.s_id=n.sub_id and s.user_id='$user'");
						if(!$q)
							echo "No notification for you !!";
						else
						{
						while ($r=mysqli_fetch_row($q))
						{
							$q1=mysqli_query($con,"select t_name from teacher where user_id='$r[0]'");
							$r1=mysqli_fetch_row($q1);
							?>
							
							<div class='card' style='margin: 6px; margin-bottom: 15px;' >
								<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;'><?php echo $r[3];?></h4></div>
								<hr style='margin: 0px;'>
								<div class='' style='width: 100%;'>
									<div class='card-body' style='padding: 10px;'><b>Date :</b> <?php echo $r[1];?></div>
									<div class='card-body' style='padding: 10px;'><b>By : </b> <?php echo $r1[0];?> </div>
									<div class='card-body' style='padding: 10px;'><b>Comment : </b> <?php echo $r[2];?> </div>
								</div>
							</div>
							<?php
						}
						}
					?>
				</div>
			<div class="responsive-cards" style="float: left; margin: 7px; background-color: #F3EBD6; border-radius: 7px;">
				<h3 style="padding: 10px;">Your Active Test:</h3>
				<?php
						$query1=mysqli_query($con,"select now() from DUAL");
						$val = mysqli_fetch_array($query1);
						$value=date("Y-m-d", strtotime($val[0]));
						$query=mysqli_query($con,"select t.test_id,t.test_name,t.duration,sub.s_name from student s,course c,subject sub,test t where s.course=c.c_id and c.c_id=sub.c_id and sub.s_id=t.sub_id and t.active=1 and s.user_id='$user' and t.start_date='$value'");
						if($query)
						{
							while($row=mysqli_fetch_row($query))
							{
								$id=$row[0];

								echo "<div class='card' style='margin: 6px; margin-bottom: 15px;' >
									<a href='testPage.php?id=$id'>
										<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;'>$row[1]</h4></div>
										<hr style='margin: 0px;'>
										<div class='' style='width: 100%;'>
											<div class='card-body' style='padding: 10px;'><b>Duration :</b> $row[2]</div>
											<div class='card-body' style='padding: 10px;'><b>Suject : </b> $row[3] </div>
										</div>
									</a>
								</div>";
							}
						}
						else
						{
							echo "<div class='card-body' style='padding: 10px;'><h6 style='margin: 0px;'> No active test for you !!</h6></div>";
						}
=======

			<div class="responsive-cards" style="float: left; margin: 7px; margin-left: 2%; background-color: #BDCFB7; border-radius: 7px;">
				<h3 style="padding: 10px;">Comming Soon Tests:</h3>
				<?php
						$pub=1;
						$con=mysqli_connect('localhost','root','') or die(mysql_error());
						mysqli_select_db($con,'online_test') or die("cannot select DB");
						$query1=mysqli_query($con,"select now() from DUAL");
								$val = mysqli_fetch_array($query1);
								$sec1=$val[0];
								$query=mysqli_query($con,"SELECT * FROM tests WHERE type='$pub' and endTest_datetime>'$sec1' and user_id<>'$user'");

								if($query)
								{
									$numrows=mysqli_num_rows($query);
									if($numrows>0)
									{
						while ($row=mysqli_fetch_row($query))
						{
							$id=$row[0];

							echo "<div class='card' style='margin: 6px; margin-bottom: 15px;' >
								 <a href='testPage.php?id=$id'>
								<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;'>$row[2]</h4></div>
								<hr style='margin: 0px;'>
								<div class='' style='width: 100%;'>
									<div class='card-body' style='padding: 10px;'><b>Start Time :</b> $row[5]</div>
									<div class='card-body' style='padding: 10px;'><b>End Time : </b> $row[6] </div>
									<div class='card-body' style='padding: 10px;'><b>Questions : </b> $row[4] </div>
								</div>
								</a>
							</div>";
						}
					}
						else
						{
							echo "<div class='card-body' style='padding: 10px;'><h6 style='margin: 0px;'>NO UPCOMING PUBLIC TEST </h6></div>";
						}
					}
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
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
