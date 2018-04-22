<?php
ob_start();
session_start();
$id=$_GET['id'];
@$_SESSION["tn"]=$id;
			$con=mysqli_connect('localhost','root','') or die(mysql_error());
			mysqli_select_db($con,'online_test') or die("cannot select DB");
			$query5=mysqli_query($con,"select * from tests where test_id='$id'");
			$row=mysqli_fetch_row($query5);
			$test_n=$row[2];
			$total_marks=$row[4]*$row[7];
							$query=mysqli_query($con,"SELECT * FROM result WHERE test_id='$id'");
							$numrows=mysqli_num_rows($query);
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
				<a href="http://javascript:void(0)" class="simple-text logo-mini">
					OQ
				</a>
				<a href="http://javascript:void(0)" class="simple-text logo-normal">
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
					<li>
						<a data-toggle="collapse" href="#componentsExamples">
							<i class="ti-ruler-pencil"></i>
							<p>Tests
							   <b class="caret"></b>
							</p>
						</a>
						<div class="collapse" id="componentsExamples">
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
										<span class="sidebar-normal">Delete Test</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="active">
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
						<a class="navbar-brand" href="produce_result.php">
							Result
						</a>
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
			<div class="content">
				<div class='card-body' style='padding: 10px;'>
				<h2 style='text-align: center;'><?php echo $test_n ?></h2>
				<h5 style='text-align: center;'>Total Marks :<?php echo $total_marks ?></h5>
				</div><br>
				<div class='card' style='width: 60%; margin-left: auto; margin-right: auto;' >
								<div class="table-responsive">
									<table class="table">
									    <thead>
									        <tr>
									            <th class="text-center">#</th>
									            <th>Name</th>
									            <th>Marks</th>
									        </tr>
									    </thead>
									    <tbody>
													<?php
														while($row = mysqli_fetch_array($query))
														{
															echo '
															<tr>
																<td class="text-center">'.$id.'</td>
																<td>'.$row[2].'</td>
																<td>'.$row[3].'</td>
															</tr>
															';
														}
													?>
									    </tbody>
									</table>
								</div>
				</div>
				<div style="text-align: center;">
					<button onclick="location.href='export.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: auto;margin-bottom: 16px;margin-left: auto; padding: 10px 15px;" class="btn btn-info">
						Download
					</button>
				</div>
					<!--form method="post">
					<button type='submit' action="export.php" name='download' class='btn btn-danger data-active-color btn-fill pull-right'>Download Result</button>
					</form-->
				</div>
<!--?php
					if(isset($_POST["download"]))
					{
						$con=mysqli_connect('localhost','root','') or die(mysql_error());
						mysqli_select_db($con,'online_test') or die("cannot select DB");
						$query=mysqli_query($con,"SELECT username, result FROM result WHERE test_id='$id'");
						$numrows=mysqli_num_rows($query);
						$output='';
						/*$output .= '
							<table class="table" bordered="1">
							<tr>
								<th>Test Name : $test_n</th>
								<th>Total Marks : $total_marks</th>
							</tr>
							<tr></tr>';*/
							$columnHeader = '';
							$columnHeader = "Username" . "\t" . "Marks" ."\t";
							$setData = '';
							while ($rec = mysqli_fetch_row($query)) {
							$rowData = '';
							foreach ($rec as $value) {
							$value = '"' . $value . '"' . "\t";
							$rowData .= $value;
							}
							$setData .= trim($rowData) . "\n";
							}
						/*if($numrows > 0)
						{
							$output .= '<table class="table" bordered="1">
							<tr>
								<th>Username</th>
								<th>Marks</th>

							</tr>';
						while($row = mysqli_fetch_array($query))
						{
							$output .= '
							<tr>
								<td>'.$row["2"].'</td>
								<td>'.$row["3"].'</td>
							</tr>';
						}
						$output .= '</table>';*/
						header('Content-Type: application/octet-stream');
						header('Content-Disposition: attachment; filename=download.xls');
						header("Pragma: no-cache");
						header("Expires: 0");
						echo ucwords($columnHeader) . "\n" . $setData . "\n";
						//echo $output;
						}

?-->

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

</html>
