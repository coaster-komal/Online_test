<?php
	session_start();
	if(!isset($_SESSION["sess_user"])){
		header("location:index.php");
	}
	
	$user=$_SESSION['sess_user'];
	$n=$_SESSION['sess_name'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"select * from notification where t_id='$user'");
	
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
	<link rel="stylesheet" href="assets/css/timeline.min.css" />
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
						<p class="navbar-brand">
							<b>WELCOME <?php echo $n ?></b>
						</p>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
<<<<<<< HEAD
							<button onclick="location.href='add_notification.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px;padding: 10px 15px;" class="btn btn-success hidden-sm">
									Add Notifications
                </button>
=======
							
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="margin-top: 0px; padding-top: 0px;padding-left: 0px;">
			<div class="responsive-cards" style="float: left; margin: 7px; margin-left: 2%; background-color: #BDCFB7; border-radius: 7px;">
<<<<<<< HEAD
				
               
				<h3 style="padding: 10px;">Timeline:</h3>
                 
                  
                   <?php 
						while($row=mysqli_fetch_row($query))
						{
							$s_id=$row[2];
							$query1=mysqli_query($con,"select s_name,c_id from subject where s_id='$s_id'");
							$row1=mysqli_fetch_row($query1);
							$name=$row1[0];
							$query1=mysqli_query($con,"select * from course where c_id='$row1[1]'");
							$row1=mysqli_fetch_row($query1);
							
						?>
						<div class='card' style='margin: 6px;margin-bottom: 15px;' >
							<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;'><?php echo $name ?></h4></div>
							<hr style='margin: 0px;'>
							<div class='' style='width: 100%;'>
								<div class='card-body' style='padding: 5px;'><b>Course : </b><?php echo $row1[1] ?></div>
								<div class='card-body' style='padding: 5px;'><b>Branch : </b><?php echo $row1[2] ?></div>
								<div class='card-body' style='padding: 5px;'><b>Year : </b><?php echo $row1[3] ?></div>
								<div class='card-body' style='padding: 5px;'><b>Comment : </b><?php echo $row[4] ?></div>
							</div>
						</div>
                   <?php
                   }
                   ?>
				   
				   </div>
=======
				<h3 style="padding: 10px;">Tests:</h3>
				
				</div>
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
				<div class="responsive-cards" style="float: left; margin: 7px; background-color: #F3EBD6; border-radius: 7px;">
					<h3 style="padding: 10px;">Todays Test:</h3>
					<form method="post">
					<?php
<<<<<<< HEAD
							$query1=mysqli_query($con,"select now() from DUAL");
							$val = mysqli_fetch_array($query1);
							$value=date("Y-m-d", strtotime($val[0]));
=======
							$con=mysqli_connect('localhost','root','') or die(mysql_error());
							mysqli_select_db($con,'online_test') or die("cannot select DB");
							$query=mysqli_query($con,"SELECT t.test_id,t.test_name,t.duration,t.total_ques,s.s_name FROM test t,subject s WHERE s.t_id='$user' and t.sub_id=s.s_id");
							$numrows=mysqli_num_rows($query);
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac

							$query=mysqli_query($con,"SELECT t.test_id,t.test_name,t.duration,t.total_ques,s.s_name,t.active FROM test t,subject s WHERE s.t_id='$user' and t.sub_id=s.s_id and t.start_date='$value'");
							$numrows=mysqli_num_rows($query);
							$act=0;
							if($numrows>0)
							{
							while ($row=mysqli_fetch_row($query))
							{
								$id=$row[0];
<<<<<<< HEAD
								$act=$row[5];
								?>
								<div class='card' style='margin: 6px;margin-bottom: 15px;' >
									 <a href='editTest.php?id=$id'>
									<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;'><?php echo $row[1];?></h4></div>
									<hr style='margin: 0px;'>
									<div class='' style='width: 100%;'>
										<div class='card-body' style='padding: 10px;'><b>Duration : </b><?php echo $row[2];?> </div>
										<div class='card-body' style='padding: 10px;'><b>Subject : </b><?php echo $row[4];?> </div>
										<div class='card-body' style='padding: 10px;'><b>Questions : </b><?php echo $row[3];?> </div>
=======
								echo "<div class='card' style='margin: 6px;margin-bottom: 15px;' >
									 <a href='editTest.php?id=$id'>
									<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;'>$row[1]</h4></div>
									<hr style='margin: 0px;'>
									<div class='' style='width: 100%;'>
										<div class='card-body' style='padding: 10px;'><b>Duration : </b> $row[2] </div>
										<div class='card-body' style='padding: 10px;'><b>Subject : </b> $row[4] </div>
										<div class='card-body' style='padding: 10px;'><b>Questions : </b> $row[3] </div>
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
									</div>
									</a>
									<div class='card-footer'>
								<button type='submit' value=<?php echo $id;?> name='active' class='btn btn-info btn-fill pull-right' style="display:<?php if($act==1) echo "none";?>;">Activate</button>
								<button type='submit' value=<?php echo $id;?> name='deactive' class='btn btn-info btn-fill-danger pull-right' style="display:<?php if($act==0) echo "none";?>;">Deactivate</button>
								<div class='clearfix'></div>
							</div>
								</div>
								<?php
							}
							}
							else
							{
								echo "<div class='card-body' style='padding: 10px;'><h6 style='margin: 0px;'>No test created by you for today !!</h6></div>";
							}
				?>
				</form>
				<?php
					if(isset($_POST['active']))
					{
						$t_id=$_POST['active'];
						$query=mysqli_query($con,"update test set active=1 where test_id='$t_id'");
						echo "<script type='text/javascript'>alert('Activated Test!')</script>";
						echo("<script>location.href = '".home.".php';</script>");
					}
					if(isset($_POST['deactive']))
					{
						$t_id=$_POST['deactive'];
						$query=mysqli_query($con,"update test set active=0 where test_id='$t_id'");
						echo "<script type='text/javascript'>alert('Deactivated Test!')</script>";
						echo("<script>location.href = '".home.".php';</script>");
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
<script>
$(document).ready(function(){
 jQuery('.timeline').timeline({
  mode: 'horizontal',
  visibleItems: 4
  //Remove this comment for see Timeline in Horizontal Format otherwise it will display in Vertical Direction Timeline
 });
});
</script>
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/timeline.min.js"></script>

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
