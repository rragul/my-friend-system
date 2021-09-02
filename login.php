<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
</head>
<body>
	<?php
	include ("db.php");
	
	if( isset ( $_REQUEST['login'] ) ){
	
	$lemail  =	$_REQUEST['lemail'];
	$lpassword =	$_REQUEST['lpassword'];
	
	//echo $lemail." ".$lpassword;
	
	$sql= "SELECT * FROM friends";
	$result	=	$link->query($sql);
	
	$flag = 0;
		
		while($row = $result->fetch_array()){
			$email = $row['friend_email'];
			$password = $row['password'];
			
			if ( $lemail == $email and $lpassword == $password){
				$user = $row['profile_name'];
				$id = $row['friend_id'];
				$flag = 1;
			}
		}
		
		if($flag == 1){
			session_start();
			$_SESSION['user'] = $user;
			$_SESSION['id'] = $id;
			header("location: friendlist.php");
		} else{
			echo "invalid email or password";
	}
	}
	?>
	
<table width="30%" border="1">
	<tr>
		<td colspan="2"><h3 align="center">My Friend System<br>Log in Page</h3><br>
	<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
	  <table width="80%" align="center">
	  <tbody>
			<tr>
				<td width="24%" align="right"><label for="email">Email</label></td>

				<td width="76%"><input type="email" name="lemail" id="lemail"></td>
			</tr>
			<tr>
				<td align="right"><label for="password">Password</label></td>
				<td><input type="password" name="lpassword" id="lpassword"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="login" id="login" value="login">  <input type="reset" name="clear" id="clear" value="Clear"></td>
			</tr>
	  </tbody>
	</table>
	</form>
</td>
</tr>
</table>
</body>
</html>