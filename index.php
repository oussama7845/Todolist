

<?php
session_start();
$id_user=$_SESSION['user'];
$Type=$_SESSION['Type'];

require_once('class/BDDclass.php'); 
require_once('class/teamsclass.php');
require_once('class/usersteamsclass.php');
$get_last_team= new Usersteams_class();

if(isset($_SESSION['user'])){
    $iduser=$_SESSION['user'];
  
 }else{
    header('Location: login.php');
    die();
 }
 

$teams=new teams_class();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=$_POST["name"];
	$state=$_POST["state"];
    

   $teams->add($name,$state);
   $id__=$get_last_team->getLastTeamId();
   foreach($id__ as $t){
    $id_team=$t['Id'];
   }
   $get_last_team->add($iduser,$id_team);

   


   
   
 

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
<div class="head">
<div>
    <h2>Welcome  </h2>

</div>
    
    <div class="disconnect_index">
    <strong><a href="disconnect.php">disconnect </a></strong>
   </div>
    
    </div>
</body>
</html>


<form  method="POST">
			<div >
				<input type="text" name="name"   required/>
				<label>Name</label>
			</div>

            <label >Choose a State</label>

             <select name="state" id="state">
   
               <option value="ACTIVE">Active</option>
               <option value="INACTIVE">Inactive</option>
               <option value="SUSPENDED">Suspended</option>
  
             </select>




			<div >
				<button >Submit</button>
			</div>
</form>


<table>

<tr>
    <th>name</th>
    <th>state</th>
    
<?php
if($Type=='ADMIN'){
echo ' <th>action</th>';
}
?>
   
</tr>
<?php

$BDD = new BDD('localhost','todolist','root','root');
$teamm=$BDD->selectQuery('SELECT teams.Id,teams.Name,teams.State,usersteams.IdUser,users.FirstName from teams,usersteams,users where teams.Id=usersteams.IdTeam and usersteams.IdUser=users.Id and users.Id=? and teams.State="ACTIVE"',array($iduser));

foreach ($teamm as $t){
    
    echo'<tr>
    <td><a href ="todolist.php?Idteam='.$t['Id'].'">' .$t['Name'].'</a></td>
    <td> '.$t['State'].'</td>';
if($Type=='ADMIN'){
echo '<td> <a href="AddUserTeam.php?Id='.$t['Id'].'"> AddUser</a></td>';
}
echo'
    
</tr>';
}



?>
</table>