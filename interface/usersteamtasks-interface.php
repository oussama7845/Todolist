<?php
interface usersteamtasks {
    public function delete($IdUser,$IdTeam,$IdTask);
    public function add($IdUser,$IdTeam,$IdTask);
    public function idTask($IdTeam);
    /*
    public function modify($IdUser,$IdTeam,$IdTask);
    */
}

?>