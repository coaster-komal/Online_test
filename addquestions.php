<?php
		 session_start();
		 $test_id=$_SESSION['sess_test'];
		 $count=$_SESSION['sess_ques'];
		 $start=$_SESSION['sess_start'];
		 if($count==0)
		 {
			 unset($_SESSION['sess_test']);
				unset($_SESSION['sess_ques']);
			header("Location: home.php");
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
								<li class="active">
									<a href="create_test.php">
										<span class="sidebar-mini">CT</span>
										<span class="sidebar-normal">Create Test</span>
									</a>
								</li>
								<li>
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
						<a class="navbar-brand" href="addquestions.php">
							Add Questions
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
										Add Question <?php echo $start;?>
									</h4>
							</div>
							<div class="card-content">
								<div class="form-group">
									<label class="control-label">
											Question Description <star>*</star>
									</label>
									<textarea name="desc" maxlength="700" class="form-control" placeholder="Enter Question" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
											Option 1 <star>*</star>
									</label>
									<textarea name="op1" maxlength="200" class="form-control" placeholder="Option 1" rows="1"></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
											Option 2 <star>*</star>
									</label>
									<textarea name="op2" maxlength="200" class="form-control" placeholder="Option 2" rows="1"></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
											Option 3 <star>*</star>
									</label>
									<textarea name="op3" maxlength="200" class="form-control" placeholder="Option 3" rows="1"></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
											Option 4 <star>*</star>
									</label>
									<textarea name="op4" maxlength="200" class="form-control" placeholder="Option 4" rows="1"></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">
											Correct Answer <star>*</star>
									</label>
									<textarea name="curr_ans" name="curr_ans" maxlength="200" class="form-control" placeholder="Answer" rows="1"></textarea>
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
		 echo "test_id=".$test_id."count=".$count;
		?>
	<?php

		if(isset($_POST["submit"])){
		if($count>0 &&!empty($_POST['desc']) && !empty($_POST['op1']) && !empty($_POST['op2'])&& !empty($_POST['op3'])&& !empty($_POST['op4']) && !empty($_POST['curr_ans']))
		{

			$des=$_POST['desc'];
			$opt1=$_POST['op1'];
			$opt2=$_POST['op2'];
			$opt3=$_POST['op3'];
			$opt4=$_POST['op4'];
			$curr_ans=$_POST['curr_ans'];
			echo $des;
			echo $opt1;
			echo $opt2;
			echo $opt3;
			echo $opt4;

			$con=mysqli_connect('localhost','root','');
			mysqli_select_db($con,'online_test') or die("cannot select DB");
			$sql="insert into questions(ques_desc,opt1,opt2,opt3,opt4,curr_ans) values ('$des','$opt1','$opt2','$opt3','$opt4','$curr_ans')";
			if ($con->query($sql) === TRUE) {
				echo "abcd";
						$last_id = mysqli_insert_id($con);
						mysqli_query($con,"insert into ques_link values ('$test_id','$last_id')");

			--$count;
<<<<<<< HEAD
			++$start;
=======
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
			}
			@$_SESSION['sess_ques']=$count;
			@$_SESSION['sess_start']=$start;
			echo "<script type='text/javascript'>alert('$start question added!!')</script>";
			echo "<p align=center>Question Added Successfully.</p>";
			if($count==0)
			{
				unset($_SESSION['sess_test']);
				unset($_SESSION['sess_ques']);
				//header("Location: home.php");
				echo("<script>location.href = '".home.".php';</script>");
			}
		}
		else{
			if($count<1)
			{
				unset($_SESSION['sess_test']);
				unset($_SESSION['sess_ques']);
				echo("<script>location.href = '".home.".php';</script>");
			}
			else
				echo"ENTER REQUIRED FIELDS !!";
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
