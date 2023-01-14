<?php
class tools{
    public static function ValidEmail($email){
        $regex="#[A-Za-z0-9-_\.]+@[a-zA-z0-9]+.[a-zA-Z]{2,3}#";
        return preg_match($regex,$email);
    }
}
?>