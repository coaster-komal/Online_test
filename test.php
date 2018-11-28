<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['test_id']))
		header('Location: s_home.php');
	$user=$_SESSION['sess_user'];
	$id=$_SESSION['test_id'];
	$num=$_SESSION["ques_num"];
	$dur=$_SESSION['duration'];
	/*if(isset($_GET['id']))
		$z=$_GET['id'];
	else
		$z=$_SESSION['start_num'];

	if($z>=$num)
		$z=0;
	if($z<0)
		$z=$num-1;*/
	$z=0;
	$qid=0;
	$x=1;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"SELECT q.ques_id,q.ques_desc,q.opt1,q.opt2,q.opt3,q.opt4,q.curr_ans FROM questions q,ques_link ql WHERE ql.test_id='$id' and ql.q_id=q.ques_id");
	$numrows=mysqli_num_rows($query);
	$query1=mysqli_query($con,"SELECT test_name FROM test WHERE test_id='$id'");
	$row=mysqli_fetch_row($query1);
	$nam=$row[0];
	$dur=strtotime($dur)- strtotime('today')-0;
	//$dur=$dur/3600;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/ot.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Online Test</title>

	
	
<script src="assets/js/jquery.plugin.js"></script>


	
	
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
	
	
<script type="text/javascript">
    
	        function toggleHide(id)
            {
				//alert("ggi");
				//alert(id);
				var idc_c = id + "_c";
				var divsToHide = document.getElementsByClassName("xyz"); //divsToHide is an array
    for(var i = 0; i < divsToHide.length; i++){
        divsToHide[i].style. display = "none"; // or
        //divsToHide[i].style.display = "none"; 
    }
				//var arra = document.getElementsByClassName("xyz");
				//alert(JSON.stringify(arra));
				//alert(idc_c);
				document.getElementById(idc_c).style.display = "block";             //  $(".card-content").hide();
			  // $(".card-content" "#id").show();
            }
			
			function endtest()
			{
				document.getElementById("isend").value  =1;
				document.getElementById("submitbtn").click();
			}
			
				
			
		//toggleHide(42);
        </script>
</head>

<body>
	<div class="wrapper" >
		<div class="sidebar" data-background-color="brown" style="display: ;" data-active-color="danger">
			<div class="logo">
				<a href="javascript:void(0)" class="simple-text logo-mini">
					OQ
				</a>
				<a href="javascript:void(0)" class="simple-text logo-normal">
					Online Quiz
				</a>
			</div>
			<div class="sidebar-wrapper">
			<ul class='nav'>
				<?php 
				$i=1;
				$j=0;
				$k=0;
				$answer=0;

				$questions=array();
				
				if($numrows>0)
				while ($row=mysqli_fetch_row($query))
				{
					//<?php $qid=$row[0];<a id='select' style='margin-top: 0px;' href='#dashboardOverview' $qid=$row[0]; >
					$answer=0;
					$questions[$j]=array();
					$questions[$j][0]=$row[0];
					$questions[$j][1]=$row[1];
					$questions[$j][2]=$row[2];
					$questions[$j][3]=$row[3];
					$questions[$j][4]=$row[4];
					$questions[$j][5]=$row[5];
					$questions[$j][6]=$row[6];
					$num3=$questions[$j][0];
					$query8=mysqli_query($con,"SELECT user_ans FROM useranswer WHERE user_id='$user' and test_id='$id' and que_id='$num3'");
					$numrows=mysqli_num_rows($query8);
					if($numrows>0)
					{
						$sql=mysqli_fetch_row($query8);
						$answer=$sql[0];
					}
					?>
					<div style="margin-bottom: 20px; margin-top: 0px;">
						
							<li>
								<button style='margin-top: 10px; border-radius: 0px; width: 100%' name='select' id = <?php echo $questions[$j][0];?>  value=<?php echo $j ?> style="background-color:#4CAF50" style="margin-top: 20px; margin-right: 20px;" class="btn btn-primary pull-left <?php if($answer) echo 'active'; ?>" onclick="toggleHide(<?php echo $questions[$j][0];?>);" >
									<i class='nav' style='font-style: normal;'><?php echo $i;?> </i>
										<!-- <p style='max-width: 200px; height: 32px; text-transform: none;overflow: hidden; margin: 0px; white-space: normal; word-wrap: normal; line-height: normal;font-size: 12px;'> -->
											<?php echo $row[1]; ?>
										<!-- </p> -->
									</button>
							</li>
						
					</div>
					<?php
							$i=$i+1;
							$j=$j+1;
						}
					?>
					
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<nav class="navbar navbar-default" >
				<div class="container-fluid" >
					<div class="navbar-minimize" style="display: none;">
						<button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
					</div>
					<div class="navbar-header" style="margin-left: 50px;">
						<p class="navbar-brand">
							Test Name : <?php echo $nam;?>
						</p>
					</div>
					<div class="navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<p style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 20px; margin-bottom: 16px; margin-left: 0px; padding: 10px 15px;" class="btn btn-info btn-fill displayArea">Time goes here</p>
							</li>

							<li>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="">
				<div class="card" style="width: 80%; margin-left: auto; margin-right: auto;">
					<div>
					<?php
						$x=$z+1;
						$answer=0;
						if(isset($_POST['select']))
							$num3=$_POST['select'];
						else
							$num3=$questions[$z][0];
							$query8=mysqli_query($con,"SELECT user_ans FROM useranswer WHERE user_id='$user' and test_id='$id' and que_id='$num3'");
							$numrows=mysqli_num_rows($query8);
							if($numrows>0)
							{
								$sql=mysqli_fetch_row($query8);
								$answer=$sql[0];
							}
					?>
					
					<!--iframe name="votar" style="display:none;"></iframe-->
					<form method="post" id="form1" action="submit.php">
						<input type="hidden" name ="isend" id="isend" value=0>
						<?php
						$itr=0;
						while(isset($questions[$itr]))
						{
							?>
							
							<div class="card-content xyz" id = <?php echo $questions[$itr][0]."_c";?> value = <?php echo $questions[$itr][0];?> style= <?php if($itr!=0)echo "display:none";else echo "display:block"; ?>>
						
							<h3 style='margin: 0px;'>Question: <?php echo $itr+1 ?></h3>
								<hr style='color: black; height: 1px; background-color: black;'>
								<p style='margin-bottom: 20px; font-size: 1.2em;'><?php echo $questions[$itr][1]?></p>
									<input type="hidden" name="qid<?php echo $questions[$itr][0]?>" id="qid" value=<?php echo $questions[$itr][0]?> >
									<input type="hidden" name="cur<?php echo $questions[$itr][0]?>" id="cur" value=<?php echo $questions[$itr][6]?> >

							 								
								<div style='margin: 10px 0px; padding: 10px; padding-left: 20px; border: 1px solid grey; border-radius: 10px;'>
									<input type='radio' name='answer<?php echo $questions[$itr][0]?>' value='1' <?php if($answer==1)echo "checked"?> >
									<?php echo $questions[$itr][2]?><br>
								</div>
							  <div style='margin: 10px 0px; padding: 10px; padding-left: 20px;  border: 1px solid grey; border-radius: 10px;'>
							  	<input type='radio' name='answer<?php echo $questions[$itr][0]?>' value='2' <?php if($answer==2)echo 'checked'?> > <?php echo $questions[$itr][3]?><br>
							  </div>
							  <div style='margin: 10px 0px; padding: 10px; padding-left: 20px;  border: 1px solid grey; border-radius: 10px;'>
							  	<input type='radio' name='answer<?php echo $questions[$itr][0]?>' value='3' <?php if($answer==3)echo "checked"?> > <?php echo $questions[$itr][4]?> <br>
							  </div>
								<div style='margin: 10px 0px; padding: 10px; padding-left: 20px;  border: 1px solid grey; border-radius: 10px;'>
									<input type='radio' name='answer<?php echo $questions[$itr][0]?>' value='4' <?php if($answer==4)echo "checked"?> > <?php echo $questions[$itr][5]?><br>
								</div>
								
								<div class="card-footer">
									<button type="reset" style="margin-top: 20px; margin-left: 20px;" name="reset" class="btn btn-warning pull-right">Reset</button>
									<button name="prev" value="<?php echo $z ?>" onclick="toggleHide( <?php echo $questions[$itr-1][0];?>); return false;" style="margin-top: 20px; margin-right: 20px;<?php if($itr==0)echo 'display:none;'?>" class="btn btn-warning pull-left">Previous</button>
									<button name="next" value="<?php echo $z ?>" onclick="toggleHide( <?php echo $questions[$itr+1][0];?>);return false;" style="margin-top: 20px; margin-right: 20px;<?php if($itr==$num-1)echo 'display:none;'?>" class="btn btn-info btn-fill pull-left">Next</button>
									<div class="clearfix"></div>
								</div>
								<br><br>
								
								<button type="submit" id="submitbtn"  name="submit" value="<?php echo $z ?>" style="margin-top: 20px; margin-left: 300px;" class="btn btn-info btn-fill">Submit All Answers</button>
								<button type="submit" id='finish' onclick="location.href='end.php';" name="end" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 18px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px;padding: 10px 15px;" class="btn btn-danger">
									End Test
								</button>
							</div>
							<?php
							$itr=$itr+1;
						}
						?>
							
						</form>
			
					</div>
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
</body>
<script>
	var duration = <?php echo $dur ?>;
	var displayArea = document.querySelector('.displayArea');
	var hr = Math.floor(duration/3600);
	var min = Math.floor((duration%3600)/60);
	var sec = Math.floor((duration%3600)%60);
	displayArea.innerHTML = `${hr}H : ${min}M : ${sec}S`;
	function decminute(){
		var timer = setInterval(function () {
			sec -= 1;
			if (min == 5 && hr == 0) {
				displayArea.classList.toggle("btn-info");
				displayArea.classList.add("btn-danger");
			}
			displayArea.innerHTML = `${hr}H : ${min}M : ${sec}S`;
			if(hr <= 0 && min <= 0 && sec<= 0)
			{
		    clearInterval(timer);
				window.location.href = 'user_result.php';
				document.getElementById("finish").click();
			}
			else {
				if (sec <= 0) {
					if (min > 0) {
						min -= 1;
						sec = 60;
					}
					else if (hr >= 0) {
						hr -= 1;
						min = 59;
						sec = 60;
					}
					else {
						clearInterval(timer);
						document.getElementById("finish").click();
					}
				}
			}
		},1000);
	}
	decminute();
</script>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.fullscreen.min.js" type="text/javascript"></script>
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
    var frm = $('#form1');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
	//$("#form1").ajaxForm({url: 'submit.php', type: 'post'})
</script>

<script type="text/javascript">
	$(document).ready(function() {
		demo.initOverviewDashboard();
//alert("sdfdf");
		//toggleHide(3);
		demo.initCirclePercentage();

	});
	
	
</script>

</html>
