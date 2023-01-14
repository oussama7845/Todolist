<?php
interface tasks{
    public function delete($id);
    public function add($Name,$Detail,$State);
    public function modify($id,$Name,$Detail,$State);
    public function gettask($id);
    public function gettaskid($Name,$Detail);
    public function get_alltask($type);
    public function get_alltask_team($State,$idtasks);
}
?>