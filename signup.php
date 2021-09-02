<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup</title>
</head>
<body>
<!--
	<h1>My Friend System</h1><br>
	<h2>Registration Page</h2>
-->
	<?php
	include ("db.php");
	
	if( isset ( $_REQUEST['register'] ) ){
	
	$email  =	$_REQUEST['email'];
	$username	=	$_REQUEST['username'];
	$password =	$_REQUEST['password'];
	$cpassword =	$_REQUEST['cpassword'];
	
	//echo $email." ".$username." ".$password." ".$cpassword;
	
	$sql = "INSERT INTO friends (friend_email, password, profile_name) values ('$email', '$password', '$username')";
	$result	=	$link->query($sql);
	
	header("location: index.php");
}
	
?>
	

<form id="registration" name="registration" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
	<table width="40%">
		<tbody>
		<tr>
			<th colspan="2"><h2>My Friend System</h2></th>
		</tr>
		<tr>
			<th colspan="2" align="center"><h3>Registration Page</h3></th>
		</tr>
		<tr>
			<td width="24%" align="right"><label for="email">Email</label></td>

			<td width="76%">&nbsp;&nbsp;<input type="email" name="email" id="email"></td>
		</tr>
		<tr>
			<td align="right"><label for="textfield">Profile Name</label></td>
			<td>&nbsp;&nbsp;<input type="text" name="username" id="username"></td>
		</tr>
		<tr>
			<td align="right"><label for="password">Password</label></td>
			<td>&nbsp;&nbsp;<input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td align="right"><label for="cpassword">Confirm Password</label></td>
			<td>&nbsp;&nbsp;<input type="password" name="cpassword" id="cpassword"></td>
		</tr>
			<tr><td></td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;&nbsp;<input type="submit" name="register" id="register" value="Register">  <input type="reset" name="clear" id="clear" value="Clear"></td>
			
		</tr>
		</tbody>
</table>
</form>

</body>
</html>