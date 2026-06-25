<?php
require_once(ROOT."bd/database.php");

function login(string $email){
    $sql="SELECT * FROM utilisateur WHERE email like :email";
    return executeSelect($sql,["email"=>$email],true);
}


