<?php
	session_start();
	$user=$_SESSION['sess_user'];
	$n=$_SESSION['sess_name'];
	$id=$_SESSION['test_id'];
	
	//$id=44;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"SELECT * FROM test WHERE test_id='$id'");
	if($query)
	{
		$row=mysqli_fetch_row($query);
		$pt_curr=$row[6];
		$pt_neg=$row[7];
		$limit=$row[8];
		$totalq=$row[5];
		$c=0;
		$correct=0;
		$wrong=0;
		$flag=0;
		$n=$_SESSION['sess_name'];
		$query1=mysqli_query($con,"SELECT * FROM useranswer WHERE test_id='$id' and user_id='$user'");
		$numrows=mysqli_num_rows($query1);
		if($numrows>0)
		{
			while ($row=mysqli_fetch_row($query1))
			{
				if($row[3]==$row[4])
				{
					$c=$c+$pt_curr;
					$correct=$correct+1;
				}
				else
				{
					$c=$c-$pt_neg;
					$wrong=$wrong+1;
				}
			}
			if($c>=$limit)
				$flag=1;
		}
		$query2=mysqli_query($con,"insert into result (`user_id`, `test_id`, `username`, `result`) values ('$user','$id','$n','$c')");
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
						<a href="s_home.php">
	              <i class="ti-panel"></i>
								<p>Home</p>
	          </a>
					</li>
					<li class="active">
						<a href="view_user_result.php">
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
						<a class="navbar-brand" href="">
							Your Result
						</a>

					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						<li>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="padding-top: 5px; margin-top: 10px;">
						<div style="width: 60%; margin-left: auto; margin-right: auto;">
							<div class="card">
							<div class="card-header">
								<h4 class="card-title">
										<?php
											if($flag==1)
											{
												echo $n." you passed this test !!";
											}
											else
											{
												echo $n." you didn't pass this test !!";
											}
										?>
									</h4>
							</div>
							<div class="card-content">
								<div class='' style='width: 100%;'>
										<div class='card-body' style='padding: 10px;'><b>Your Score :</b> <?php echo $c ?></div>
										<div class='card-body' style='padding: 10px;'><b>Passing Limit :</b> <?php echo $limit ?> </div>
										<div class='card-body' style='padding: 10px;'><b>Total Questions : </b> <?php echo $totalq ?> </div>
										<div class='card-body' style='padding: 10px;'><b>Attempted Questions : </b> <?php echo $numrows ?> </div>
										<div class='card-body' style='padding: 10px;'><b>Correct Answers : </b> <?php echo $correct ?> </div>
										<div class='card-body' style='padding: 10px;'><b>Wrong Answers : </b> <?php echo $wrong ?> </div>
								</div>
							</div>
							</div>
						</div>
				</div>
				<br><br>
				<hr>
			</div>

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
	<?php
	$query=mysqli_query($con,"delete from useranswer where test_id='$id'");
	unset($_SESSION['test_id']);
	unset($_SESSION['ques_num']);
	unset($_SESSION['start_num']);
	unset($_SESSION['duration']);
	?>
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
