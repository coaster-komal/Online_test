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
	<script>
	function validateForm() {
	    var x = document.forms["login"]["username"].value;
			var y = document.forms["login"]["password"].value;
	    if (x == "") {
	        alert("Login ID must be filled out.");
	        return false;
	    }
			if (y == "") {
	        alert("Password must be filled out");
	        return false;
	    }
			return true;
	}
	</script>
</head>

<body>
	<nav class="navbar navbar-transparent navbar-absolute">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
				<p class="navbar-brand">Online Test</p>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="register.php">
	                Register
	           </a>
					</li>
					<li>
						<a href="new.html">
                About
            </a>
					</li>
					<li>
						<a href="feedback.php">
                Feedback
            </a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="wrapper wrapper-full-page">
		<div class="full-page login-page" data-color="" data-image="assets/img/background/background-2.jpg">
			<!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
							<form method="post" name="login" onsubmit="return validateForm()">
								<div class="card" data-background="color" data-color="blue">
									<div class="card-header">
										<h3 class="card-title">Login</h3>
									</div>
									<div class="card-content">
										<div class="form-group">
											<label>Login ID</label>
											<input type="text" placeholder="Login ID" name="username" class="form-control input-no-border">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" placeholder="Password" name="password" class="form-control input-no-border">
										</div>
									</div>
									<div class="card-footer text-center">
										<button type="submit" value="login" name="submit" class="btn btn-fill btn-wd ">Let's go</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
	if(isset($_POST["submit"])){
		$not="Fill all fields !!";
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$confrm="Incorrect username or password !!";
		$con=mysqli_connect('localhost','root','') or die(mysql_error());
		mysqli_select_db($con,'online_test') or die("cannot select DB");
		$result=mysqli_query($con,"SELECT * FROM user WHERE u_handle='".$user."' AND u_pass='".$pass."'");
		$numrows=mysqli_num_rows($result);
		if($numrows!=0)
		{
			$row=mysqli_fetch_assoc($result);
				$dbusername=$row['u_handle'];
				$dbpassword=$row['u_pass'];
			if($user == $dbusername && $pass == $dbpassword)
			{
				$result=mysqli_query($con,"SELECT user_id,type FROM user WHERE u_handle='".$user."' AND u_pass='".$pass."'");
				$row=mysqli_fetch_assoc($result);
				session_start();
				@$_SESSION['sess_user']=$row['user_id'];
				$u=$row['user_id'];
				echo "logged in session started";
				$type=$row['type'];
				if($type=='teacher')
<<<<<<< HEAD
				{
					$query=mysqli_query($con,"select t_name from teacher where user_id='$u'");
					$row=mysqli_fetch_row($query);
					@$_SESSION['sess_name']=$row[0];
					header("Location: home.php");
				}
				if($type=='student')
				{
					$query=mysqli_query($con,"select u_name from student where user_id='$u']'");
					$row=mysqli_fetch_row($query);
					@$_SESSION['sess_name']=$row[0];
					header("Location: s_home.php");
				}
				if($type=='admin')
				{
					@$_SESSION['sess_name']="admin";
					header("Location: a_home.php");
				}
=======
					header("Location: home.php");
				if($type=='student')
					header("Location: s_home.php");
				if($type=='admin')
					header("Location: a_home.php");
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
			}
		} else {
			echo "<script type='text/javascript'>alert('$confrm');</script>";
		}
		} else {
			echo "<script type='text/javascript'>alert('$not');</script>";
		}
	}
?>
			<footer class="footer footer-transparent">
				<div class="container">
					<div class="copyright">
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

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

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
	$().ready(function() {
		demo.checkFullPageBackgroundImage();

		setTimeout(function() {
			// after 1000 ms we add the class animated to the login/register card
			$('.card').removeClass('card-hidden');
		}, 700)
	});
</script>

</html>
