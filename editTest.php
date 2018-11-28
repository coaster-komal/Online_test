<?php
		 session_start();
		 $user=$_SESSION['sess_user'];
		 $_SESSION['sess_test']=$_GET["id"];
		 $id=$_GET["id"];
		 $con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,'online_test') or die("cannot select DB");
		$query1=mysqli_query($con,"select * from subject where t_id='$user'");
		$query=mysqli_query($con,"SELECT t.test_id,t.test_name,t.start_date,t.duration,t.total_ques,t.pt_curr,t.pt_neg,t.pass_limit FROM test t,subject s WHERE t.test_id='$id' and t.sub_id=s.s_id");
		$numrows=mysqli_num_rows($query);
		if($numrows>0)
		{
			$row=mysqli_fetch_row($query);
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
						<a href="home.php">
	              <i class="ti-panel"></i>
								<p>Home</p>
	          </a>
					</li>
					<li class="active">
						<a data-toggle="collapse" href="#componentsExamples">
							<i class="ti-ruler-pencil"></i>
							<p>Tests
							   <b class="caret"></b>
							</p>
						</a>
						<div class="collapse in" id="componentsExamples">
							<ul class="nav">
								<li >
									<a href="create_test.php">
										<span class="sidebar-mini">CT</span>
										<span class="sidebar-normal">Create Test</span>
									</a>
								</li>
								<li class="active">
									<a href="view_test.php">
										<span class="sidebar-mini">VT</span>
										<span class="sidebar-normal">View/Edit test</span>
									</a>
								</li>
								<li>
									<a href="delete_test.php">
										<span class="sidebar-mini">DT</span>
										<span class="sidebar-normal">Delete test</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a href="produce_result.php">
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
						<a class="navbar-brand" href="editTest.php">
							Edit Test
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
			<div class="content">
				<div style="width: 60%; margin-left: auto; margin-right: auto;">
					<div class="card">
						<form method="post">
							<div class="card-header">
								<h4 class="card-title">
										Edit Test
									</h4>
							</div>
							<div class="card-content">
								<div class="form-group">
									<label class="control-label">
											Name <star>*</star>
									</label>
									<input class="form-control" name="testname" value="<?php echo $row[1] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								
								<div class="form-group">
									<label class="control-label">
											Total Questions <star>*</star>
									</label>
									<input class="form-control" name="totalq" value="<?php echo $row[4] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Correct Answers Marks
									</label>
									<input class="form-control" name="curr_ans" value="<?php echo $row[5] ?>" default="1" value="1" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Worng Answers Penalty
									</label>
									<input class="form-control" name="wng_ans" value="<?php echo $row[6] ?>" default="0" value="0" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Passing Marks
									</label>
									<input class="form-control" name="limit" value="<?php echo $row[7] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Start Date <star>*</star>
									</label>
									<input type="text" name="start_date" value="<?php echo $row[2] ?>" placeholder="Start Date and Time" />
								</div>
								<div class="form-group">
									<label class="control-label">
											Duration <star>*</star>
											<h7>Select Duration in AM</h7>
									</label>
									<input type="text" name="duration" value="<?php echo $row[3] ?> "class="form-control timepicker" placeholder="End Date and Time" />
								</div>
								<br>
								<div class="category">
									<star>*</star> Required fields</div>
							</div>
							<div class="card-footer">
								<button type="submit" name="update" class="btn btn-info btn-fill pull-right">UPDATE</button>

								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
<?php
			 if(isset($_POST["update"]))
			 {
				 $cannot="Change values to update";
				 $updated="Updated values !!";
			 	

					$test_name=$_POST['testname'];
			 		
			 		$totalq=$_POST['totalq'];
			 		$start_date=$_POST['start_date'];
			 		$duration=$_POST['duration'];
			 		$curr_ans=$_POST['curr_ans'];
			 		$wng_ans=$_POST['wng_ans'];
			 		$limit=$_POST['limit'];
					$start_date=date("Y-m-d", strtotime($start_date));
			 		$sql=mysqli_query($con,"UPDATE `test` SET test_name='$test_name', total_ques='$totalq', start_date='$start_date', duration='$duration', pt_curr='$curr_ans', pt_neg='$wng_ans', pass_limit='$limit' WHERE test_id='$id'");
					if($sql)
					{
						echo "<script type='text/javascript'>alert('$updated');</script>";
						@$_SESSION['sess_test']=$id;
						@$_SESSION['sess_ques']=$totalq;
						echo("<script>location.href = '".editquestions.".php';</script>");
						//<script> location.replace("addquestions.php"); </script>
						//header('Location: editquestions.php');
					}

			 	
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
