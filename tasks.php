<?php //
require 'connect_db.php';
include 'h3.php';
session_start();
$id=$_SESSION['id'];
if(!empty($id))
{
		$lbranch=$_SESSION['branch'];
			switch($lbranch){
					case 'CV':{ $nbranch="DEPARTMENT OF CIVIL ENGINEERING";
								break;
					}
					case 'MT':{ $nbranch="DEPARTMENT OF METALLURGICAL AND MATERIAL SCIENCE";
								break;
						}
					case 'MN':{ $nbranch="DEPARTMENT OF MINING ENGINEERING";
								break;
					}
					case 'CH':{ $nbranch="DEPARTMENT OF CHEMCIAL ENGINEERING";
								break;
					}
					case 'IT':{ $nbranch="DEPARTMENT OF INFORMATION TECHNOLOGY";
								break;
					}
					case 'ME' :{ $nbranch="DEPARTMENT OF MECHANICAL ENGINEERING";
								break;
					}
					case 'EC' :{ $nbranch="DEPARTMENT OF ELECTRICAL ELECTRONICS AND COMMUNICATION ENGINEERING";
								break;
					}
					case 'EE' :{ $nbranch="DEPARTMENT OF ELECTRICAL AND ELECTRONICS ENGINEERING";
								break;
					}
					default :{ $nbranch="DEPARTMENT OF COMPUTER SCIENCE ENGINEERING";
								break;
					}
				}

 $name1=$_SESSION['name1']; //just for dynamicity
 $name2=$_SESSION['name2'];
 $givevotes=$_SESSION['givevotes'];
 echo "<b><h2>Welcome to, ".$nbranch.",</h2><h3>".$name1.' '.$name2."</h3></b>";
 if($givevotes==1)
 	echo "You may <i>vote</i><br><br>";
 else echo "You have <i>already</i> voted!<br>
 			thank you for voting!<br><br>";
 echo "

<a href='nominees.php'>FINAL NOMINEES</a><br>
<a href='wnominees.php'>WANNA BE NOMINEES</a><br>
<a href='edit_info.php'>EDIT PROFILE</a><br>";
if(!empty($_SESSION['votes']))
{
	$nom=$_SESSION['votes'];
	//echo $id; works
	if($nom>0)
	{
	 echo "<a href='pledge.php'>PLEDGE</a><BR>" ;
	}
}
echo "
<a href='nominate.php'>SELF NOMINATE</a><br>
<a href='results.php'>RESULTS</a><br>
<a href='logout.php'>LOGOUT<a><br>
";
}
else 
	header('Location: index.php');


?>