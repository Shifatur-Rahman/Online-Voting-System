<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body style="  background-color: #999966;">
<center><b><font color = "white" size="6">Online Voting System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Logged Out Successfully </h1>
<p align="center">&nbsp;</p>
</div>
<?php
session_start();
session_destroy();
?>
You have been successfully logged out of your control panel.<br><br><br>
Return to <a href="login.html">Login</a>
<div id="footer">
<div class="bottom_addr">&copy; System Developed By cse-161</div>
</div>
</div>
</body></html>