<?php //really basic
require 'connect_db.php';
include 'h2.php';
session_start();
if(isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['regno'])&&isset($_POST['branch'])&&isset($_POST['yoj'])&&isset($_POST['croll'])&&isset($_POST['password'])&&isset($_POST['repassword']))
{
	$firstname=mysql_real_escape_string($_POST['firstname']);
	$surname=mysql_real_escape_string($_POST['surname']);
	$regno=mysql_real_escape_string($_POST['regno']);
	$branch=mysql_real_escape_string($_POST['branch']);
	$yoj=mysql_real_escape_string($_POST['yoj']);
	$croll=mysql_real_escape_string($_POST['croll']);
	$password=md5($_POST['password']);
	$repassword=md5($_POST['repassword']);
	if(!empty($firstname)&&!empty($surname)&&!empty($regno)&&!empty($branch)&&!empty($yoj)&&!empty($croll)&&!empty($password)&&!empty($repassword))
	{
		$lbranch=strtoupper($branch);
		if($lbranch=='CV'||$lbranch=='MT'||$lbranch=='MN'||$lbranch=='CH'||$lbranch=='IT'||$lbranch=='ME'||$lbranch=='EC'||$lbranch=='EE'||$lbranch=='CS')
			{
				if($yoj>=(date("Y")-3)&&($yoj<=date("Y")))
					{
						if($croll>=1&&$croll<=200)
						{
							if($password==$repassword)
							{
								$id=substr($yoj,2).$lbranch.$croll;
								$queryc="SELECT `roll` FROM `student_info` WHERE `roll`='$id'";
								$query_run=mysql_query($queryc);
								if(mysql_num_rows($query_run)>=1)
									echo "Sorry, user already exists!<br>";
								else 
								{
								$votes=0;$givevotes=1;
								$queryi="INSERT INTO `student_info`(`firstname`, `surname`, `roll`, `password`, `register`, `year`, `branch`, `votes`, `givevotes`) VALUES ('$firstname','$surname','$id','$password','$regno','$yoj','$lbranch','$votes','$givevotes')";
								$query_run=mysql_query($queryi);
								$_SESSION['confirm']=$id;
								header('Location: page2.php');
								} 
							}
							else echo "passwords dont match<br>";

						}else echo "enter valid class roll number(between 1 to 200)<br>";
					}else echo "enter valid year of joining<br>";
			}else echo "enter valid branch code<br>";

	}else echo "please fill all the fields.<br>";
}
?>
Hello student,enter the following data:<br>
<form action='register.php' method='post'>
enter fisrtname:<br>
<input type="text" name="firstname" maxlength="30" value="<?php if(isset($firstname)) echo $firstname; ?>"><br>
enter surname:<br>
<input type="text" name="surname" maxlength="30" value="<?php if(isset($surname)) echo $surname; ?>"><br>
enter register number(all numeric eg:167821 or so,,):<br>
<input type="text" name="regno" maxlength="7" value="<?php if(isset($regno)) echo $regno; ?>"><br>
enter branch code:<br>
<input type="text" name="branch" maxlength="12" value="<?php if(isset($branch)) echo $branch; ?>"><br>
enter year of joining:<br>
<input type="text" name="yoj" maxlength="4" value="<?php if(isset($yoj)) echo $yoj; ?>"><br>
enter class roll number(eg: 01,02,,etc.):<br>
<input type="text" name="croll" maxlength="3" value="<?php if(isset($croll)) echo $croll ?>"><br>
enter password(30 characters max):<br>
<input type="password" name="password" maxlength="30" ><br>
retype password:<br>
<input type="password" name="repassword" maxlength="30"><br>
<br>
<input type="submit" value="submit"><br>
</form>