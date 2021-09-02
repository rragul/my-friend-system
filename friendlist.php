<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>friendlist</title>
</head>
<body>
	<?php
	include ("db.php");
	
	$sql3 = 'SELECT profile_name, friend_id FROM friends';
	$result3 = $link->query($sql3);
	 session_start();
	$user = $_SESSION['user'];
	$id = $_SESSION['id'];
	
	$sqlF = "SELECT friend_id2 FROM myfriends WHERE friend_id1 = ".$id."";
	$result4 = $link->query($sqlF);
	$noFriend = $result4->num_rows;
	
	if( isset($_REQUEST['removeFriend'])){
		$id2 = $_REQUEST['hid'];
		$dsql = "DELETE FROM myfriends WHERE friend_id1 = ".$id." and friend_id2 = ".$id2."";
		$dsql1 = "DELETE FROM myfriends WHERE friend_id1 = ".$id2." and friend_id2 = ".$id."";
		$result5 = $link->query($dsql);
		$result6 = $link->query($dsql1);
		
		header("location: friendlist.php");
	}
	
	
	?>
	
<table width="30%" border="1">
	<tr>
		<td colspan="2"><h1 align="center">My Friend System</h1>
			<h4 align="center"><?php echo $user ?>'s Add Friend Page<br>
				Total number of friends is <?php echo $noFriend ?></h4><br>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
  <table width="60%" border="1" align="center">
  <tbody>
	    
	  <?php
	  while($row = $result4->fetch_array()){
		  $sql4 = "SELECT profile_name FROM friends WHERE friend_id = ".$row['friend_id2']."";
		  $result5 = $link->query($sql4);
		  while($row1 = $result5->fetch_array()){
	  ?>
	  	<tr>
			<td align="left"><?php echo $row1['profile_name']; ?></td>
			<td align="center">
				<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
				<input type="hidden" name = "hid" value="<?php echo $row['friend_id2']?>">
				<input type="submit" name="removeFriend" id="removeFriend" value="Unfriend">
				</form>
			</td>
				
	    </tr>
	  <?php
		  }
	  }
	  ?>
    	
  </tbody>
  </table><br>
	<table width="100%">
		<tr>
			<td align="left"><a href="friendadd.php">Add Friends</a></td>
			<td align="right"><a href="index.php">Log out</a></td>
		</tr>
	</table>
</form>
	</td>
	</tr>
</table>
	
</body>
</html>