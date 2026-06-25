<?php
require_once(ROOT."bd/database.php");
function getAllProduits(){
    $sql="SELECT * FROM produit";
   return executeSelect($sql);
}

function addProduit(array $produit){
    $sql="INSERT INTO produit(libelle,reference,prix,stock,description) VALUES(:libelle,:reference,:prix,:stock,:description)";
    executeUpdate($sql,$produit);
}