<?php
		 session_start();
		 $test_id=$_SESSION['sess_test'];
		 $count=$_SESSION['sess_ques'];
		 $z=1;

		 $no="SUCCESSFULLY EDITED ALL QUESTIONS !!";
		/* if($count==0)
		 {
			 echo "<script type='text/javascript'>alert('$no');</script>";
			 echo("<script>location.href = '".home.".php';</script>");
		 }*/
		 $con=mysqli_connect('localhost','root','') or die(mysql_error());
		 mysqli_select_db($con,'online_test') or die("cannot select DB");
		 $query=mysqli_query($con,"SELECT q.ques_id,q.ques_desc,q.opt1,q.opt2,q.opt3,q.opt4,q.curr_ans FROM questions q,ques_link ql WHERE ql.test_id='$test_id' and ql.q_id=q.ques_id");
		 $numrows=mysqli_num_rows($query);
		 $noques="NO QUESTIONS ADDED, FIRST ADD QUESTIONS !!";
		 if($numrows==0)
		 {
			 @$_SESSION['sess_start']=1;
			 echo "<script type='text/javascript'>alert('$noques');</script>";
			 echo("<script>location.href = '".select_type.".php';</script>");
		 }
		 $i=1;
		$j=0;
		$k=0;
		$questions=array();
		if($numrows>0)
		while ($row=mysqli_fetch_row($query))
		{
			$questions[$j]=array();
			$questions[$j][0]=$row[0];
			$questions[$j][1]=$row[1];
			$questions[$j][2]=$row[2];
			$questions[$j][3]=$row[3];
			$questions[$j][4]=$row[4];
			$questions[$j][5]=$row[5];
			$questions[$j][6]=$row[6];
			$i=$i+1;
			$j=$j+1;

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
								<li>
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
						<a class="navbar-brand" href="editquestions.php">
							Edit Questions
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
				<?php

					while($z<=$count)
					{
						$x=$z-1;
					?>
					<div class="card">
						<form method="post">
							<div class="card-header">
								<h4 class="card-title">
										Edit Question <?php echo $z ?>

									</h4>
							</div>
							<div class="card-content">
								<div class="form-group">
									<label class="control-label">
											Question Description <star>*</star>
									</label>
									<input class="form-control" name="desc" rows="3" value="<?php echo $questions[$x][1] ?>" default="0" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Option 1 <star>*</star>
									</label>
									<input class="form-control" name="op1" rows="3" value="<?php echo $questions[$x][2] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Option 2 <star>*</star>
									</label>
									<input class="form-control" name="op2" rows="3" value="<?php echo $questions[$x][3] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">								</div>
								<div class="form-group">
									<label class="control-label">
											Option 3 <star>*</star>
									</label>
                                    <input class="form-control" name="op3" rows="3" value="<?php echo $questions[$x][4] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">								</div>
								<div class="form-group">
									<label class="control-label">
											Option 4 <star>*</star>
									</label>
									<input class="form-control" name="op4" rows="3" value="<?php echo $questions[$x][4] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">								</div>
								<div class="form-group">
									<label class="control-label">
											Correct Answer <star>*</star>
									</label>
									<input class="form-control" name="curr_ans" rows="3" value="<?php echo $questions[$x][6] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">								</div>
								<br>
								<div class="category">
									<star>*</star> Required fields</div>
							</div>
							<div class="card-footer">
								<button type="submit" name="update" value="<?php echo $questions[$x][0] ?>"class="btn btn-info btn-fill pull-right">Update</button>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					<?php
						$z=$z+1;
					}
					?>



	<?php

		if(isset($_POST["update"]))
		{
			$qid=$_POST["update"];
			echo $qid;
			$updated="Question updated !!";
			$des=$_POST['desc'];
			$opt1=$_POST['op1'];
			$opt2=$_POST['op2'];
			$opt3=$_POST['op3'];
			$opt4=$_POST['op4'];
			$curr_ans=$_POST['curr_ans'];

			$con=mysqli_connect('localhost','root','');
			mysqli_select_db($con,'online_test') or die("cannot select DB");
			$sql=mysqli_query($con,"UPDATE questions SET ques_desc='$des',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',curr_ans='$curr_ans' where ques_id='$qid' ");
			if($sql)
			{
				echo "<script type='text/javascript'>alert('$updated');</script>";
				echo("<script>location.href = '".editquestions.".php';</script>");
			}

		
		}
	?>
		</div>
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
