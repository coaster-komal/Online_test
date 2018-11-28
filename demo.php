<<<<<<< HEAD
<?php

//index.php
session_start();
$user=$_SESSION['sess_user'];
$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
$query = mysqli_query($con,"SELECT * FROM notification where t_id='$user'");


?>

<html>  
    <head>  
        <title>How to Create Dynamic Timeline in PHP</title>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/timeline.min.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/timeline.min.css" />
  
    </head>  
    <body>  
        <div class="container">
   <br />
   <h3 align="center"><a href="">How to Create Dynamic Timeline in PHP</a></a></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
                    <h3 class="panel-title">Our Journey</h3>
                </div>
                <div class="panel-body">
                 <div class="timeline">
                  <div class="timeline__wrap">
                   <div class="timeline__items">
                   <?php 
                   while($row=mysqli_fetch_row($query))
                   {
                   ?>
                    <div class="timeline__item">
                     <div class="timeline__content">
                      <h2><?php echo $row["3"]; ?></h2>
                      <p><?php echo $row["4"];?></p>
                     </div>
                    </div>
                   <?php
                   }
                   ?>
                   </div>
                  </div>
                 </div>
                </div>
   </div>
  </div>
    </body>  
</html>

<script>
$(document).ready(function(){
 jQuery('.timeline').timeline({
  //mode: 'horizontal',
  //visibleItems: 4
  //Remove this comment for see Timeline in Horizontal Format otherwise it will display in Vertical Direction Timeline
 });
});
</script>
=======
<html>
    <body>
        <form method='post'> <!--name.php to be called on form submission-->
            <h4>SELECT SUJECTS</h4>
            <select name='subject[]' multiple size=6>  <!--Using multiple to select multiple value-->
                <option value='english'>ENGLISH</option>
                <option value='maths'>MATHS</option>
                <option value='computer'>COMPUTER</option>
                <option value='physics'>PHYSICS</option>
                <option value='chemistry'>CHEMISTRY</option>
                <option value='hindi'>HINDI</option>
            </select>
            <input type='submit' name='submit' value=Submit>
        </form>
    </body>
</html>
<?php
    if(isset($_POST["submit"]))
    {
		if(isset($_POST["subject"]))
		{
			foreach ($_POST['subject'] as $subject)
			{
				print "You selected $subject<br/>";
			}
		}
		else
			echo "select an option first !!";
	}

?>
>>>>>>> 9e5ee92163407d2a3a0a160318d14bb81f170aac
