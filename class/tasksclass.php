<?php
require_once('interface/tasks-interface.php');
class Tasks_class implements tasks{

public $id;
public $Name;
public $Details;
public $State;


public function delete($id){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('Delete from usersteamstasks where IdTask=?',array($id));
    $BDD->nonselectquery('DELETE from tasks where Id=?',array($id));

}
public function modify($id,$Name,$Detail,$State){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('UPDATE tasks set Name =? ,Detail=? , State=? where Id=? ',array($Name,$Detail,$State,$id));

}
public function add($Name,$Detail,$State){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('INSERT into tasks (Name,Detail,State) values(?,?,?)',array($Name,$Detail,$State));
    
}


public function gettask($id){
    $BDD=new BDD('localhost','todolist','root','root');
    
    return $BDD->selectQuery('SELECT * FROM tasks where Id =?',array($id));
    

}
public function gettaskid($Name,$Detail){
    $BDD=new BDD('localhost','todolist','root','root');
    
    return $BDD->selectQuery('SELECT Id FROM tasks where Name =? and Detail=?',array($Name,$Detail));
    

}


public function get_alltask($State){
    $BDD=new BDD('localhost','todolist','root','root');
   return $BDD->selectQuery('SELECT * FROM tasks where State=?',array($State));

}

public function get_alltask_team($State,$idtasks){
    $BDD=new BDD('localhost','todolist','root','root');
   return $BDD->selectQuery('SELECT * FROM tasks where State=? and Id =?',array($State,$idtasks));

}




public function _destruct(){
    
}


}

?>