<?php
include("dbconnection.php");
if(isset($_SESSION['adminid']))
{
	echo "<script>window.location='http://127.0.0.1:5000';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM admin WHERE loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[adminid]= $rslogin[adminid] ;
		echo "<script>window.location='http://127.0.0.1:5000';</script>";
	}
	else
	{
		echo "<script>alert('Invalid Login ID and Password entered..'); </script>";
	}
}
?>
<html>
<body>
<div style="background-color:#fff;">
<center><a href="index.php"><img style="background-color:#fff;" src="laps.png"></a></center>
  <div>
    <ul>
      <h1>Login for Loan Approval Prediction System</h1>
	  <h4 style="color:red;">
	  Warning! This page must be accessed only by the Loan Approving Officer.<br> 
	  If it found to be accessed by any other employee without proper permissions there will be serious consequences
	  </h4>
	</ul>
  </div>
  <div><center>
    <h1>Enter Login ID and Password</h1>
    <form method="post" action="" name="frmadminlogin" onSubmit="return validateform()">
    <table width="200" border="3">
      <tbody>
        <tr>
          <td width="34%">Login ID</td>
          <td width="66%"><input type="text" name="loginid" id="loginid" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
          <td height="36" colspan="2" align="center" ><input style="background-color:#3d73b1;color:white;" type="submit" name="submit" id="submit" value="Login" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </center></div>
</div>
  </div>
</div>
<div style="height:100px;background-color:#3d73b1;">
  <div id="footer">

    <div id="copyright">
      <p><center style="color:white;">Copyright &copy; 2019 - All Rights Reserved</center>
      <br class="clear" />
    </div>
    <div class="clear"></div>
  </div>
</div>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadminlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadminlogin.loginid.focus();
		return false;
	}
	else if(!document.frmadminlogin.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmadminlogin.loginid.focus();
		return false;
	}
	else if(document.frmadminlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmadminlogin.password.focus();
		return false;
	}
	else if(document.frmadminlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmadminlogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
</body>
</html>