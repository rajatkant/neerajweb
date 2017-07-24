<html>
<head>
<title>LoginForm.php</title>
<!-- Javascript validation for user inputs -->
<script type="text/javascript">
function validate()
{
var a = document.login.username.value;
if(a=="") 
{
alert("Please enter your username");
document.login.username.focus();
return false;
}
var b = document.forms["login"]["password"].value;
if (b == "") 
{
alert("Please enter your password");
return false;
}
}
</script>
</head>
<body>
<!-- Make a note that the method type used is post, action page is Login.php and validate() function will get called on submit -->
<center><h1>Sample Login Form</h1></center>
<br>
<form name="login" method="post" action="Login.php" onsubmit="return validate();" >
<table border="3" width="355" align="center" bgcolor="#affeff" >
<tr>
<td height="50" bgcolor="#aa0eff">
<center><b>Login</b></center>
</td>
</tr>
<tr>
<td width="219">
<table width="240" align="center" >
<tr></tr>
<tr>
<td width="71"><span style="font-size:12pt;">Username:</span></td>
<td width="139"><input type="text" name="username" minlength="4" required="required" placeholder="Your username"></td>
</tr>
<tr>
<td width="71"><span style="font-siz:12pt;">Password:</span></td>
<td width="139"><input type="password" name="password" minlength="4" required="required" placeholder="Your Password"></td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td width="71">&nbsp;</td>
<td width="139">
<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="219" bgcolor="#aa0eff" align="center">
</td>
</tr>
</table>
</form>
</body>
</html>