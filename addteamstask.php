

<?php

require_once('class/BDDclass.php'); 
require_once('class/tasksclass.php');
require_once('class/usersteamtasksclass.php');
require_once('class/usersclass.php');

$id_team=$_GET['idteam'];
$BDD = new BDD('localhost','todolist','root','root');
$tasks=new Tasks_class();
$user=new Users_class();
$user_team_task=new Usersteamtasks_class();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=$_POST["name"];
	$state=$_POST["state"];
    $FirstName=$_POST["FirstName"];
    $LastName=$_POST["LastName"];
    $detail=$_POST["detail"];
	$result1=$BDD->selectquery("SELECT count(*) as 'nb'FROM users WHERE FirstName=? AND LastName=? ",(ARRAY($FirstName,$LastName)));
	if($result1[0]['nb'])
	{	 $tasks->add($name,$detail,$state);

   $id_task=$tasks->gettaskid($name,$detail);
   foreach($id_task as $t){
	$idtasks=$t['Id'];
   };


   $id_user=$user->Getid_user_team($FirstName,$LastName);
   foreach($id_user as $t){
	$iduser=$t['Id'];
   };

   $user_team_task->add($iduser,$id_team,$idtasks);
   
   header('location:todolist.php?Idteam='.$id_team);

   
}



}else{
	echo "user not found in the team ";
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
	<h2>Add a task to your ToDo List</h2>
	
</body>
</html>


<form  method="POST">
			<div >
				<input type="text" name="name"   required/>
				<label>Name</label>
			</div>

			<div >
				<input type="text" name="detail"  required/>
				<label>Detail</label>
			</div>

            <div >
				<input type="text" name="FirstName"  required/>
				<label>FirstName</label>
			</div>

            <div >
				<input type="text" name="LastName"  required/>
				<label>LastName</label>
			</div>



            <label >Choose a State</label>

             <select name="state" id="state">
   
               <option value="ToDo">Todo</option>
               <option value="Doing">Doing</option>
               <option value="Done">Done</option>
  
             </select>




			<div >
				<button >Submit</button>
			</div>
	

</form>