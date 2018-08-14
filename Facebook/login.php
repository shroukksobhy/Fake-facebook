<?php
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Facebook Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	Login
	<br>
<form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php

if (isset($_POST['email'] , $_POST['password'])) {
	# code...

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users where email=? && password=?";
$query=$db->prepare($sql);
$query->execute(array($email,$password));

$count = $query->rowCount();
$rows = $query -> fetchAll();
if ($count > 0) {
	foreach ($rows as $row) {

	$_SESSION['fbuser'] = $email;
	header('location:home.php');
	}
}
else {

	echo "Wrong Information please try again";

}
}

?>
<a href="index.php"> Back to the main page to Register</a>
</body>
</html>