<?php
require('connection.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   
/*
$resulta = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_name='Luis Nani'");

while($row1 = mysqli_fetch_array($resulta))
  {
  $candidate_1=$row1['candidate_cvotes'];
  }
  */
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
        // do nothing
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
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body style="  background-color: green;">
<center><b><font color = "black" size="6">Online Voting System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>USER RESULTS </h1>
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="result.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
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
    
    
      
     


</div>
    
    
    
<div id="footer">
<div class="bottom_addr">&copy; System Developed By pau-cse</div>
</div>
</div>
</body></html>



<style>
h1 {
	color: black;
	margin: 0px 0px 5px;
	padding: 0px 0px 3px;
	font: bold 18px Verdana, Arial, Helvetica, sans-serif;
	border-bottom: 1px dashed red;
	text-align:center;
}
</style>