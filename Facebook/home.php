<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Facebook Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>


<div class="header">
	<?php 
	require 'header.php';
	?>
</div>

<div class="status">
	<form method="post" action="index.php">
	<h4 class="statustext">Here you can put a status</h4>
	 <input type="text" name="statusname" class="statusbox" placeholder="What is in your mind?">
	 <button name="submit" type="submit" class="btn">Share</button>

	</form>
</div>
<?php
if (isset($_POST['submit'])) {
	# code...
	$statusname=$_POST['statusname'];
	$sql="insert into status(statusname) values (:statusname)";
	$query=$db->prepare($sql);
	$query->execute(array(':statusname'=>$statusname));
}

?>


<table>
<?php

$sql ="select * from status";
$query=$db->prepare($sql);
$query->execute();
$results=$query->fetchall();

foreach ($results as $row) {
	# code...
	echo "<tr>";
	echo '<td>'.$row["statusname"].'</td>';
	echo '<td><a href="#" class="btn btn-info">  Like</a> </td>
          <td><a href="#" class="btn btn-info">   Comment</a></td>
		<td><a href="#" class="btn btn-info">   Share</a> <br></td>';
	echo"	<td><a href='editstatus.php?action=edit&&id={$row['id']}' class='btn btn-primary'>Edit</a> </td>";
	  echo"<td><a href='home.php?action=delete&id={$row['id']}' class='btn btn-danger'>Delete</a></td>";

	echo "</tr>";
}

if(isset($_GET['action'])&&$_GET['action']=='delete'){
	$id=intval($_GET['id']);
	$delete=$db->query("DELETE FROM status WHERE id='$id'");
	$delete->execute();
}
?>

</table>
<div class="friends list">
	
</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>