
<?php
require_once('class/BDDclass.php');
require_once('interface/usersteamtasks-interface.php');
class Usersteamtasks_class implements usersteamtasks{
public $IdUser;
public $IdTeam;
public $idTask;


public function delete($IdUser,$IdTeam,$IdTask){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('delete from usersteamstasks where IdUser=? and IdTeam=?',array($IdUser,$IdTeam));

}
/*
public function modify($IdUser,$IdTeam,$IdTask){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('update usersteamstasks set IdUser =? where IdTeam=? ',array($IdUser,$IdTeam));

}
*/
public function add($IdUser,$IdTeam,$IdTask){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('insert into usersteamstasks (IdUser,IdTeam,IdTask) values(?,?,?)',array($IdUser,$IdTeam,$IdTask));
    
}
public function idTask($IdTeam){
    $BDD=new BDD('localhost','todolist','root','root');
    return $BDD->selectquery('select IdTask from usersteamstasks where IdTeam =? ',array($IdTeam));

}
public function __destruct()
{
    
}

}
?>
