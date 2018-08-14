<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<form action="register.php" method="post" enctype="multipart/form-data">
  <div class="form-group">

  	 <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name" name="username">
  
  </div>
  <div class="form-group">

    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>

 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload image for your account</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

  <button type="submit" class="btn btn-primary" name="ok">Submit</button>
</form>
<?php
if (isset($_POST['ok'])) {
	# code...
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	
  $filename=$_FILES['file']['name'];
  $filetmp=$_FILES['file']['tmp_name'];
  move_uploaded_file($filetmp,"uploads/".$filename);
	$sql="INSERT INTO users(username,password,email) VALUES(:username,:password,:email)";
	$query=$db->prepare($sql);
	$query->execute(array(':username'=>$username,':password'=>$password,':email'=>$email));
    $_SESSION['fbuser'] = $email;
  header('location:home.php');
}


?>
<a href="index.php">Back to the main page to login</a>
</body>
</html>