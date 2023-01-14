        

<?php
require_once('class/BDDclass.php'); 
require_once('class/commentsclass.php');
require_once('class/tasksclass.php');
require_once('class/usersteamtasksclass.php');
require_once('class/usersclass.php');
$id_task=$_GET['idtask'];
$id_team=$_GET['idteam'];
$BDD = new BDD('localhost','todolist','root','root');
$tasks=new Tasks_class();
$user=new Users_class();
$commentss =  new comments_class();
$user_team_task=new Usersteamtasks_class();
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
    <h1>Comments</h1>
    <?php

    $com=$BDD->selectQuery("SELECT comments.Id, comments.IdTask,comments.Comment,comments.IdUser,users.FirstName, users.LastName from comments,users where IdTask=? and users.Id=comments.IdUser

    ",array($id_task));
    
    foreach($com as $c){
        echo'   <div class="user_comment">
                   <h4>'.$c['LastName'].'  '.$c['FirstName'].'  :</h4>

                   <p>'.$c['Comment'].'</p>

                </div>';
    }
    ?>
<br><br>
    
 
</body>
</html>





<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$comment=$_POST["comment"];
    $FirstName=$_POST["FirstName"];
    $LastName=$_POST["LastName"];
	$result1=$BDD->selectquery("SELECT count(*) as 'nb'FROM users WHERE FirstName=? AND LastName=? ",(ARRAY($FirstName,$LastName)));
	if($result1[0]['nb'])
	{	 
        

   $id_user=$user->Getid_user_team($FirstName,$LastName);
   foreach($id_user as $t){
	$iduser=$t['Id'];
   };

   $commentss->add($id_task,$iduser,$comment);

   header('location:todolist.php?Idteam='.$id_team);

   
}



}else{
	echo "user not found in the team ";
}
	





?>



<form  method="POST">
            <div >
				<input type="text" name="FirstName"  required/>
				<label>FirstName</label>
			</div>

            <div >
				<input type="text" name="LastName"  required/>
				<label>LastName</label>
			</div>
			<div >
				<input type="text"  name="comment"   required/>
				<label>comments</label>
			</div>

		
 
			<div >
				<button>Submit</button>
			</div>


</form>