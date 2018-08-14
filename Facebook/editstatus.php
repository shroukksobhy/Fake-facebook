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
<?php
if(isset($_GET['action'])&&$_GET['action']=='edit'){
	$id=intval($_GET['id']);
	$sql=$db->query("select * from status where id='$id'");
	while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
		# code...

		echo '<form method="post" action="home.php">';
	echo"<h4 class='statustext'>Edit this status </h4>
	 <input type='text' name='statusname' class='statusbox' placeholder='What is in your mind?'' value='$row->statusname'>
	 <button name='submit' type='submit'>Edit</button>
 
	</form>";

	}
}
if(isset($_GET['submit'])){
 $statusname=$_POST['statusname'];
 $update=$db->query("UPDATE status SET statusname=':statusname' WHERE id='$id'");
 $update->execute(array(':statusname'=>$statusname));
        header('Location:index.php');
}
?>
</div>
<div class="friends list">
	
</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>















