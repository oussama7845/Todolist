<?php
interface comments{
    public function delete($id);
    public function add($idTask,$idUser,$Comment);
    public function modify($id,$comment);
    public function get_allcomment($idtask);
}
?>