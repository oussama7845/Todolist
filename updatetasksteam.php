<?php

require_once('class/BDDclass.php');
require_once('class/tasksclass.php');
session_start();    

$Id=$_GET['Id'];
$idteam=$_GET['idteam'];
$nametask=$_GET['Name'];
$namedetail=$_GET['detail'];


$tasks=new Tasks_class();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=$_POST["name"];
	$state=$_POST["state"];
    $detail=$_POST["detail"];

   $tasks->modify($Id,$name,$detail,$state);



   header('location:todolist.php ?Idteam='.$idteam.'');
 

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
	<h2>Update</h2>
	
</body>
</html>

<form  method="POST">
			<div >
				<input type="text" value="<?php echo $nametask?>" name="name" id="name"  required/>
				<label>Name</label>
			</div>

			<div >
				<input type="text" name="detail" value="<?php echo $namedetail?>" id="detail"  required/>
				<label>Detail</label>
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




