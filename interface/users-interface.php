<?php
interface users {
    public function delete($FirstName,$LastName,$Email,$Password);
    public function add($FirstName,$LastName,$Email,$Password);
    public function modify($FirstName,$LastName,$Email,$Password);
    public function Getid($email,$password);
    public function Getid_user_team($FirstName,$LastName);
    public function GetLastName($id);
}
?>