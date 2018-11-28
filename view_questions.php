<?php
		 session_start();
		 ob_start();
		 $user=$_SESSION['sess_user'];
		 $test_id=$_SESSION['sess_test'];
		 $count=$_SESSION['sess_ques'];
		 if($count==0)
		 {
			 unset($_SESSION['sess_test']);
			 unset($_SESSION['sess_ques']);
			 //echo "<script type='text/javascript'>alert('Test Sucessfully Created!!')</script>";
			header("Location: home.php");
		 }
		$con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,'online_test') or die("cannot select DB");
		$query=mysqli_query($con,"SELECT * FROM ques_link WHERE test_id='$test_id'");
		$c=mysqli_num_rows($query);
		if($c>=$count)
		{
			echo "<script type='text/javascript'>alert('$count questions added!!')</script>";
			header("Location: home.php");
		}
		else
		{
			$a=$count-$c;
			echo "<script type='text/javascript'>alert('$a questions still left!!')</script>";
		}
		$query=mysqli_query($con,"SELECT * FROM subject WHERE t_id='$user'");
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
							Add Question
						</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						
						</ul>
					</div>
				</div>
			</nav>
			<div class="content">
			<div class='card-body' style='padding: 10px;'>
				<h5 style='text-align: center;'>Test ID: <?php echo $test_id ?></h5>
				<h5 style='text-align: center;'>Question Count :<?php echo $count ?></h5>
				</div>
			<div class='card-body' style='padding: 10px;'>
			<form class="navbar-center navbar-search-form" role="search" method="post">
					<div class="form-group" style='text-align: center;'>
						<h4><label>Select Subject</label></h4>
							<select name="subject" class="form-control" >
											<?php
												while($row=mysqli_fetch_row($query))
												{
													echo "<option value='$row[0]'>$row[0]  $row[1]</option>";
												}
											?>
							</select>
							<button type="submit" name="submit" style="margin-left: 10px;margin-top: 10px; height: 40px;" class="btn btn-fill btn-wd ">Select</button>
					</div>
				<br>
				<?php
				//<label class='form-check-label' for='materialUnchecked'>Material unchecked</label>
					if(isset($_POST["submit"]))
					{
						$sub=$_POST["subject"];
						$query1=mysqli_query($con,"select qs.ques_id,qs.ques_desc from test t,ques_link q,questions qs where t.sub_id='$sub' and t.test_id=q.test_id and q.q_id=qs.ques_id");
						echo "<div class='card' style='width: 90%; margin-left: auto; margin-right: auto;' >
								<div class='table-responsive'>
									<table class='table'>
									    <thead style='background-color:#BDCFB7;'>
									        <tr>
									            <th class='text-center'>ID</th>
									            <th>Description</th>
												<th class='text-right'>Select</th>
									        </tr>
									    </thead>
									    <tbody>";
													
														while($row = mysqli_fetch_array($query1))
														{
															?>
															<tr>
																<td class='text-center'><?php echo $row[0];?></td>
																<td><?php echo $row[1];?></td>
																<td><div class='form-check'>
																	<input style='float:right;' name='check[]' value=<?php echo $row[0];?> type='checkbox' class='form-check-input'>
																	
																</div></td>
															</tr>
															<?php
														}
									   echo " </tbody>
									</table>
								</div>
				</div>
				<div style='text-align: center;'>
					<button type='submit' name='insert' style='line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: auto;margin-bottom: 16px;margin-left: auto; padding: 10px 15px;' class='btn btn-info'>
						Use Question
					</button>
				</div>";
					}
				?>
				</form>
				<?php
					if(isset($_POST['insert']))
					{
							
						if(!empty($_POST['check']))
						{
							
							foreach($_POST['check'] as $selected)
							{
								
							
								$q=mysqli_query($con,"select * from ques_link where test_id='$test_id'");
								$numrows=mysqli_num_rows($q);
								if($numrows<$count)
								{
									$q1=mysqli_query($con,"insert into ques_link values('$test_id','$selected')");
									
								}
								else
								{
									unset($_SESSION['sess_test']);
									unset($_SESSION['sess_ques']);
									echo "<script type='text/javascript'>alert('Test Successfully Created!!')</script>";
									echo("<script>location.href = '".home.".php';</script>");
								}
								if($numrows==$count)
								{
									unset($_SESSION['sess_test']);
									unset($_SESSION['sess_ques']);
									echo "<script type='text/javascript'>alert('Test Successfully Created!!')</script>";
									echo("<script>location.href = '".home.".php';</script>");
								}
							}
						}
						else
							echo "<script type='text/javascript'>alert('Select any option first!!')</script>";
					}
					
				
				?>
				</div><br>
				
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
