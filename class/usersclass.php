
<?php
require_once('class/BDDclass.php'); 
require_once('interface/users-interface.php');



class Users_class implements users{



public function __construct(){


}
public function delete($FirstName,$LastName,$Email,$Password){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('delete from users where Email=?' ,'$Email');


}
public function modify($FirstName,$LastName,$Email,$Password){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('UPDATE users SET FirstName = ?, LastName = ?, Email = ? ,Password=? WHERE Email=?' ,(array($FirstName,$LastName,$Email,$Password,$Email)));


}
public function add($FirstName,$LastName,$Email,$Password){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('insert into users (FirstName,LastName,Email,Password) values(?,?,?,?)',(array($FirstName,$LastName,$Email,$Password)));
    
}

public function Getid($email,$password){
    $BDD=new BDD('localhost','todolist','root','root');
    
    return $BDD->selectQuery('SELECT Id FROM users where Email =? and Password=?',array($email,$password));

}
public function Getid_user_team($FirstName,$LastName){
    $BDD=new BDD('localhost','todolist','root','root');
    
    return $BDD->selectQuery('SELECT Id FROM users where FirstName =? and LastName=?',array($FirstName,$LastName));

}
public function Getallfrom($email,$password){
    $BDD=new BDD('localhost','todolist','root','root');
    
    return $BDD->selectQuery('SELECT *FROM users where Email =? and Password=?',array($email,$password));

}
public function GetLastName($id){
    $BDD=new BDD('localhost','todolist','root','root');
    
    return $BDD->selectQuery('SELECT  LastName FROM users where Id =? ',array($id));

}

public static function disconnect(){
    session_start();
    session_destroy();
    header("Location: login.php");
    die();
}

}
?>
