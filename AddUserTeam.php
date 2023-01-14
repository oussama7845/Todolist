<?php
require_once('class/BDDclass.php'); 
require_once('class/usersclass.php');

$id_team=$_GET['Id'];






$BDD=new BDD('localhost','todolist','root','root');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$FirstName=$_POST["FirstName"];
	$LastName=$_POST["LastName"];

    $result1=$BDD->selectquery("SELECT count(*) as 'nb'FROM users WHERE FirstName=? AND LastName=? ",(ARRAY($FirstName,$LastName)));
   

	//comment savoir si $result1 return un resultat ou pas

	if($result1[0]['nb'])
	{	
		
		$users= new  Users_class();
	$id=$users->Getid_user_team($FirstName,$LastName);
	foreach($id as $t){
		$user=$t['Id'];
	}
    $BDD->nonselectquery("INSERT INTO usersteams (IdUser, IdTeam)
    VALUES ($user, $id_team); ");
    header("location:index.php");
	
	
	
	
	
       
		
		
	}else{
		echo "users not found try again";
	}

}






















?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
	<title>Document</title>
</head>
<body>
	<h2>Add a new user to the team</h2>
	
</body>
</html>


<form  method="POST">
    
			<div >
                
				<input type="text" name="FirstName"   required/>
				<label>FirstName</label>
			</div>
            <div >
                
				<input type="text" name="LastName"   required/>
				<label>LastName</label>
			</div>


			<div >
				<button >Submit</button>
			</div>
</form>
