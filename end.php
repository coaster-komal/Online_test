<?php
session_start();
$user=$_SESSION['sess_user'];
$id=$_SESSION['test_id'];
$status =0;

$resp = array_chunk($_POST,3);
						//	echo"<pre>";print_r($resp);die;
							$con=mysqli_connect('localhost','root','') or die(mysql_error());
						mysqli_select_db($con,'online_test') or die("cannot select DB");
						$cannot="SELECT any option !!";
				foreach($resp as $key=>$value)
				{
					
							$num3=$value[0];
							$num4=$value[1];
								$val=$value[2];
								$query_string = "SELECT user_ans FROM useranswer WHERE user_id='$user' and test_id='$id' and que_id='$num3'";
								//update($val,$num3,$num4);
								//echo $answer[$num2][0]." ".$answer[$num2][3];
								$query=mysqli_query($con,$query_string);
								$numrows=mysqli_num_rows($query);
								if($numrows==0)
								{
								$r=mysqli_query($con,"insert into useranswer(user_id,test_id,que_id,user_ans,curr_ans) values ('$user','$id','$num3','$val','$num4')");
								if($r)
								{
								 $status = 1;
								}
								}
								else
								{
									$query=mysqli_query($con,"UPDATE useranswer SET user_ans='$val' WHERE user_id='$user' and test_id='$id' and que_id='$num3'");
									$status=2;
								}
			   }
			   $newURL ="http://localhost/Online_test/user_result.php";
							
						header('Location: '.$newURL);						?>