<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body style="  background-color: green;">

<center><b><font color = "black" size="6">Online Voting System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>USER HOME </h1>
<a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="changepass.php">Change Password</a>| <a href="logout.php">Logout</a> |<a href="result.php">Result</a>
</div>
<div id="container">
<p>This is your Home Page. Click a link above to do some stuff.</p>
</div>
<div id="footer">
<div class="bottom_addr">&copy; System Developed By cse-161</div>
</div>
</div>
</body></html>