<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>friendadd</title>
</head>
<body>
	<?php
	include ("db.php");
	
	session_start();
	$user = $_SESSION['user'];
	$id = $_SESSION['id'];
	
	if ( isset ($_REQUEST['page']))
{
	$pageno=$_REQUEST['page'];
	
}else{
	
	$pageno=1;
}

	$recPerPage=5;
	
	$end	= $pageno * $recPerPage;
	
	if ( $pageno == 1)
		$start	= 0;
	else
		$start = (($pageno-1) * $recPerPage )+1;
		
	$sql1	= "SELECT * FROM friends";

	$result1= $link->query($sql1);

	$totalrec=$result1->num_rows;
	//echo $totalrec;
	
	$totalPages =	ceil ($totalrec / $recPerPage);
	//echo $totalPages;
	
	
	
	
	$sqlF = "SELECT friend_id2 FROM myfriends WHERE friend_id1 = ".$id."";
	$result2 = $link->query($sqlF);
	$noFriend = $result2->num_rows;
	
	$sql = "SELECT profile_name, friend_id FROM friends WHERE friend_id <> ".$id." AND friend_id NOT IN (SELECT friend_id1 FROM myfriends WHERE friend_id2 = ".$id.") limit '$start','$recPerPage'";
	$result = $link->query($sql);
	
	if( isset( $_REQUEST['addFriend'] ) ){
		 
		 $id1 = $id;
		 $id2 = $_REQUEST['hid'];
		//echo $id2;
		$sqlAdd = "INSERT INTO myfriends (friend_id1, friend_id2) values ('$id1', '$id2')";
		$sqlAdd1 = "INSERT INTO myfriends (friend_id1, friend_id2) values ('$id2', '$id1')";
		$result3 = $link->query($sqlAdd);
		$result5 = $link->query($sqlAdd1);
		
		header("location: friendadd.php");
	}
	
	
	?>
	
<table width="30%" border="1">
	<tr>
		<td colspan="2"><h1 align="center">My Friend System</h1><br>
			<h4 align="center"><?php echo $user ?>'s Add Friend Page<br>
				Total number of friends is <?php echo $noFriend ?></h4><br>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
  <table width="90%" border="1" align="center">
  <tbody>
	    
	  <?php
	  while($row = $result->fetch_array()){
			  
	  ?>
	  	<tr>
			<td align="left"><?php echo $row['profile_name'];?></td>
			<td align="left"><?php 
			  $msql = "SELECT * FROM myfriends WHERE friend_id1 = ".$id." OR friend_id2 = ".$row['friend_id']."";
			  $mresult = $link->query($msql);
			  $mfriend = $mresult->num_rows;
			  echo $mfriend;
				?> mutal friends</td>
			<td align="center">
				<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
				<input type="hidden" name = "hid" value="<?php echo $row['friend_id']?>">
				<input type="submit" name="addFriend" id="addFriend" value= "Add as friend">
				</form> 
			</td>
	    </tr>
	  <?php
		  }
	  ?>
  </tbody>
  </table>
	<?php
		if ( $pageno>1){
	?>
	<a href="friendadd.php?page=<?php echo $pageno-1;?>">PREVIOUS</a>
	
	<?php
		}
	
		for ( $k =1 ; $k <=$totalPages;	$k++){
			
//			if ( $k==$pageno){
//				echo " $k ";}
//			else{
				?>
	
				<a href="friendadd.php?page=<?php echo $k; ?>"></a>
	<?php			
			}
			
		
	?>
	
	
	
	
	<?php
		if ( $pageno!=$totalPages){
	?>
	<a href="friendadd.php?page=<?php echo $pageno+1;?>"><p align="right">NEXT</p></a>
		<?php
		}
	?>
	<br>
	<table width="100%">
		<tr>
			<td align="left"><a href="friendlist.php">Friends List</a></td>
			<td align="right"><a href="index.php">Log out</a></td>
		</tr>
	</table>
	
</form>
	</td>
	</tr>
		
</table>
</body>
</html>