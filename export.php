<?php
ob_start();
session_start();
$con=mysqli_connect('localhost','root','') or die(mysql_error());
mysqli_select_db($con,'online_test') or die("cannot select DB");
$id=$_SESSION["tn"];
//$id=48;
 
$query=mysqli_query($con,"SELECT * FROM result WHERE test_id='$id'");
//$stmt->execute();
$query1=mysqli_query($con,"SELECT test_name FROM test WHERE test_id='$id'");
$numrows=mysqli_num_rows($query1);
	$sql=mysqli_fetch_row($query1);
	$nam=$sql[0];
	$filename=$nam.'.xls';

$columnHeader ='';
$columnHeader = "Username"."\t"."Marks"."\t";
 
$setData='';
 
$numrows=mysqli_num_rows($query);
if($numrows>0)
{
	while($rec=mysqli_fetch_row($query))
	{
		$rowData = '';
		$rowData=$rowData."".$rec[2]."\t".$rec[3];
		$setData .= trim($rowData)."\n";
	}
	header("Content-type: application/octet-stream");
	header('Content-Disposition: attachment; filename="'.$filename.'" ');
	header("Pragma: no-cache");
	header("Expires: 0");
 
	echo ucwords($columnHeader)."\n".$setData."\n";
}
else
	 echo "NO RESULT";
 

 
?>