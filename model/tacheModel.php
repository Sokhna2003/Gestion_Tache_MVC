<?php
require_once(ROOT."bd/database.php");
function getAllTaches(){
    $sql="SELECT * FROM taches";
   return executeSelect($sql);
}

function addTache(array $tache){
    $sql="INSERT INTO taches(libelle,date_debut,date_fin,description,statut) VALUES(:libelle,:date_debut,:date_fin,:description,:statut)";
    executeUpdate($sql,$tache);
}

function getTacheById(int $id){
    $sql = "SELECT * FROM taches WHERE id_tache = :id";
    return executeSelect($sql, ["id" => $id], true);
}

function marquerCommeTerminee(int $id){
    $sql = "UPDATE taches SET statut = 'Terminee' WHERE id_tache = :id";
    return executeUpdate($sql, ["id" => $id]);
}

function deleteTache(int $id){
    $sql = "DELETE FROM taches WHERE id_tache = :id";
    return executeUpdate($sql, ["id" => $id]);
}