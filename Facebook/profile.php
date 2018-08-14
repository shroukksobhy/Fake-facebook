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

<div class="profile">
<p style="color: red">Hello its your profile </p>
<h3>This section to show  your information</h3>

<br>
<div class="info">
	<?php
	session_start();
	require 'config.php';
	$sql ="SELECT * FROM users where email='".$_SESSION['fbuser']."' ";
	$query=$db->prepare($sql);
	$query->execute();
	$results=$query->fetchall();

	foreach ($results as $row) {
		echo "<h6>User name: ".$row["username"] ."</h6>";
		echo "<h6>Email: ".$row["email"]."<h6>";
		echo "<h6>ID ADDRESS: ".$row["id"]."<h6>";
		echo '<h6>Image <img src="'.'uploads/'.$row['file'].'" alt="HTML5 Icon" style="width:128px;height:120px;"> </h6>';
	
	}

?>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>