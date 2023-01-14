<?php
interface teams{
    public function delete($Name);
    public function add($Name,$State);
    public function modify($id,$Name,$State);
}

?>