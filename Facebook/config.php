<?php

try{
	$db= new PDO('mysql:host=localhost;dbname=facebook;','root','');
}
catch(PDOException $e){
	echo "wrong in db";
}



?>