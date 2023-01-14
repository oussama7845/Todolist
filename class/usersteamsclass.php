<?php
require_once('class/BDDclass.php');
require_once('interface/usersteams-interface.php');
class Usersteams_class implements usersteams{
public $IdUser;
public $IdTeam;


public function delete($IdUser,$IdTeam){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('delete from usersteams where IdUser=? and IdTeam=?',array($IdUser,$IdTeam));

}
/*
public function modify($IdUser,$IdTeam){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('update usersteams set IdUser =? where IdTeam=? ',array($IdUser,$IdTeam));

}
*/
public function add($IdUser,$IdTeam){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('insert into usersteams (IdUser,IdTeam) values(?,?)',array($IdUser,$IdTeam));
    
}
public function getLastTeamId(){
    $BDD = new BDD('localhost','todolist','root','root');
    $res = $BDD->selectQuery('SELECT * from teams ORDER BY Id DESC LIMIT 1',);
    return $res;
}

public function __destruct()
{
    
}
}
?>
