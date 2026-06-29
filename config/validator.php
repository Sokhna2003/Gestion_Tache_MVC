<?php
//verifier champs vides
function isEmpty($key,$value,array &$errors,string $msg="Ce champs est obligatoire"){
     if (empty(trim($value))) {
        $errors[$key]=$msg;
     }
}

function isNumeric($value){
    return is_numeric($value);
}

function isString($value){
    return is_string($value);
}
   

function validate(array $errors):bool{
    return count($errors)==0;
}

function validDataTache(array $data):array{
     $errors = [];
        if(empty($data["libelle"])){
            $errors["libelle"] ="Veuillez remplir le libelle";
        }
        if(empty($data["date_debut"])){
            $errors["date_debut"] ="Veuillez remplir la date";
        }
        if(empty($data["date_fin"])){
                $errors["date_fin"] ="Veuillez remplir la date";
            }
        if(empty($data["description"])){
            $errors["description"] ="Veuillez remplir la description";
            }
        if(empty($data["statut"])){
                $errors["statut"] ="Veuillez remplir le statut";
            }
        if (!empty($data["date_debut"]) && !empty($data["date_fin"])) {
            if (strtotime($data["date_fin"]) < strtotime($data["date_debut"])) {
                $errors["date_fin"] = "La date de fin doit être ultérieure à la date de début";
            }
        }

        return $errors;
}