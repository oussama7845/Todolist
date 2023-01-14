<?php

require_once('class/BDDclass.php'); 
require_once('class/usersclass.php');
session_start();



$BDD=new BDD('localhost','todolist','root','root');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST["email"];
	$password=$_POST["password"];

    $result1=$BDD->selectquery("SELECT count(*) as 'nb'FROM users WHERE Email=? AND Password=? ",(ARRAY($email,$password)));
   

	//comment savoir si $result1 return un resultat ou pas

	if($result1[0]['nb'])
	{	
		
		$users= new  Users_class();
	$id=$users->Getallfrom($email,$password);
	foreach($id as $t){
		$id_user=$t['Id'];
		$Type=$t['Type'];
	}
	

	$_SESSION['user']=$id_user;
	$_SESSION['Type']=$Type;
	
	
	
	header('location:index.php');
	
       
		
		exit;
	}else{
		die ("email or password incorrect try again");
	}

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
	<title>Login todolist</title>
</head>
<body>
	
<div class="container">
	<!-- code here -->
	<div class="card">
		<div class="card-image1">	
			<h2 class="card-heading">
				
				<br>
				
			</h2>
		</div>
		<form class="card-form" method="POST">
			<div class="input">
				<input type="text" name="email" class="input-field"  required/>
				<label class="input-label">email</label>
			</div>

						<div class="input">
				<input type="password" name="password" class="input-field" required/>
				<label class="input-label">Password</label>
			</div>
			<div class="action">
				<button class="action-button">Get started</button>
			</div>
		</form>
		<div class="card-info">
			<p> in case you're new please fell free to join us </p>
			<a href="signup.php">Sign up</a>
		</div>
	</div>
</div>

</body>
</html>