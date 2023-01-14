
<?php
require_once('class/BDDclass.php');
require_once('interface/teams-interface.php');
class teams_class implements teams{
   
    

public $id;
public $Name;
public $State;

public function __construct(){
}
public function delete($id){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('delete from teams where id=?',$id);

}
public function modify($id,$Name,$State){

    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('update teams set Name =? and State=? where id=? ',array($Name,$State,$id));

}
public function add($Name,$State){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('insert into teams (Name,State) values(?,?)',array($Name,$State));


    
}
public function get_name_teams($id){
    $BDD=new BDD('localhost','todolist','root','root');
   return $BDD->selectQuery('SELECT Name FROM teams where Id=? ',array($id));

}
public function get_allteams_id(){
    $BDD=new BDD('localhost','todolist','root','root');
   return $BDD->selectQuery('SELECT * FROM teams where Id ');

}
public function get_allteams(){
    $BDD=new BDD('localhost','todolist','root','root');
   return $BDD->selectQuery('SELECT * FROM teams ');

}

public function _destruct(){
    
}

}

?>