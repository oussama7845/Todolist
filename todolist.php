<?php
require_once('class/tasksclass.php');
require_once('class/BDDclass.php');
require_once('class/usersclass.php');
require_once('class/teamsclass.php');
require_once('class/usersteamtasksclass.php');
session_start();









$idteam=$_GET['Idteam'];

$teams= new teams_class();
$usersteamstasks= new Usersteamtasks_class();
$get = $teams->get_name_teams($idteam);

foreach($get as $t){
    $name_team=$t['Name'];
}

$idtasks=$usersteamstasks->idTask($idteam);








 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>ToDoListTeam</title>
</head>
<header style="border-radius: 10px; padding:10px;">
 
   <div class="team_">
      
      <strong><a href="index.php" class="team"> Teams</a></strong>
      

   </div>
   
    <h4><?php echo 'TODolist Team : '.$name_team ?></h4>
    <div class="disconnect">
    <a href="disconnect.php"><h4>disconnect</h4> </a>
   </div>
    

</header>
<body>

<div class="todolist"> 

 <div class="todo">

    <div class="border_box1">
    <h3>Todo</h3>
    <a href="addteamstask.php?idteam=<?php echo $idteam ;?>"><svg  width="32" height="32" viewBox="0 0 24 24"><path fill="white" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/></svg></a>
       
</div>
   <?php

  $task = new Tasks_class();
  
   foreach($idtasks as $t){
       
      $_id =$t['IdTask'];
       $tasks = $task->get_alltask_team('ToDo',$_id);

   foreach($tasks as $t){
      echo'  <div class="border_tasks">
      <div class="texte_titre_desc">
    <h3>'.$t['Name'].'</h3>
    <p>'.$t['Detail'].'</p>
    </div>
    <div class="icone_edit_trash">
    <a href="updatetasksteam.php?Id='.$t['Id'].'&idteam='.$idteam.'&Name='.$t['Name'].'&detail='.$t['Detail'].'"><svg width="20" height="20" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m30 7l-5-5L5 22l-2 7l7-2Zm-9-1l5 5ZM5 22l5 5Z"/></svg></a>
    <a href="deletetasksteam.php?Id='.$t['Id'].'&idteam='.$idteam.'"><svg width="20" height="20" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M28 6H6l2 24h16l2-24H4m12 6v12m5-12l-1 12m-9-12l1 12m0-18l1-4h6l1 4"/></svg></a>
    <div class="icon_comment">

<a href="comments.php?idtask='.$t['Id'].'&idteam='.$idteam.'"><svg width="25" height="32" viewBox="0 0 512 512"><path d="M256 64C141.1 64 48 139.2 48 232c0 64.9 45.6 121.2 112.3 149.2-5.2 25.8-21 47-33.5 60.5-2.3 2.5.2 6.5 3.6 6.3 11.5-.8 32.9-4.4 51-12.7 21.5-9.9 40.3-30.1 46.3-36.9 9.3 1 18.8 1.6 28.5 1.6 114.9 0 208-75.2 208-168C464 139.2 370.9 64 256 64z" fill="black"/></svg></a>

</div>
    </div>
    </div>';
   }

   }
  

  
 
   ?>
 </div>







 

 <div class="doing">

  <div class="border_box1">
     <h3>Doing</h3>
     <a href="addteamstask.php?idteam=<?php echo $idteam ;?>"><svg  width="32" height="32" viewBox="0 0 24 24"><path fill="white" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/></svg></a>
  </div>
  
  <?php 
 foreach($idtasks as $t){
       
   $_id =$t['IdTask'];
    $tasks = $task->get_alltask_team('Doing',$_id);
  foreach($tasks as $t){
   echo '   <div class="border_tasks">
   <div class="texte_titre_desc">

<h3>'.$t['Name'].'</h3>
<p>'.$t['Detail'].'</p>
</div>
<div class="icone_edit_trash">
<a href="updatetasksteam.php?Id='.$t['Id'].'&idteam='.$idteam.'&Name='.$t['Name'].'&detail='.$t['Detail'].'"><svg width="20" height="20" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m30 7l-5-5L5 22l-2 7l7-2Zm-9-1l5 5ZM5 22l5 5Z"/></svg></a>
    <a href="deletetasksteam.php?Id='.$t['Id'].'&idteam='.$idteam.'"><svg width="20" height="20" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M28 6H6l2 24h16l2-24H4m12 6v12m5-12l-1 12m-9-12l1 12m0-18l1-4h6l1 4"/></svg></a>
<div class="icon_comment">

<a href="comments.php?idtask='.$t['Id'].'&idteam='.$idteam.'"><svg width="25" height="32" viewBox="0 0 512 512"><path d="M256 64C141.1 64 48 139.2 48 232c0 64.9 45.6 121.2 112.3 149.2-5.2 25.8-21 47-33.5 60.5-2.3 2.5.2 6.5 3.6 6.3 11.5-.8 32.9-4.4 51-12.7 21.5-9.9 40.3-30.1 46.3-36.9 9.3 1 18.8 1.6 28.5 1.6 114.9 0 208-75.2 208-168C464 139.2 370.9 64 256 64z" fill="black"/></svg></a>

</div>

</div>


</div> ';
  }
}


?>

 </div>









 <div class="did">

    <div class="border_box1">
       <h3>Done</h3>
       <a  href="addteamstask.php?idteam=<?php echo $idteam ;?>"><svg  width="32" height="32" viewBox="0 0 24 24"><path fill="white" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/></svg></a>
    </div>

    <?php 
   
   foreach($idtasks as $t){
       
      $_id =$t['IdTask'];
       $tasks = $task->get_alltask_team('Done',$_id);
    foreach($tasks as $t){
      echo '    <div class="border_tasks">
      <div class="texte_titre_desc">

<h3> '.$t['Name'].' </h3>
<p>'.$t['Detail'].'</p>
</div>
<div class="icone_edit_trash">
<a href="updatetasksteam.php?Id='.$t['Id'].'&idteam='.$idteam.'&Name='.$t['Name'].'&detail='.$t['Detail'].'"><svg width="20" height="20" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m30 7l-5-5L5 22l-2 7l7-2Zm-9-1l5 5ZM5 22l5 5Z"/></svg></a>
    <a href="deletetasksteam.php?Id='.$t['Id'].'&idteam='.$idteam.'"><svg width="20" height="20" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M28 6H6l2 24h16l2-24H4m12 6v12m5-12l-1 12m-9-12l1 12m0-18l1-4h6l1 4"/></svg></a>
<div class="icon_comment">

<a href="comments.php?idtask='.$t['Id'].'&idteam='.$idteam.'"><svg width="25" height="32" viewBox="0 0 512 512"><path d="M256 64C141.1 64 48 139.2 48 232c0 64.9 45.6 121.2 112.3 149.2-5.2 25.8-21 47-33.5 60.5-2.3 2.5.2 6.5 3.6 6.3 11.5-.8 32.9-4.4 51-12.7 21.5-9.9 40.3-30.1 46.3-36.9 9.3 1 18.8 1.6 28.5 1.6 114.9 0 208-75.2 208-168C464 139.2 370.9 64 256 64z" fill="black"/></svg></a>

</div>
</div>



</div>';
    }
   }

    ?>



   
 </div>

   

</div> 
    


    
    
</body>
</html> 