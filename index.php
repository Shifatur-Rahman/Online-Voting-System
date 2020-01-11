<?php
    require 'connection.php';
?>

<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body style="  background-color: green;">

<center><a href ="https://sourceforge.net/projects/pollingsystem/"><img src = "images/logo.jpg" alt="site logo" style="width:100px;height:90px"></a></center><br><br>
    <center><b><font color = "black" size="6">Online Voting System</font></b></center><br><br>

<div id="page">
<div id="header">
<h1>User Login </h1>
<div class="news"><marquee behavior="right">If you are first user in this site,you should register. </marquee></div>
</div>
    
    
    
    
    
<?php
      
 // include_once ('time.php');
  // $con  =  mysqli_connect ('localhost','root',' ','poll');

    
$sql = "SELECT dateStart, dateEnd, timeStart, timeEnd FROM timeTable ORDER BY updateTime DESC LIMIT 1";

$result = mysqli_query($con, $sql);


    while($row = mysqli_fetch_assoc($result)) {
        
      //  var_dump($row);
        
        $date1 = $row['dateStart'];
        $date2 = $row['dateEnd'];
        $time1 = $row['timeStart'];
        $time2 = $row['timeEnd'];
        date_default_timezone_set("Asia/Dhaka");
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        
        
        
        echo "Crnt tym ". $currentTime  ;
        echo "Crnt date ". $currentDate ."<br>" ;

      //  echo "time is" . $row['dateStart'] . " " . $row['dateEnd'] . " " . $row['timeStart'] . " " . $row['timeEnd']. "<br>";
        echo "date one is" . $date1 ."<br>" ;
        echo "date Two is" . $date2 ."<br>" ;
        echo "time One is" . $time1 ."<br>" ;
        echo "time Two is" . $time2 ."<br>" ;



        if($date1 <= $currentDate && $currentDate <= $date2){
            
            if($currentTime >= $time1 && $currentTime <= $time2){
                
             echo
                  ' <div id="container">
        <table width="600" border="0" align="center" cellpadding="0" cellspacing="1" style="  background-color: black;">
        <tr>
        <form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
        <td>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="tan">
        <tr>
        <td width="78">Username/Email</td>
        <td width="6">:</td>
        <td width="294"><input name="myusername" type="text" id="myusername"></td>
        </tr>
        <tr>
        <td>Password</td>
        <td>:</td>
        <td><input name="mypassword" type="password" id="mypassword"></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Login"></td>
        </tr>
        </table>
        </td>
        </form>
        </tr>
        </table>
        
        </div>
        ';

        }

        else echo '<h1>Sorry, the voting is not available for now.</h1>';
    }
    else echo '<h1>sorry, the voting is not for</h1>';
    }
mysqli_close($con);

?>
<center>
          <br />Not yet registered?
          <a href="registeracc.php"><b>Register Here</b></a> <br />
        </center>  
    

<div id="footer">
<div class="bottom_addr">&copy; System developed by cse-161</div>
</div>
</div>
</body></html>