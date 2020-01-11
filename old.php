<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}


//new


if (isset($_POST['Submit'])){   

  $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); // for the first candidate
    $row2 = mysqli_fetch_array($results); // for the second candidate
    $row3 = mysqli_fetch_array($results); // for the third candidate
    

      if ($row1){
      $candidate_name_1=$row1['candidate_name']; // first candidate name
      $candidate_1=$row1['candidate_cvotes']; // first candidate votes
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; // second candidate name
      $candidate_2=$row2['candidate_cvotes']; // second candidate votes
      }
    
     if ($row3){
      $candidate_name_3=$row3['candidate_name']; // third candidate name
      $candidate_3=$row3['candidate_cvotes']; // third candidate votes
      }   
}

else

?>


<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM tbPositions");
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2+$candidate_3;} ?>






<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body style="  background-color: green;">

<center><b><font color = "black" size="6">Online Voting System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Result </h1>
<a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="changepass.php">Change Password</a>| <a href="logout.php">Logout</a> | <a href="admin/manage-admins.php">Manage Admin</a> |<a href="result.php">Result</a>
</div>
    
    
    
<div id="container">
    
    
       
    
<?php
      
 // include_once ('time.php');
  // $con  =  mysqli_connect ('localhost','root',' ','poll');

    
$sql = "SELECT dateEnd, timeEnd FROM timeTable ORDER BY updateTime DESC LIMIT 1";

$result = mysqli_query($con, $sql);


    while($row = mysqli_fetch_assoc($result)) {
        
      //  var_dump($row);
        
        $date2 = $row['dateEnd'];

        $time2 = $row['timeEnd'];
        date_default_timezone_set("Asia/Dhaka");
        $currentDate = date("Y-m-d");
       $currentTime = date("H:i:s");
        
        
        
     //   echo "Crnt tym ". $currentTime  ;
     //   echo "Crnt date ". $currentDate ."<br>" ;

      //  echo "time is" . $row['dateStart'] . " " . $row['dateEnd'] . " " . $row['timeStart'] . " " . $row['timeEnd']. "<br>";
       // echo "date one is" . $date1 ."<br>" ;
        echo "date Two is" . $date2 ."<br>" ;
       // echo "time One is" . $time1 ."<br>" ;
        echo "time Two is" . $time2 ."<br>" ;



        if($date2<=$currentDate){
            
            if($time2<$currentTime){
                
             echo
                   ' <div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="result.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select" action="old.php">
   
    SELECT
    
    
    <?php     
        
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
   
    }
    ?>
    
    
    
    </SELECT></td>
    
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
    
     </div>             
                  
          '   ;

        }

        else echo '<h1>Sorry, the voting is Casting...</h1>';
    }
    else echo '<h1>sorry, the voting is Casting...</h1>';
    }
mysqli_close($con);

?>   
   
</div>
    
    
    
    
    
     
<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_3 || $candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1+$candidate_3),3));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_3 || $candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1+$candidate_3),3));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
    
   
    
<br>
<br>
    
    
    
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_3 || $candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1+$candidate_3),3));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_3 || $candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1+$candidate_3),3));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
    
    
    <br>
    <br>
    <br>
    
 
    
    <?php if(isset($_POST['Submit'])){ echo $candidate_name_3;} ?>:<br>
<img src="images/base-bg.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_3 || $candidate_2 || $candidate_1 != 0){echo(100*round($candidate_3/($candidate_2+$candidate_1+$candidate_3),3));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_3 || $candidate_2 || $candidate_1 != 0){echo(100*round($candidate_3/($candidate_3+$candidate_2+$candidate_1),3));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_3;} ?>
    
    
      
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<div id="footer">
<div class="bottom_addr">&copy; System Developed By cse-161</div>
</div>
</div>
</body></html>