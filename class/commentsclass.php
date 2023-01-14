 <?php
require_once('interface/comments-interface.php');
require_once('class/BDDclass.php');
 class comments_class implements comments{



public function __construct(){}




public function delete($id){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('delete from comments where id=?',$id);


}
public function modify($id,$Comment){

    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('update comments set Comment =? where id=? ',array($Comment,$id));

}
public function add($idTask,$idUser,$Comment){
    $BDD=new BDD('localhost','todolist','root','root');
    $BDD->nonselectquery('insert into comments (idTask,Comment,idUser) values(?,?,?)',array($idTask,$Comment,$idUser));

}
public function get_allcomment($idtask){
    $BDD=new BDD('localhost','todolist','root','root');
   return $BDD->selectQuery('SELECT * FROM comments where IdTask=?',array($idtask));

}
public function _destruct(){}

}


?>