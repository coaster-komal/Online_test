<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
//echo $ref;
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
mysqli_select_db($con,'online_test') or die("cannot select DB");
$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback (name, email , subject, feedback) VALUES  ('$name', '$email' , '$subject', '$feedback' )") or die ("Error");
//header("location:index.php");
header("location:$ref?q=Thank you for your valuable feedback");
?>