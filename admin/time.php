
<?php
session_start();
require('../connection.php');
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body style="  background-color: #999966;">
<center><a href ="https://sourceforge.net/projects/pollingsystem/"></a></center><br>     
<center><b><font color = "white" size="6">Online Voting System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Voting Time  </h1>
<a href="admin.php">Home</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="manage-admins.php">Manage Account</a> | <a href="change-pass.php">Change Password</a>  | <a href="logout.php">Logout</a> 
</div>

<div id="container">
    
<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
    
    mysqli_connect ('localhost','root',' ');
    mysqli_select_db ("timeTable");

if (isset($_POST['Submit']))
{
    
    $dateStart = $_POST['mydateStart'];
    $dateEnd = $_POST['mydateEnd'];
    $timeStart = $_POST['mytimeStart'];
    $timeEnd = $_POST['mytimeEnd'];
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");
        
    
   

$sql = mysqli_query($con, "INSERT INTO timeTable(dateStart, dateEnd, timeStart, timeEnd)
VALUES ('$dateStart','$dateEnd','$timeStart','$timeEnd') ");
}
    echo "date one is" . $dateStart ."<br>" ;
        echo "date two is" . $dateEnd ."<br>" ;
    echo "time One is" . $timeStart ."<br>" ;
        echo "time Two is" . $timeEnd ."<br>" ;


   /*  
    echo "date one is" . $date1 ."<br>" ;
        echo "date Two is" . $date2 ."<br>" ;
        echo "time One is" . $time1 ."<br>" ;
        echo "time Two is" . $time2 ."<br>" ;
echo $currentDate ."<br>";
    echo $currentTime ;

*/
    
?>

    
    
 
    
<form method="post" action="time.php"  >
    
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="tan">
    
<tr>
<td width="78">Voting will start.</td>
<td width="6">:</td>
<td width="294"><input name="mydateStart" type="date" id="mydateStart"></td>
</tr>
    
<tr>
<td width="78">Voting will end.</td>
<td width="6">:</td>
<td width="294"><input name="mydateEnd" type="date" id="mydateEnd"></td>
</tr>
    
<tr>
<td>Start time</td>
<td>:</td>
<td><input name="mytimeStart" type="time" id="mytimeStart"></td>
</tr>
    
<tr>
<td>End time</td>
<td>:</td>
<td><input name="mytimeEnd" type="time" id="mytimeEnd"></td>
</tr>
    
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Set"></td>
</tr>
    
</table>
</td>
</form>
        

    
        


    
    
    
    
    
    
</div>
<div id="footer">
<div class="bottom_addr">&copy; System Developed By pau-cse</div>
</div>
</div>
</body></html>

