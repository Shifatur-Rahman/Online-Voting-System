<html>
<head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body style="  background-color: #999966;">
<center><a href ="https://sourceforge.net/projects/pollingsystem/"><img src = "images/logo.jpg" alt="site logo" style="width:100px;height:90px"></a></center><br>     
<center><b><font color = "white" size="6">Online Voting System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Administrator Login </h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<form name="form1" method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
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
<center>
<br>Not yet registered? <a href="register.php"><b>Register Here</b></a>
</center>
</td>
</form>
</tr>
</table>
</div>
<div id="footer">
<div class="bottom_addr">&copy; System Developed By cse-161</div>
</div>
</div>
</body></html>