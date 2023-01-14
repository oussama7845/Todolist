<?php
interface usersteams{
    public function delete($IdUser,$IdTeam);
    public function add($IdUser,$IdTeam);
    /*
    public function modify($IdUser,$IdTeam);
    */
    public function getLastTeamId();
}

?>