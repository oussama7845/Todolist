<?php

require_once('class/BDDclass.php');
require_once('class/tasksclass.php');


$Id=$_GET['Id'];
$idteam=$_GET['idteam'];

$tasks=new Tasks_class();

   $tasks->delete($Id);
   header('location:todolist.php ?Idteam='.$idteam.'');

  


 
?>
   